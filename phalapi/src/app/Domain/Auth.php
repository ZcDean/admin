<?php
/**
 * Created by PhpStorm.
 * User: 29426
 * Date: 2018/10/25
 * Time: 13:53
 */

namespace App\Domain;

use App\Model;

class Auth{


    public function getAuthList($isGroup){
        $M = new Model\Auth();
        $list = $M->getAuthList();
        if($isGroup){
            $arr = array();
            foreach ($list as $item){
                if(!array_key_exists($item['belong'],$arr)){
                    $arr[$item['belong']] = array();
                }
                array_push($arr[$item['belong']],$item);
            }
            return $arr;
        }
        return $list;
    }
    public function doAdd($data){
        $M = new Model\Auth();
        return $M->doAdd($data);
    }
}



