<?php
namespace App\Api;

use PhalApi\Api;


/**
 * 日志接口（记录主要操作）
 */
class Log extends Api {


    public function getLogList(){
        $D = new \App\Domain\Log();
        return $D->getLogList();
    }

}

?>