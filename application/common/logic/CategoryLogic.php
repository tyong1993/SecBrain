<?php
namespace app\common\logic;

use app\common\logic\CoreLogicInf;
use Think\Db;
use app\common\base\BaseLogic;
class CategoryLogic extends BaseLogic implements CategoryLogicInf
{
    public function addCategory(CoreLogicInf $coreLogicInf)
    {
        //title必填
        if(empty($this->request->param("name"))){
            return self::bad("分类名称不能为空");
        }
        Db::startTrans();
        //core
        $res=$coreLogicInf->addCore();
        if($res["flag"] === false){
            Db::rollback();
            return self::bad($res);
        }
        $father_id=null;
        $level=1;
        if($this->request->param("father_id")){
            $category=Db::table("category")->find($this->request->param("father_id"));
            $father_id=$category['id'];
            $level=$category['level']+1;
        }
        //category
        $category=[
            'core_id'=>$res['data'],
            'master_id'=>MASTER_ID,
            'name'=>$this->request->param("name"),
            'describe'=>$this->request->param("describe"),
            'status'=>(int)$this->request->param("status"),
            'father_id'=>$father_id,
            'level'=>$level,
        ];
        $category_id=Db::table("category")->insertGetId($category);
        //tag
        Db::commit();
        return self::well($category_id);
    }
    public function deleteCategory($id,CoreLogicInf $coreLogicInf){
        $core_id=Db::table("category")->where(["id"=>$id])->value("core_id");
        Db::startTrans();
        $coreLogicInf->deleteCore($core_id);
        //tag
        Db::table("memory_tag")->where(["category_id"=>$id])->delete();
        Db::commit();
        return self::well();
    }
    public function updateCategory($id,CoreLogicInf $coreLogicInf){
        $core_id=Db::table("category")->where(["id"=>$id])->value("core_id");
        Db::startTrans();
        $coreLogicInf->updateCore($core_id);
        //category
        $category=[
            'id'=>$id,
            'name'=>$this->request->param("name"),
            'describe'=>$this->request->param("describe"),
            'status'=>(int)$this->request->param("status"),
        ];
        $category_id=Db::table("category")->update($category);
        Db::commit();
        return self::well();
    }
    public function selectCategoryList($wheres=null,$is_admin=false){
        $where=$this->base_select_where;
        if($is_admin == false){
            $where["status"]=1;
        }
        if($wheres == null){
            $category_id=$this->request->param("category_id");
            if(!empty($category_id)){
                $where["father_id"]=$category_id;
            }else{
                $where["level"]=1;
            }
        }else{
            $where=array_merge($where,$wheres);
        }
        $res=$this->getList($where);
        return $res;
    }
    public function getCategoryParents($id, $is_get_myself = true)
    {
        $where=$this->base_select_where;
        $where["status"]=1;
        $category_ids=[0];
        $father_id=db("category")->where(['id'=>$id])->value("father_id");
        if($is_get_myself){
            $category_ids[]=$id;
        }
        while ($father_id) {
            $category_ids[]=$father_id;
            $father_id=db("category")->where(['id'=>$father_id])->value("father_id");
        }
        $where['cg.id']=$category_ids;
        $res=$this->getList($where);
        return self::well($res);
    }
    protected function getList($where)
    {
        $res=Db::table("category")
        ->alias("cg")
        ->field("cg.*")
        ->leftJoin("core c","c.id = cg.core_id")
        ->where($where)
        ->order("id desc")
        ->select();
        return $res;
    }

}
