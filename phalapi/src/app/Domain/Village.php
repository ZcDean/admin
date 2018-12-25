<?php
/**
 * Created by PhpStorm.
 * User: 29426
 * Date: 2018/10/25
 * Time: 13:53
 */

namespace App\Domain;

use App\Model;

class Village
{


    private static $model;

    public function __construct(){
        self::$model = new Model\Village();
    }


    public function doAdd($data){
        $data['first_letter'] = strtoupper($data['first_letter']);
        return self::$model->add($data);
    }

    public function doDelete($id){
        return self::$model->delete($id);
    }

    public function doUpdate($data){
        return self::$model->doUpdate($data);
    }

    public function doSelect(){
        $list = self::$model->doSelect();
        return $list;
    }

    public function getDetailList(){
        $list = self::$model->getDetailList();
        return $list;
    }

}