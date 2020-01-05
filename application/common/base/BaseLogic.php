<?php
namespace app\common\base;

use think\Request;
class BaseLogic
{
    protected $request;
    const BASE_SELECT_WHERE=["is_delete"=>0,"master_id"=>MASTER_ID];
    public function __construct(Request $request)
    {
        $this->request=$request;
    }
    /**
     * 错误返回
     */
    protected static function bad($msg='',$code=0,$data=[])
    {
        //将标准的错误信息返回
        if(isset($msg['flag']) && $msg['flag'] === false){
            return [
                'flag'=>false,
                'msg'=>$msg['msg'],
                'code'=>$msg['code'],
                'data'=>$msg['data'],
            ];
        }
        //自定义错误信息返回
        return [
            'flag'=>false,
            'msg'=>$msg,
            'code'=>$code,
            'data'=>$data,
        ];
    }
    /**
     * 成功返回
     */
    protected static function well($data=[],$msg="succsee",$code=0)
    {
        return [
            'flag'=>true,
            'msg'=>$msg,
            'data'=>$data,
            'code'=>$code,
        ];
    }
}
