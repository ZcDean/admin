<?php
/**
 * Created by PhpStorm.
 * User: 29426
 * Date: 2018/10/25
 * Time: 13:53
 */

namespace App\Model;

use PhalApi\Model\NotORMModel;

class Village extends NotORMModel
{

    public function add($data){
        $db = $this->getORM();
        return $db->insert($data);
    }

    public function delete($id){
        $db = $this->getORM();
        return $db->where('id',$id)->delete();
    }


    public function doUpdate($data){
        $db = $this->getORM();
        return $db->where('id',$data['id'])->update($data);
    }

    public function doSelect(){
        $db = $this->getORM();
        return $db->where('status = 1')->order('first_letter ASC')->select('id,title')->fetchAll();
    }

    public function getDetailList(){
        $db = $this->getORM();
        $sql = 'SELECT a.*,b.name FROM db_village a LEFT JOIN db_user b	ON a.user_id=b.id ORDER BY a.first_letter DESC';
        return $db->queryAll($sql);
    }

}