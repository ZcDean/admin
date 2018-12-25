<?php
namespace App\Api;

use PhalApi\Api;
use PhalApi\Exception\BadRequestException;


/**
 * 用户模块接口(登录)
 */
class User extends Api {


    /**
     * 规则验证
     * @return array
     */
    public function getRules() {
        return array(
            'login' => array(
                'tel' => array('name' => 'tel','require' => true),
                'pwd' => array('name' => 'pwd','require' => true),
            ),

        );
    }

    /**
     * 用户登录
     * @desc 根据用户名及密码登录验证登录,登录成功后返回用户的相关信息
     * @throws BadRequestException
     */
    public function login(){
        $D = new \App\Domain\User();
        $data = array(
            'tel' => $this->tel,
            'pwd' => $this->pwd
        );
        $res = $D->doLogin($data);
        if($res != false){
            if($res['is_show'] == 0){
                throw new BadRequestException('该账号已被删除!',6);
            }else if($res['status'] == 0){
                throw new BadRequestException('该账号尚未激活!',6);
            }else{
                $log = new \App\Model\Log();
                $log->addLog(array(
                    'user_id' => $res['id'],
                    'content' => '登录了系统'
                ));
            }
        }

        return $res;
    }



}

?>