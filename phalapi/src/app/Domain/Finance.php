<?php
/**
 * Created by PhpStorm.
 * User: 29426
 * Date: 2018/10/25
 * Time: 13:53
 */

namespace App\Domain;

use App\Model;

class Finance
{

    public function doAdd($data){
        $M = new Model\Finance();
        return $M->doAdd($data);
    }


    public function doDelete($id){
        $M = new Model\Finance();
        return $M->doDelete($id);
    }

    public function getListByType($type){
        $M = new Model\Finance();
        return $M->getListByType($type);
    }
    public function getAllList(){
        $M = new Model\Finance();
        return $M->getAllList();
    }



}