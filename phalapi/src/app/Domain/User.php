<?php
/**
 * Created by PhpStorm.
 * User: 29426
 * Date: 2018/10/25
 * Time: 13:53
 */

namespace App\Domain;

use App\Model;

class User{

    private static $model;

    public function __construct(){
        self::$model = new Model\User();
    }

    public function doAdd($data){
        return self::$model->add($data);
    }



    public function doLogin($data){
        return self::$model->login($data);
    }

    public function doUpdate($data){
        return self::$model->doUpdate($data);
    }

    public function doSelect(){
        return self::$model->doSelect();
    }

    public function doDelete($id){
        return self::$model->doDelete($id);

    }

    public function doDetailSelect(){
        return self::$model->doDetailSelect();
    }
}



