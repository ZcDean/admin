<?php
/**
 * Created by PhpStorm.
 * User: 29426
 * Date: 2018/10/25
 * Time: 13:49
 */
namespace App\Model;


use PhalApi\Model\NotORMModel;

class BusinessLog extends NotORMModel{



    protected function getTableName($id){
        return 'business_log';
    }

    /**
     * 添加一进度
     */
    public function doAdd($data){
        $db = $this->getORM();
        return  $db->insert($data);
    }
    public function doDelete($id){
        $db = $this->getORM();
        return  $db->where('id' ,$id)->delete();
    }

    public function getList($id){
        $db = $this->getORM();
        return $db->where('business_id',$id)->order('follow_time ASC')->select('title,content,follow_time')->fetchAll();
    }

}
