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

class Finance extends NotORMModel{


    /**
     * 添加一个流水
     */
    public function doAdd($data){

        $db = $this->getORM();
        //当有流水时，并且有项目相关，更新项目尾款
        if($data['type'] == 'income' && $data['project_id'] != null){
            $pM = new Project();
            //进账时，尾款变少
            $pM->updateLeftMoney($data['project_id'],floatval($data['money'])*-1);
        }
        return $db->insert($data);

    }



    public function doDelete($id){
        $db = $this->getORM();
        $finfo = $db->where('id',$id)->select('money,project_id')->fetch();
        if($finfo['project_id'] != 0){
            $pM = new Project();
            //删除进账时，尾款增加
            $pM->updateLeftMoney($finfo['project_id'],floatval($finfo['money']));
        }
        return $db->where('id',$id)->delete();
    }


    public function getListByType($type){
        $db = $this->getORM();
        return $db->where('type',$type)->select('*')->fetchAll();
    }

    /**
     * 查询某个项目的流水
     * @param $pid
     * @return mixed
     */
    public function getListByPid($pid){
        $db = $this->getORM();
        return $db->where('project_id',$pid)->select('title,description,money,trade_time')->order('trade_time DESC')->fetchAll();
    }


    public function getAllList(){
        $db = $this->getORM();
        return $db->select('*')->order('trade_time DESC')->fetchAll();
    }

}
