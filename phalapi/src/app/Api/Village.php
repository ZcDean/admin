<?php
namespace App\Api;

use PhalApi\Api;
use PhalApi\Exception\BadRequestException;


/**
 * 工程地址模块接口
 */
class Village extends Api {



    /**
     * 规则验证
     * @return array
     */
    public function getRules() {
        return array(
            'add' => array(
                'title' => array('name' => 'title','require' => true,'desc'=>'地址名称'),
                'first_letter' => array('name' => 'first_letter','require' => true,'desc'=>'地址首字母，用于排序'),
                'user_id' => array('name' => 'user_id','require' => true,'desc'=>'当前操作者的ID'),
                'status' => array('name' => 'status','default' => 1,'desc'=>'可用标识 0-无法使用'),
            ),
            'delete' => array(
                'id' => array('name' => 'id','require' => true),
            ),
            'update' => array(
                'title' => array('name' => 'title'),
                'status' => array('name' => 'status'),
                'id' => array('name' => 'id','require' => true)

            )
        );
    }


    /**
     * 获取所有工程地址列表
     * @desc 根据地址的首字母进行排序(升序)
     */
    public function getAllList(){
        $D = new \App\Domain\Village();
        return $D->doSelect();
    }

    public function getDetailList(){
        $D = new \App\Domain\Village();
        return $D->getDetailList();
    }

    /**
     * 添加一个工程地址
     */
    public function add(){
        $data = array(
            'title' => $this->title,
            'user_id' => $this->user_id,
            'status' => $this->status,
            'first_letter' => $this->first_letter,
        );
        $D = new \App\Domain\Village();
        return $D->doAdd($data);
    }


    /**
     * 删除工程地址
     */
    public function delete(){
        $PM = new \App\Model\Project();
        $p = $PM->getListByVillageId($this->id);
        if($p && count($p) > 0){
            throw new BadRequestException('当前地址已被使用，无法删除!',10);
        }
        $BM = new \App\Model\Business();
        $b = $BM->getListByVillageId($this->id);
        if($b && count($b) > 0){
            throw new BadRequestException('当前地址已被使用，无法删除!',10);
        }
        $D = new \App\Domain\Village();
        return $D->doDelete($this->id);
    }


    /**
     * 修改地址可用状态
     */
    public function update(){
        $data = array(
            'id' => $this->id
        );
        if($this->title != null){
            $data['title'] = $this->title;
        }
        if($this->status != null){
            $data['status'] = $this->status;
        }
        $D = new \App\Domain\Village();
        return $D->doUpdate($data);
    }

}

?>