<?php
/**
 * Created by PhpStorm.
 * User: 29426
 * Date: 2018/10/25
 * Time: 13:53
 */

namespace App\Model;

use PhalApi\Exception\BadRequestException;
use PhalApi\Model\NotORMModel;

class Business extends NotORMModel
{

    public function doAdd($data){
        $db = $this->getORM();
        return $db->insert($data);
    }





    public function doUpdate($data){
        $db = $this->getORM();
        $old_status = $db->where('id',$data['id'])->select('status')->fetch();
        if($old_status['status'] != 0){
            throw new BadRequestException('该业务已存档，无法修改！');
        }
        return $db->where('id',$data['id'])->update($data);
    }


    /**
     * 多表连接查询
     * @return array
     */
    public function getAllList(){
        $db = $this->getORM();
        $sql = 'SELECT a.*,b.name ,c.name as customer_name,c.tel  as customer_tel ,d.title as village_name FROM db_business a LEFT JOIN db_user b ON a.saleman_id=b.id LEFT JOIN db_customer c ON a.customer_id = c.id LEFT JOIN db_village d	on a.village_id = d.id ORDER BY a.create_time DESC';
        return $db->queryAll($sql);
    }


    public function getOne($id){
        $db = $this->getORM();
        $sql = 'SELECT a.*,b.name ,c.name as customer_name,c.tel  as customer_tel ,d.title as villagea_name FROM db_business a LEFT JOIN db_user b ON a.saleman_id=b.id LEFT JOIN db_customer c ON a.customer_id = c.id LEFT JOIN db_village d	on a.village_id = d.id WHERE a.id = '.$id;
        $data = $db->queryAll($sql);
        $data = $data[0];
        $pM = new BusinessLog();
        $data['plist'] = $pM->getList($id);
        return $data;
    }

    /**
     * 根据uid查询个人业务列表
     * @param $uid
     * @return array
     */
    public function getListByUid($uid){
        $db = $this->getORM();
        $sql = 'SELECT a.*,b.name ,c.name as customer_name,c.tel  as customer_tel ,d.title as villagea_name FROM db_business a LEFT JOIN db_user b ON a.saleman_id=b.id LEFT JOIN db_customer c ON a.customer_id = c.id LEFT JOIN db_village d	on a.village_id = d.id WHERE a.saleman_id = '.$uid.' ORDER BY a.create_time DESC';
        return $db->queryAll($sql);
    }

    /**
     * 根据工程地址查询
     * @param $vid
     * @return mixe
     */
    public function getListByVillageId($vid){
        $db = $this->getORM();
        return $db->where('village_id',$vid)->select('*')->fetchAll();
    }


    public function endBusiness($data,$project){
        $db = $this->getORM();
        $binfo = $db->where('id',$data['id'])->select('*')->fetch();
        if($binfo['status'] != 0){
            throw new BadRequestException('该业务已存档，无法修改！');
        }
        $res =  $db->where('id',$data['id'])->update($data);
        //签单成功，需要添加项目信息
        if($data['status'] == 1){
            $date = date_create($project['sign_time']);
            $project['sign_year'] = date_format($date,'Y');
            $project['sign_month'] = date_format($date,'m');
            $project['village_id'] = $binfo['village_id'];
            $project['house_id'] = $binfo['house_id'];
            $project['saleman_id'] = $binfo['saleman_id'];
            $project['customer_id'] = $binfo['customer_id'];
            $project['business_id'] = $binfo['id'];
            $project['left_money'] = $project['money'];
            $p = new Project();
            return $p->doAdd($project);
        }
        return $res;
    }


    public function getNearBusiness(){
        $db = $this->getORM();
        $sql = 'SELECT a.*,b.name ,c.name as customer_name,c.tel  as customer_tel ,d.title as village_name FROM db_business a LEFT JOIN db_user b ON a.saleman_id=b.id LEFT JOIN db_customer c ON a.customer_id = c.id LEFT JOIN db_village d	on a.village_id = d.id ORDER BY a.create_time DESC LIMIT 0,5';
        return $db->queryAll($sql);
    }

    public function getMostStarBusiness(){
        $db = $this->getORM();
        $sql = 'SELECT a.*,b.name ,c.name as customer_name,c.tel  as customer_tel ,d.title as villagea_name FROM db_business a LEFT JOIN db_user b ON a.saleman_id=b.id LEFT JOIN db_customer c ON a.customer_id = c.id LEFT JOIN db_village d	on a.village_id = d.id  WHERE a.status=0 ORDER BY a.star DESC LIMIT 0,4';
        return $db->queryAll($sql);
    }



    public function getAllCount(){
        $db = $this->getORM();
        return $db->count('*');
    }
}