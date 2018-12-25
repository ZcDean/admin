<?php
namespace App\Api;

use PhalApi\Api;


/**
 * 项目首页的相关数据接口
 */
class Main extends Api {



    private static $projectDomain;
    private static $businessDomain;

    public function __construct(){
        self::$projectDomain = new \App\Domain\Project();
        self::$businessDomain = new \App\Domain\Business();
    }


    /**
     * 获取最近更新的5条业务
     */
    public function getNearUpdateBusiness(){

    }

    /**
     * 获取最近更新的5条项目
     */
    public function getNearUpdateProject(){

    }


    /**
     * 获取最近添加的业务
     */
    public function getNearBusiness(){
        return self::$businessDomain->getNearBusiness();
    }

    /**
     * 获取最近添加的项目
     */
    public function getNearProject(){
        return self::$projectDomain->getNearProject();
    }



    public function getMostStarBusiness(){
        return self::$businessDomain->getMostStarBusiness();
    }


    /**
     * 获取本月信息
     * @desc eg:本月订单等等...
     */
    public function getMonthInfo(){
        $result = array(
            'busniessCount' => self::$businessDomain->getAllCount(),
            'projectCount' => self::$projectDomain->getAllCount(),
            'yearMoney' => self::$projectDomain->getYearMoney(),
        );
        return $result;
    }

}

?>