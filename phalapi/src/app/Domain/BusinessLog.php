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

class BusinessLog
{

    public function doAdd($data){


        $M = new Model\BusinessLog();
        //修改更新日期
        $BM = new Model\Business();
        $update = array(
            'id' => $data['business_id'],
            'update_time' => date('Y-m-d H:i:s')
        );
        $BM->doUpdate($update);
        return $M->doAdd($data);
    }
    public function doDelete($id){
        $M = new Model\BusinessLog();
        return $M->doDelete($id);
    }

}