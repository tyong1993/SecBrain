<?php
namespace app\common\logic;

interface CategoryLogicInf
{
    public function addCategory();
    public function deleteCategory($id);
    public function updateCategory($id);
    public function selectCategoryList($wheres=null);
    /**
     * 获取分类的所有父类
     */
    public function getCategoryParents($id,$is_get_myself = true);
}
