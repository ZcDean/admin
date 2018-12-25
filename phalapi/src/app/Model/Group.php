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

class Group extends NotORMModel{


    /**
     * 添加一个职位
     */
    public function doAdd($data){
       $db = $this->getORM();
       return $db->insert($data);
    }


    public function getAllList($status){
        $db = $this->getORM();
        $condition = '1 = 1';
        if($status != -1){
            $condition .= ' AND status = 1';
        }
        return $db->where($condition)->select('id,status,title,rules,can_del,description')->fetchAll();
    }


    public function doUpdate($data){
        $db = $this->getORM();
        return $db->where('id',$data['id'])->update($data);
    }


    public function doDelete($id){
        //查询当前职位是否被使用
        $user_model = new User();
        $users = $user_model->getListByGid($id);
        if($users){
           throw new BadRequestException('当前职位已被使用，无法删除！',7);
        }
        $db = $this->getORM();
        return $db->where('id',$id)->delete();
    }
}
