<?php
namespace app\common\logic;

interface MemoryLogicInf
{
    public function addMemory();
    public function deleteMemory($id);
    public function updateMemory($id);
    public function selectMemoryone($id);
    public function selectMemoryList();
}
