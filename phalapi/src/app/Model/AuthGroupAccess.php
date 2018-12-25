<?php
/**
 * Created by PhpStorm.
 * User: 29426
 * Date: 2018/10/25
 * Time: 13:49
 */
namespace App\Model;


use PhalApi\Model\NotORMModel;

/**
 * 职位映射关系
 * Class AuthGroupAccess
 * @package App\Model
 */
class AuthGroupAccess extends NotORMModel{



    protected function getTableName($id)
    {
        return 'group_access';
    }

    /**
     * 添加一个员工映射
     */
    public function add($data){
        $db = $this->getORM();
        return  $db->insert($data);
    }

    public function deleteByUid($uid){
        $db = $this->getORM();
        return $db->where('uid',$uid)->delete();
    }
}
