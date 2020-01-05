<?php
namespace app\common\logic;

use think\Db;
use app\common\base\BaseLogic;
class CoreLogic extends BaseLogic implements CoreLogicInf
{
    public function addCore()
    {
        $data=[
            "create_time"=>$this->request->time(),
            "update_time"=>$this->request->time(),
            "is_delete"=>0,
        ];
        $core_id=Db::table("core")->insertGetId($data);
        return self::well($core_id);
    }
    public function updateCore($id)
    {
        $data=[
            "id"=>$id,
            "update_time"=>$this->request->time(),
        ];
        Db::table("core")->update($data);
        return self::well();
    }
    public function deleteCore($id)
    {
        $data=[
            "id"=>$id,
            "is_delete"=>1,
            "delete_time"=>$this->request->time(),
        ];
        Db::table("core")->update($data);
        return self::well();
    }
}
