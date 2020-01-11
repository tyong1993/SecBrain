<?php
namespace app\common\logic;

use app\common\logic\CoreLogicInf;
interface CategoryLogicInf
{
    public function addCategory(CoreLogicInf $coreLogicInf);
    public function deleteCategory($id,CoreLogicInf $coreLogicInf);
    public function updateCategory($id,CoreLogicInf $coreLogicInf);
    public function selectCategoryList($wheres=null,$is_admin=false);
    /**
     * 获取分类的所有父类
     */
    public function getCategoryParents($id,$is_get_myself = true);
}
