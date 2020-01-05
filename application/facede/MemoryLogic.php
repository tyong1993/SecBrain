<?php
namespace app\facede;

use think\Facade;
class MemoryLogic extends Facade
{
    protected static function getFacadeClass()
    {
    	return 'app\common\logic\MemoryLogic';
    }
}
