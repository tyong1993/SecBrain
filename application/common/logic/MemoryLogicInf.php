<?php
namespace app\common\logic;

use app\common\logic\CoreLogicInf;
interface MemoryLogicInf
{
    public function addMemory(CoreLogicInf $coreLogicInf);
    public function deleteMemory($id,CoreLogicInf $coreLogicInf);
    public function updateMemory($id,CoreLogicInf $coreLogicInf);
    public function selectMemoryone($id);
    public function selectMemoryList();
}
