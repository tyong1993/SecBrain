<?php
namespace app\common\base;

use think\Controller;
class BaseController extends Controller
{
    protected function initialize()
    {
        
        if(!empty(session('master'))){
            define("MASTER_ID",1);
        }else{
            
            if($this->request->action() != "login"){
                $module=$this->request->module();
                redirect('/'.$module.'/Login/login')->send();die;
            }
        }
    }
    /**
     * 错误返回
     */
    protected static function bad($msg='',$code=0,$data=[])
    {
        //将标准的错误信息返回
        if(isset($msg['flag']) && $msg['flag'] === false){
            return json([
                'flag'=>'error',
                'msg'=>$msg['msg'],
                'code'=>$msg['code'],
                'data'=>$msg['data'],
            ]);
        }
        //自定义的错误信息返回
        return json([
            'flag'=>'error',
            'msg'=>$msg,
            'code'=>$code,
            'data'=>$data,
        ]);
    }
    /**
     * 成功返回
     */
    protected static function well($data=[],$msg="success",$code=0)
    {
        return json([
            'flag'=>'success',
            'msg'=>$msg,
            'code'=>$code,
            'data'=>$data,
        ]);
    }
}
