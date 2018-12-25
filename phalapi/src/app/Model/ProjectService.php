<?php
/**
 * Created by PhpStorm.
 * User: 29426
 * Date: 2018/10/25
 * Time: 13:49
 */
namespace App\Model;


use PhalApi\Model\NotORMModel;

class ProjectService extends NotORMModel{



    protected function getTableName($id){
        return 'project_service';
    }



    public function addService($data){
        $db = $this->getORM();
        return $db->insert($data);
    }

    public function deleteService($id){
        $db = $this->getORM();
        return $db->where('id',$id)->delete();
    }

    /**
     * 根据项目删除售后
     */
    public function deleteByPid($pid){
        $db = $this->getORM();
        return $db->where('project_id',$pid)->delete();
    }

    public  function getListByPid($pid){
        $db = $this->getORM();
        return $db->where('project_id',$pid)->select('id,title,content,service_time')->order('service_time DESC')->fetchAll();
    }

}
