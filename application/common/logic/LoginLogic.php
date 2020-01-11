<?php
namespace app\common\logic;

use app\common\base\BaseLogic;
use app\common\logic\LoginLogicInf;
class LoginLogic extends BaseLogic implements LoginLogicInf
{
    public function login()
    {
        $name=$this->request->param("name");
        $password=$this->request->param("password");
        $remember=$this->request->param("remember");
        if(empty($name) || empty($password)){
            return self::bad("账号或密码错误");
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
            return self::bad("账号或密码错误");
        }
        session('master', $master);
        cookie('remember_me',null);
        if($this->request->param("remember_me") == 1){
            
            cookie('remember_me',$master['id'],3600*24*30);
            cache("master_".$master['id'],$master,3600*24);
        }
        return self::well();
    }
    public function logout()
    {
        session('master', null);
        cache("master_".MASTER_ID,null);
        return self::well();
    }
}
