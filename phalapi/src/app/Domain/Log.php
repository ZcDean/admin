<?php
/**
 * Created by PhpStorm.
 * User: 29426
 * Date: 2018/10/25
 * Time: 13:53
 */

namespace App\Domain;

use App\Model;

class Log{


    public function getLogList(){
        $M = new Model\Log();
        return $M->getLogList();
    }
}



