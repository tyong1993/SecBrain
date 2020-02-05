<?php
namespace app\common\logic;

use Think\Db;
use app\common\base\BaseLogic;
use app\common\logic\CoreLogicInf;
class MemoryLogic extends BaseLogic implements MemoryLogicInf
{
    
    public function addMemory(CoreLogicInf $coreLogicInf)
    {
        //title必填
        if(empty($this->request->param("title"))){
            return self::bad("标题不能为空");
        }
        Db::startTrans();
        //core
        $res=$coreLogicInf->addCore();
        if($res["flag"] === false){
            Db::rollback();
            return self::bad($res);
        }
        //memory
        $memory=[
            'core_id'=>$res['data'],
            'master_id'=>MASTER_ID,
            'title'=>$this->request->param("title"),
            'describe'=>$this->request->param("describe"),
            'content'=>$this->request->param("content"),
        ];
        $memory_id=Db::table("memory")->insertGetId($memory);
        //tag
        $this->updateMemoryTag($memory_id,$this->request->param("categorys"));
        Db::commit();
        return $memory_id;
    }
    public function deleteMemory($id,CoreLogicInf $coreLogicInf)
    {
        $core_id=Db::table("memory")->where(["id"=>$id])->value("core_id");
        Db::startTrans();
        $coreLogicInf->deleteCore($core_id);
        //tag
        $this->updateMemoryTag($id,'');
        Db::commit();
        return self::well();
    }
    public function updateMemory($id,CoreLogicInf $coreLogicInf)
    {
        $core_id=Db::table("memory")->where(["id"=>$id])->value("core_id");
        Db::startTrans();
        $coreLogicInf->updateCore($core_id);
        //memory
        $memory=[
            'id'=>$id,
            'title'=>$this->request->param("title"),
            'describe'=>$this->request->param("describe"),
            'content'=>$this->request->param("content"),
        ];
        Db::table("memory")->update($memory);
        //tag
        $this->updateMemoryTag($id,$this->request->param("categorys"));
        Db::commit();
        return self::well();
    }
    public function selectMemoryList()
    {
        $category_id=$this->request->param("category_id");
        $where=$this->base_select_where;
        if(!empty($category_id)){
            $memory_ids=Db::table("memory_tag")->where(["category_id"=>$category_id])->column("memory_id");
            $memory_ids[]=0;
            $where["m.id"]=$memory_ids;
        }
        
        $res=Db::table("memory")
        ->alias("m")
        ->field("m.id,m.title,m.describe,c.update_time")
        ->leftJoin("core c","c.id = m.core_id")
        ->where($where)
        ->order("id desc")
        ->select();
        foreach($res as &$val){
            $val['update_time']=date("Y年m月d日 H:i",$val['update_time']);
            // $val['describe']=mb_substr($val['describe'],0,10)."......";
        }
        return $res;
    }
    public function selectMemoryone($id)
    {
        $where=$this->base_select_where;
        $where["m.id"]=$id;
        $res=Db::table("memory")
        ->alias("m")
        ->field("m.*,c.update_time")
        ->leftJoin("core c","c.id = m.core_id")
        ->where($where)
        ->find();
        return $res;
    }
    protected function updateMemoryTag($memory_id,$category_ids)
    {
        $need_add=[];
        $need_delete=[];
        $exist_category_ids=Db::table("memory_tag")->where(["memory_id"=>$memory_id])->column('category_id')?:[];
        $now_category_ids=$category_ids?explode(",",$category_ids):[];
        $exist_category_ids=array_unique($exist_category_ids);
        $now_category_ids=array_unique($now_category_ids);
        if(empty($exist_category_ids)){
            $need_add=$now_category_ids;
        }
        if(empty($now_category_ids)){
            $need_delete=$exist_category_ids;
        }
        if(!empty($exist_category_ids) && !empty($now_category_ids)){
            //需要新增的
            foreach($now_category_ids as $val){
                if(!in_array($val,$exist_category_ids)){
                    $need_add[]=$val;
                }
            }
            //需要删除的
            foreach($exist_category_ids as $val){
                if(!in_array($val,$now_category_ids)){
                    $need_delete[]=$val;
                }
            }
        }
        if(!empty($need_add)){
            $data=[];
            foreach($need_add as $val){
                $data[]=["memory_id"=>$memory_id,"category_id"=>$val];
            }
            Db::table("memory_tag")->insertAll($data);
        }
        if(!empty($need_delete)){
            Db::table("memory_tag")->where(["category_id"=>$need_delete,"memory_id"=>$memory_id])->delete();
        }
        return true;
    }
}
