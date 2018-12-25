<?php
/**
 * Created by PhpStorm.
 * User: 29426
 * Date: 2018/10/26
 * Time: 15:47
 */
namespace App\Api;

use PhalApi\Api;

/**
 * 用户分组（职位相关接口）
 * Class Group
 * @package App\Api
 */
class Group extends Api{

    /**
     * 规则验证
     * @return array
     */
    public function getRules() {
        return array(
            'add' => array(
                'title' => array('name' => 'title','require' => true,'desc'=>'职位名称'),
                'rules' => array('name' => 'rules','require' => true,'desc'=>'权限集合'),
                'status' => array('name' => 'status','desc' => '可用标识')
            ),
            'update' => array(
                'id' => array('name' => 'id','require' => true),
                'title' => array('name' => 'title','desc'=>'职位名称'),
                'rules' => array('name' => 'rules','desc'=>'权限集合'),
                'status' => array('name' => 'status','desc' => '可用标识')
            ),
            'delete' => array(
                'id' => array('name' => 'id','require' => true)
            ),
            'getAllList' => array(
                'status' => array('name' => 'status' , 'type' => 'int' ,'default' => 1)
            )

        );
    }

    public function add(){
        $data = array(
            'title' => $this->title,
            'rules' => $this->rules,
        );
        if($this->status != null){
            $data['status'] = $this->status;
        }

        $D = new \App\Domain\Group();
        return $D->doAdd($data);
    }


    /**
     * 获取所有职位
     * @desc  -1获取所有 否则获取status=1的
     * @return mixed
     */
    public function getAllList(){
        $D = new \App\Domain\Group();
        return $D->getAllList($this->status);
    }



    public function update(){
        $data = array(
            'id' => $this->id
        );
        if($this->title != null){
            $data['title'] = $this->title;
        }
        if($this->rules != null){
            $data['rules'] = $this->rules;
        }
        if($this->status != null){
            $data['status'] = $this->status;
        }
        $D = new \App\Domain\Group();
        return $D->doUpdate($data);
    }

    public function delete(){
        $D = new \App\Domain\Group();
        return $D->doDelete($this->id);
    }


}