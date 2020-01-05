<?php
namespace app\pc\controller;

use app\common\base\BaseController;
use app\common\logic\MemoryLogicInf;
use app\common\logic\CategoryLogicInf;
class Memory extends BaseController
{

    public function index(MemoryLogicInf $MemoryLogic,CategoryLogicInf $categoryLogic)
    {
        $memoryList=$MemoryLogic->selectMemoryList();
        $categoryList=$categoryLogic->selectCategoryList();
        $this->assign("memoryList",$memoryList);
        $this->assign("categoryList",$categoryList);
        $father_id=null;
        if(!empty($this->request->param("category_id"))){
            $father_id=db("category")->where(["id"=>$this->request->param("category_id")])->value("father_id");
        }
        $this->assign("father_id",$father_id);
        return $this->fetch();
    }
    public function detail(MemoryLogicInf $MemoryLogic)
    {
        $memory=$MemoryLogic->selectMemoryone($this->request->param("id"));
        $this->assign("memory",$memory);
        return $this->fetch();
    }
    public function add(MemoryLogicInf $MemoryLogic)
    {
        if($this->request->isGet()){
            return $this->fetch();
        }
        $MemoryLogic->addMemory();
        return $this->success("保存成功");
    }
    public function delete(MemoryLogicInf $MemoryLogic)
    {
        $MemoryLogic->deleteMemory($this->request->param("id"));
        return self::well();
    }
    public function update(MemoryLogicInf $MemoryLogic,CategoryLogicInf $categoryLogic)
    {
        if($this->request->isGet()){
            $memory=$MemoryLogic->selectMemoryone($this->request->param("id"));
            $memory_category_ids=db("memory_tag")->where(["memory_id"=>$this->request->param("id")])->column("category_id");
            $memory_category_ids[]=0;
            $where['cg.id']=$memory_category_ids;
            $memory_categorys=$categoryLogic->selectCategoryList($where);
            $this->assign("memory",$memory);
            $this->assign("memory_categorys",$memory_categorys);
            return $this->fetch();
        }
        $MemoryLogic->updateMemory($this->request->param("id"));
        return $this->success("更新成功");
    }
}
