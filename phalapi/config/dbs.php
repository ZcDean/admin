<?php
/**
 * 分库分表的自定义数据库路由配置
 * 
 * @license     http://www.phalapi.net/license GPL 协议
 * @link        http://www.phalapi.net/
 * @author: dogstar <chanzonghuang@gmail.com> 2015-02-09
 */

return array(
    /**
     * DB数据库服务器集群
     */
    'servers' => array(
        'db_master' => array(                       //服务器标记
            'type'      => 'mysql',                 //数据库类型，暂时只支持：mysql, sqlserver
            'host'      => '127.0.0.1',             //数据库域名
            'name'      => 'sayyas_new',               //数据库名字
            'user'      => 'root',                  //数据库用户名
            'password'  => '',	                    //数据库密码
            'port'      => 3306,                    //数据库端口
            'charset'   => 'UTF8',                  //数据库字符集
        ),
    ),

    /**
     * 自定义路由表
     */
    'tables' => array(
        //通用路由
        '__default__' => array(
            'prefix' => 'db_',
            'key' => 'id',
            'map' => array(
                array('db' => 'db_master'),
            ),
        ),

    ),
);
