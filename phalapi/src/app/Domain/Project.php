<?php
/**
 * Created by PhpStorm.
 * User: 29426
 * Date: 2018/10/25
 * Time: 13:53
 */

namespace App\Domain;

use App\Model;
use PhalApi\Exception\BadRequestException;

class Project
{

    private static $model;

    public function __construct(){
        self::$model = new Model\Project();
    }

    public function doAdd($data){
        //获取签订年份及月份
        $date = date_create($data['sign_time']);
        $data['sign_year'] = date_format($date,'Y');
        $data['sign_month'] = date_format($date,'m');
        //尾款 = 项目金额
        $data['left_money'] = $data['money'];

        return self::$model->doAdd($data);
    }


    public function addLog($data){
        $pinfo = self::$model->getProjectStatus($data['project_id']);
        if($pinfo['status'] != 1){
            throw new BadRequestException('该项目已进入售后，无法添加日志');
        }
        //更新项目的更新时间
        $update = array(
            'id' => $data['project_id'],
            'update_time' => date('Y-m-d H:i:s')
        );
        self::$model->doUpdate($update);

        $M = new Model\ProjectLog();
        return $M->addLog($data);
    }
    public function addService($data){
        $pinfo = self::$model->getProjectStatus($data['project_id']);
        if($pinfo['status'] != 2){
            throw new BadRequestException('该项目尚未开始售后，无法添加！');
        }
        //更新项目的更新时间
        $update = array(
            'id' => $data['project_id'],
            'update_time' => date('Y-m-d H:i:s')
        );
        self::$model->doUpdate($update);

        $M = new Model\ProjectService();
        return $M->addService($data);
    }

    public function deleteLog($id){
        $M = new Model\ProjectLog();
        return $M->deleteLog($id);
    }
    public function deleteService($id){
        $M = new Model\ProjectService();
        return $M->deleteService($id);
    }


    public function doUpdate($data){
        return self::$model->doUpdate($data);
    }
    public function doDelete($id){
        return self::$model->doDelete($id);
    }

    public function endProject($id){
        return self::$model->endProject($id);
    }

    public function backProject($id){
        return self::$model->backProject($id);
    }



    public function getProjectList(){
        return self::$model->getProjectList();
    }
    public function getProjectListByUid($user_id){
        return self::$model->getProjectListByUid($user_id);
    }

    public function getProjectInfo($id){
        return self::$model->getProjectInfo($id);
    }


    public function getNearProject(){
        return self::$model->getNearProject();
    }

    public function getAllCount(){
        return self::$model->getAllCount();
    }
    public function getYearMoney(){
        return self::$model->getYearMoney();
    }


}