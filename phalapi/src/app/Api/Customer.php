<?php
namespace App\Api;

use PhalApi\Api;
use PhalApi\Exception\BadRequestException;


/**
 * 客户模块接口
 */
class Customer extends Api {



    /**
     * 规则验证
     * @return array
     */
    public function getRules() {
        return array(
            'add' => array(
                'name' => array('name' => 'name','require' => true,'desc'=>'客户名称'),
                'tel' => array('name' => 'tel','require' => true,'desc'=>'客户联系方式'),
                'address' => array('name' => 'address','desc'=>'客户住址'),
                'company' => array('name' => 'company','desc'=>'客户单位'),
                'from' => array('name' => 'from','desc'=>'来源(可以是介绍人的ID，也可以是其他)'),
                'remark' => array('name' => 'remark','desc'=>'备注'),
            ),
            'update' => array(
                'id' => array('name' => 'id' , 'require' => true),
                'name' => array('name' => 'name','desc'=>'客户名称'),
                'tel' => array('name' => 'tel','desc'=>'客户联系方式'),
                'address' => array('name' => 'address','desc'=>'客户住址'),
                'company' => array('name' => 'company','desc'=>'客户单位'),
                'from' => array('name' => 'from','desc'=>'来源(可以是介绍人的ID，也可以是其他)'),
                'remark' => array('name' => 'remark','desc'=>'备注'),
            ),

        );
    }



    /**
     * 添加客户
     */
    public function add(){
        $data = array(
            'name' => $this->name,
            'tel' => $this->tel
        );
        if($this->address != null){
            $data['address'] = $this->address;
        }
        if($this->company != null){
            $data['company'] = $this->company;
        }
        if($this->from != null){
            $data['from'] = $this->from;
        }
        if($this->remark != null){
            $data['remark'] = $this->remark;
        }
        $D = new \App\Domain\Customer();
        return $D->doAdd($data);
    }


    /**
     * 更新客户信息
     */
    public function update(){
        $data = array(
            'id' => $this->id
        );
        if($this->name != null){
            $data['name'] = $this->name;
        }
        if($this->tel != null){
            $data['tel'] = $this->tel;
        }
        if($this->address != null){
            $data['address'] = $this->address;
        }
        if($this->company != null){
            $data['company'] = $this->company;
        }
        if($this->from != null){
            $data['from'] = $this->from;
        }
        if($this->remark != null){
            $data['remark'] = $this->remark;
        }
        $D = new \App\Domain\Customer();
        return $D->doUpdate($data);
    }


    /**
     * 仅仅获取所有客户信息
     */
    public function getSimpleList(){
        $D = new \App\Domain\Customer();
        return $D->getSimpleList();
    }

    /**
     * 获取客户的详细信息
     * @desc 累计订单次数、累计订单金额,介绍订单次数等
     */
    public function getDetailList(){
        $D = new \App\Domain\Customer();
        return $D->getDetailList();
    }

    /**
     * 删除客户信息（暂不实现）
     */
    public function delete(){
        return '当前接口尚未实现';
    }

}

?>