<?php
/**
 * Created by PhpStorm.
 * User: 29426
 * Date: 2018/10/25
 * Time: 10:07
 */
namespace App\Common;


use PhalApi\Exception\BadRequestException;
use PhalApi\Filter;

class SignFilter implements Filter {


    public function check()
    {


        $di = \PhalApi\DI();
        //TODO 需要判断是否登录


        //权限验证
        $api=$di->request->get('service','Default.Index'); //获取当前访问的接口
        $userId=$di->request->get('uid','');//获取用户id参数
        $r=$di->authLite->check($api,$userId);
        if(!$r){
            //抛出异常
           throw new BadRequestException('没有访问权限！',3);
        }

    }
}