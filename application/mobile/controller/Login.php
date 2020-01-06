<?php
namespace app\mobile\controller;

use app\common\base\BaseController;
class Login extends BaseController
{

    public function login()
    {
        if($this->request->isGet()){
            return $this->fetch();
        }
        $name=$this->request->param("name");
        $password=$this->request->param("password");
        $remember=$this->request->param("remember");
        if(empty($name) || empty($password)){
            return $this->error("账号或密码错误");
        }
        $masters=db("master")->where(["name"=>$name])->select();
        $password=md5(md5($password));
        $master=null;
        foreach($masters as $val){
            if($val["password"] == $password){
                $master=$val;break;
            }
        }
        if($master==null){
            return $this->error("账号或密码错误");
        }
        session('master', $master);
        return redirect('/mobile/memory/index');
    }
}
