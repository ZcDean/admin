<?php
/**
 * Created by PhpStorm.
 * User: 29426
 * Date: 2018/10/25
 * Time: 13:53
 */

namespace App\Domain;

use App\Model;

class Group{

    public function doAdd($data){
        $M = new Model\Group();
        return $M->doAdd($data);
    }


    public function getAllList($status){
        $M = new Model\Group();
        return $M->getAllList($status);
    }

    public function doUpdate($data){
        $M = new Model\Group();
        return $M->doUpdate($data);
    }

    public function doDelete($id){
        $M = new Model\Group();
        return $M->doDelete($id);
    }


}



