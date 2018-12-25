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

class Business
{


    private static $model;

    public function __construct(){
        self::$model = new Model\Business();
    }

    public function doAdd($data){
        return self::$model->doAdd($data);
    }
    public function doUpdate($data){
        return self::$model->doUpdate($data);
    }



    public function getAllList(){
        return self::$model->getAllList();
    }

    public function getListByUid($uid){
        return self::$model->getListByUid($uid);
    }
    public function getOne($id){
        return self::$model->getOne($id);
    }


    /**
     * 修改业务的status只能为1 || 2
     * @param $data $project
     */
    public function endBusiness($data,$project){
        return self::$model->endBusiness($data,$project);
    }

    public function getNearBusiness(){
        return self::$model->getNearBusiness();
    }

    public function getMostStarBusiness(){
        return self::$model->getMostStarBusiness();
    }

    public function getAllCount(){
        return self::$model->getAllCount();
    }
}