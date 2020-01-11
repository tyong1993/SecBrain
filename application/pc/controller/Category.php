<?php
namespace app\pc\controller;

use app\common\base\BaseController;
use app\common\logic\CategoryLogicInf;
class Category extends BaseController
{

    public function index(CategoryLogicInf $categoryLogic)
    {
        $father_id=null;
        if(!empty($this->request->param("category_id"))){
            $father_id=db("category")->where(["id"=>$this->request->param("category_id")])->value("father_id");
        }
        if($this->request->isAjax()){
            $categoryList=$categoryLogic->selectCategoryList();
            return self::well(
                [
                    "categoryList"=>$categoryList,
                    "father_id"=>$father_id,
                    "category_id"=>$this->request->param("category_id"),
                ]
                );
        }
        $categoryList=$categoryLogic->selectCategoryList(null,$is_admin=true);
        $this->assign("categoryList",$categoryList);
        $this->assign("father_id",$father_id);
        $this->assign("category_id",$this->request->param("category_id"));
        return $this->fetch();
    }
    public function getCategoryParents(CategoryLogicInf $categoryLogic)
    {
        $res=$categoryLogic->getCategoryParents($this->request->param("category_id"));
        if($res['flag'] === false){
            return self::bad($res);
        }
        return self::well($res['data']);
    }
    public function add(CategoryLogicInf $categoryLogic)
    {
        if($this->request->isGet()){
            $this->assign("father_id",$this->request->param("father_id"));
            return $this->fetch();
        }
        $res=$categoryLogic->addCategory(app("app\common\logic\CoreLogicInf"));
        if($res['flag'] === false){
            return $this->error($res['msg']);
        }
        return $this->success("保存成功");
    }
    public function delete(CategoryLogicInf $categoryLogic)
    {
        $categoryLogic->deleteCategory($this->request->param("id"),app("app\common\logic\CoreLogicInf"));
        return self::well();
    }
    public function update(CategoryLogicInf $categoryLogic)
    {
        if($this->request->isGet()){
            $category=db("category")->find($this->request->param("id"));
            $this->assign("category",$category);
            return $this->fetch();
        }
        $categoryLogic->updateCategory($this->request->param("id"),app("app\common\logic\CoreLogicInf"));
        return $this->success("更新成功");
    }
}
