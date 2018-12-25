<?php
/**
 * Created by PhpStorm.
 * User: 29426
 * Date: 2018/10/25
 * Time: 13:49
 */
namespace App\Model;


use PhalApi\Model\NotORMModel;

class ProjectLog extends NotORMModel{



    protected function getTableName($id){
        return 'project_log';
    }



    public function addLog($data){
        $db = $this->getORM();
        return $db->insert($data);
    }

    public function deleteLog($id){
        $db = $this->getORM();
        return $db->where('id',$id)->delete();
    }


    public  function getListByPid($pid){
        $db = $this->getORM();
        return $db->where('project_id',$pid)->select('id,title,content,build_time')->order('build_time DESC')->fetchAll();
    }

}
