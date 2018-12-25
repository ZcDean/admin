<?php
/**
 * Created by PhpStorm.
 * User: 29426
 * Date: 2018/10/26
 * Time: 13:34
 */
namespace App\Model;

use PhalApi\Exception\BadRequestException;
use PhalApi\Model\NotORMModel;

class Customer extends NotORMModel{


    public function doAdd($data){
        $db = $this->getORM();
        $res = $db->where('tel',$data['tel'])->select('*')->fetchRow();
        if($res){
            throw new BadRequestException('当前客户的手机号已存在');
        }
        return $db->insert($data);
    }


    //更新
    public function doUpdate($data){
        $db = $this->getORM();
        return $db->where('id',$data['id'])->update($data);
    }


    /**
     * 获取简单列表
     * @return mixed
     */
    public function getSimpleList(){
        $db = $this->getORM();
        return $db->select('*')->fetchAll();
    }


    //获取详细信息
    public function getDetailList(){
        $db = $this->getORM();
        $sql = 'SELECT a.* ,IFNULL(counts,0) counts,IFNULL(amount,0) amount,IFNULL(signs,0) signs FROM db_customer a LEFT JOIN ( SELECT customer_id, COUNT( id ) counts FROM db_business GROUP BY customer_id ) b ON a.id = b.customer_id LEFT JOIN (SELECT customer_id , SUM(money) amount , COUNT(id) signs FROM db_project GROUP BY customer_id) c ON c.customer_id = a.id ORDER BY a.create_time desc';
        return $db->queryAll($sql);
    }

}