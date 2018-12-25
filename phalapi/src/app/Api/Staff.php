<?php
namespace App\Api;

use PhalApi\Api;
use PhalApi\Exception\BadRequestException;


/**
 * 员工模块接口服务
 */
class Staff extends Api
{

    /**
     * 规则验证
     * @return array
     */
    public function getRules() {
        return array(
            'add' => array(
                'name' => array('name' => 'name' , 'require' => true),
                'tel' => array('name' => 'tel' , 'require' => true),
                'group_id' => array('name' => 'group_id' , 'require' => true),
                'company_id' => array('name' => 'company_id' , 'require' => true),
                'sex' => array('name' => 'sex','default' => 2),
                'email' => array('name' => 'email','default' => ''),
                'head_img' => array('name' => 'head_img','default' => ''),
                'work_time' => array('name' => 'work_time','require' => true)
            ),
            'update' => array(
                'id' => array('name' => 'id', 'require' => true),
                'name' => array('name' => 'name'),
                'tel' => array('name' => 'tel'),
                'group_id' => array('name' => 'group_id','type' => 'int' ),
                'company_id' => array('name' => 'company_id','type' => 'int' ),
                'sex' => array('name' => 'sex','type' => 'int'),
                'email' => array('name' => 'email'),
                'head_img' => array('name' => 'head_img'),
                'work_time' => array('name' => 'work_time'),
                'status' => array('name' => 'status','type' => 'int'),
                'password' => array('name' => 'password')
            ),
            'delete' => array(
                'id' => array('name' => 'id', 'require' => true)
            ),
            'getAllList' => array(
                'type' => array('name' => 'type' , 'default' => 'simple' , 'desc' => 'simple为简单获取，detail为详细信息')
            )
        );
    }

    /**
     * 获取所有员工列表
     * @desc type=detail时 将返回跟踪数量，累计订单金额，签单数量
     */
    public function getAllList()
    {
        $D = new \App\Domain\User();
        $type = $this->type;
        if ($type == 'simple') {
            return $D->doSelect();
        } elseif ($type == 'detail') {
            return $D->doDetailSelect();
        } else {
            throw new BadRequestException('type值非法');
        }
    }


    /**
     * 添加员工
     */
    public function add(){
        $data = array(
            'name' => $this->name,
            'tel' => $this->tel,
            'group_id' => $this->group_id,
            'company_id' => $this->company_id,
            'sex' => $this->sex,
            'email' => $this->email,
            'head_img' => $this->head_img,
            'work_time' => $this->work_time,

        );
        $D = new \App\Domain\User();
        return $D->doAdd($data);
    }

    /**
     * 修改员工的基本信息
     */
    public function update(){
        $data = array();

        //需要检测的字段
        $keys = array('id','name','tel','group_id','company_id','sex','email','head_img','work_time','status','password');
        $pramas = \App\object2Array($this);
        foreach ($keys as $key){
            if($pramas[$key] != null){
                $data[$key] = $pramas[$key];
            }
        }
        $D = new \App\Domain\User();
        return $D->doUpdate($data);
    }


    /**
     * 删除员工基本信息
     */
    public function delete(){
        $D = new \App\Domain\User();
        return $D->doDelete($this->id);
    }

}

?>