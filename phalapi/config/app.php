<?php
/**
 * 请在下面放置任何您需要的应用配置
 *
 * @license     http://www.phalapi.net/license GPL 协议
 * @link        http://www.phalapi.net/
 * @author dogstar <chanzonghuang@gmail.com> 2017-07-13
 */

return array(

    /**
     * 应用接口层的统一参数
     */
    'apiCommonRules' => array(
        'uid' => array(
            'name' => 'uid', 'require' => true,'desc' => '操作者ID，用于权限校验'
        )
    ),

    /**
     * 接口服务白名单，格式：接口服务类名.接口服务方法名
     *
     * 示例：
     * - *.*         通配，全部接口服务，慎用！
     * - Site.*      Api_Default接口类的全部方法
     * - *.Index     全部接口类的Index方法
     * - Site.Index  指定某个接口服务，即Api_Default::Index()
     */
    'service_whitelist' => array(
        'User.Login',
        'Main.*',
        'Auth.getAuthList'
    ),

    //权限校验
    'auth' => array(
        'auth_on' => true, // 认证开关
        'auth_user' => 'user', // 用户信息表
        'auth_group' => 'group', // 组数据表名
        'auth_group_access' => 'group_access', // 用户-组关系表
        'auth_rule' => 'rule', // 权限规则表
        'auth_not_check_user' => array('5e5fe7c988ae4bdda9af291a66e8fc91') //跳过权限检测的用户
    ),

    //uuid 使用手机号+token进行生成
    'uuid_token' => 'sayyas',

    /**
     * 云上传引擎,支持local,oss,upyun
     */
    'UCloudEngine' => 'local',

    /**
     * 本地存储相关配置（UCloudEngine为local时的配置）
     */
    'UCloud' => array(
        //对应的文件路径
        'host' => 'http://dev.phalapi.net/upload'
    ),
);
