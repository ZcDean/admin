<?php
/**
 * Created by PhpStorm.
 * User: 29426
 * Date: 2018/10/26
 * Time: 11:23
 */
namespace App\Domain;

use App\Model;

class Customer{


    /**
     * 添加客户信息
     * @desc 客户添加
     * @throws \PhalApi\Exception\BadRequestException
     */
    public function doAdd($data){
        $M = new Model\Customer();
        return $M->doAdd($data);
    }


    /**
     * 更新客户信息
     */
    public function doUpdate($data){
        $M = new Model\Customer();
        return $M->doUpdate($data);
    }


    public function getSimpleList(){
        $M = new Model\Customer();
        return $M->getSimpleList();
    }

    public function getDetailList(){
        $M = new Model\Customer();
        return $M->getDetailList();
    }
}