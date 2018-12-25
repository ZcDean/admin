<?php
namespace App\Api;

use PhalApi\Api;


/**
 * 权限接口
 */
class Auth extends Api {

    /**
     * 规则验证
     * @return array
     */
    public function getRules() {
        return array(
            'add' => array(
                'name' => array('name' => 'name','require' => true),
                'title' => array('name' => 'title','require' => true),
                'status' => array('name' => 'status','type' => 'int' ,'default' => 1),
                'belong' => array('name' => 'belong' ,'default' => 'zjb'),
            ),
            'getAuthList' => array(
                'isGroup' => array('name' => 'isGroup','type' => 'int', 'default' => 0)
            )

        );
    }



    public function add(){
        $data = array(
            'name' => $this->name,
            'title' => $this->title,
            'status' => $this->status,
            'belong' => $this->belong
        );
        $D = new \App\Domain\Auth();
        return $D->doAdd($data);
    }

    /**
     * 获取所有权限
     * @desc isGroup是否分组，1表示分组 0-不分组
     * @return mixed
     */
    public function getAuthList(){
        $D = new \App\Domain\Auth();
        return $D->getAuthList($this->isGroup);
    }

}

?>