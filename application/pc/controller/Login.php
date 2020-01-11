<?php
namespace app\pc\controller;

use app\common\base\BaseController;
use app\common\logic\LoginLogicInf;
class Login extends BaseController
{

    public function login(LoginLogicInf $loginLogicInf)
    {
        if($this->request->isGet()){
            return $this->fetch();
        }
        $res=$loginLogicInf->login();
        if($res['flag'] == false){
            $this->error($res['msg']);
        }
        return redirect('/pc/memory/index');
    }
    public function logout(LoginLogicInf $loginLogicInf)
    {
        $res=$loginLogicInf->logout();
        return redirect('/pc/memory/index');
    }
}
