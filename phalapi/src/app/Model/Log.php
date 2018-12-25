<?php
/**
 * Created by PhpStorm.
 * User: 29426
 * Date: 2018/10/25
 * Time: 13:49
 */
namespace App\Model;


use PhalApi\Exception\BadRequestException;
use PhalApi\Model\NotORMModel;

class Log extends NotORMModel{


    /**
     * 根据职位查询
     * @param $gid
     */
    public function getLogList(){
        $db = $this->getORM();
        $sql = 'SELECT a.* , b.name as user_name , b.tel FROM db_log a LEFT JOIN db_user b ON a.user_id = b.id ORDER BY a.create_time DESC';
        return $db->queryAll($sql);
    }


    public function addLog($data){
        $db = $this->getORM();
        return $db->insert($data);
    }
}
