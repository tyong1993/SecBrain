<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用容器绑定定义
return [
    'app\common\logic\MemoryLogicInf'      => app\common\logic\MemoryLogic::class,
    'app\common\logic\CategoryLogicInf'      => app\common\logic\CategoryLogic::class,
    'app\common\logic\CoreLogicInf'      => app\common\logic\CoreLogic::class,
];
