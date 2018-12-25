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

class Auth extends NotORMModel{


    protected function getTableName($id)
    {
        return 'rule';
    }



    /**
     * 根据职位查询
     * @param $gid
     */
    public function getAuthList(){
        $db = $this->getORM();
        return $db->select('*')->fetchAll();
    }


    public function doAdd($data){
        $db = $this->getORM();
        return $db->insert($data);
    }
}
