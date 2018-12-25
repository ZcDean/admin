<?php
/**
 * Created by PhpStorm.
 * User: 29426
 * Date: 2018/10/25
 * Time: 13:49
 */
namespace App\Model;
use PhalApi\Exception\BadRequestException;
use PhalApi\Model\NotORMModel;

class Project extends NotORMModel{





    /**
     * 添加项目
     */
    public function doAdd($data){
        $db = $this->getORM();
        return $db->insert($data);
    }





    public function doUpdate($data){
        $db = $this->getORM();
        return $db->where('id',$data['id'])->update($data);
    }


    /**
     * 查询项目列表
     * @return array
     */
    public function getProjectList(){
        $db = $this->getORM();
        $sql = 'SELECT a.*,b.title as village_name , c.name as user_name , d.name as customer_name,d.tel as customer_tel FROM db_project a LEFT JOIN db_village b ON a.village_id=b.id LEFT JOIN db_user c ON a.saleman_id=c.id LEFT JOIN db_customer d ON a.customer_id=d.id ORDER BY a.sign_time DESC';
        return $db->queryAll($sql);
    }

    /**
     * 查询某个人的项目
     * @param $user_id
     * @return array
     */
    public function getProjectListByUid($user_id){
        $db = $this->getORM();
        $sql = "SELECT a.*,b.title as village_name , c.name as user_name , d.name as customer_name,d.tel as customer_tel FROM db_project a LEFT JOIN db_village b ON a.village_id=b.id LEFT JOIN db_user c ON a.saleman_id=c.id LEFT JOIN db_customer d ON a.customer_id=d.id  WHERE a.saleman_id='$user_id' ORDER BY a.sign_time DESC";
        return $db->queryAll($sql);
    }


    public function getProjectInfo($id){
        $db = $this->getORM();
        $sql = 'SELECT a.*,b.title as village_name , c.name as user_name , d.name as customer_name,d.tel as customer_tel FROM db_project a LEFT JOIN db_village b ON a.village_id=b.id LEFT JOIN db_user c ON a.saleman_id=c.id LEFT JOIN db_customer d ON a.customer_id=d.id WHERE a.id = '.$id;
        $pinfo = $db->queryAll($sql);
        $pinfo = $pinfo[0];
        $logM = new ProjectLog();
        $pinfo['logList'] = $logM->getListByPid($id);
        $serviceM = new ProjectService();
        $pinfo['serviceList'] = $serviceM->getListByPid($id);
        $financeM = new Finance();
        $pinfo['financeList'] = $financeM->getListByPid($id);
        return $pinfo;
    }

    public function getProjectStatus($id){
        $db = $this->getORM();
        return $db->where('id',$id)->select('status')->fetch();
    }


    public function backProject($id){
        $db = $this->getORM();
        //删除项目对应的售后
        $sM = new ProjectService();
        $sM->deleteByPid($id);
        return $db->where('id',$id)->update(array('status' => 1));
    }


    public function endProject($id){
        $db = $this->getORM();
        return $db->where('id',$id)->update(array('status' => 2));
    }


    public function doDelete($id){
        $logM = new ProjectLog();
        $plist = $logM->getListByPid($id);
        if(count($plist) > 0){
            throw new BadRequestException('该项目存在施工记录，无法删除！');
        }
        $serviceM = new ProjectService();
        $slist = $serviceM->getListByPid($id);
        if(count($slist) > 0){
            throw new BadRequestException('该项目存在售后记录，无法删除');
        }
        $financeM = new Finance();
        $flist = $financeM->getListByPid($id);
        if(count($flist) > 0){
            throw new BadRequestException('该项目存在财务记录，无法删除');
        }
        $db = $this->getORM();
        return $db->where('id',$id)->delete();
    }


    /**
     * 更新项目尾款
     */
    public function updateLeftMoney($id,$money){
        $db = $this->getORM();
        return $db->where('id',$id)->update(array('left_money' => new \NotORM_Literal('left_money + '.$money)));
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


    public function getNearProject(){
        $db = $this->getORM();
        $sql = 'SELECT a.*,b.title as village_name , c.name as user_name , d.name as customer_name,d.tel as customer_tel FROM db_project a LEFT JOIN db_village b ON a.village_id=b.id LEFT JOIN db_user c ON a.saleman_id=c.id LEFT JOIN db_customer d ON a.customer_id=d.id ORDER BY a.sign_time DESC LIMIT 0,5';
        return $db->queryAll($sql);
    }

    public function getAllCount(){
        $db = $this->getORM();
        return $db->where('business_id != ""')->count('*');
    }

    public function getYearMoney(){
        $db = $this->getORM();
        return $db->where('sign_year',date('Y'))->sum('money');
    }
}
