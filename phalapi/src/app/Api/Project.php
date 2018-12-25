<?php
namespace App\Api;

use PhalApi\Api;


/**
 * 工程模块接口(项目)
 */
class Project extends Api {



    /**
     * 规则验证
     * @return array
     */
    public function getRules() {
        return array(
            'add' => array(
                'village_id' => array('name' => 'village_id','require' => true,'desc'=>'工程地址ID'),
                'house_id' => array('name' => 'house_id','require' => true,'desc'=>'门牌号'),
                'saleman_id' => array('name' => 'saleman_id','require' => true,'desc'=>'销售人员'),
                'customer_id' => array('name' => 'customer_id','require' => true,'desc'=>'客户'),
                'money' => array('name' => 'money' ,'type' => 'float','require' => true,'desc' => '项目金额'),
                'sign_time' => array('name' => 'sign_time' , 'type' => 'date','require' => 'true', 'desc' => '签订日期'),
                'business_id' => array('name' => 'business_id' , 'desc' => '关联的业务编号')
            ),
            'getProjectInfo' => array(
                'id' => array('name' => 'id','require' => 'true')
            ),
            'addLog' => array(
                'project_id' => array('name' => 'project_id' , 'require' => 'true','desc'=>'关联的项目'),
                'title' => array('name' => 'title' , 'require' => 'true'),
                'content' => array('name' => 'content' , 'require' => 'true'),
                'build_time' => array('name' => 'build_time' , 'require' => 'true' , 'type' => 'date','desc'=>'时间'),
            ),
            'addService' => array(
                'project_id' => array('name' => 'project_id' , 'require' => 'true','desc'=>'关联的项目'),
                'title' => array('name' => 'title' , 'require' => 'true'),
                'content' => array('name' => 'content' , 'require' => 'true'),
                'service_time' => array('name' => 'service_time' , 'require' => 'true' , 'type' => 'date','desc'=>'时间'),
            ),
            'deleteLog' => array(
                'id' => array('name' => 'id' , 'require' => 'true')
            ),
            'deleteService' => array(
                'id' => array('name' => 'id' , 'require' => 'true')
            ),
            'endProject' => array(
                'id' => array('name' => 'id' , 'require' => 'true')
            ),
            'delete' => array(
                'id' => array('name' => 'id' ,'require' => 'true')
            ),
            'backProject' => array(
                'id' => array('name' => 'id' ,'require' => 'true')
            ),
            'getProjectListByUid' => array(
                'user_id' => array('name' => 'user_id' , 'require' => 'ture')
            )
        );
    }

    private static $domain;

    public function __construct(){
        self::$domain = new \App\Domain\Project();
    }

    /**
     * 添加项目
     */
    public function add(){
        $data = array(
            'village_id' => $this->village_id,
            'house_id' => $this->house_id,
            'saleman_id' => $this->saleman_id,
            'customer_id' => $this->customer_id,
            'money' => $this->money,
            'sign_time' => $this->sign_time,
            'business_id' => $this->business_id,
        );
        return self::$domain->doAdd($data);
    }


    /**
     * 修改项目的基本信息
     * @desc 倘若项目有关联的业务，则无法修改,暂时只允许修改合同
     */
    public function update(){
        $data = array(
            'contract' => $this->contract
        );
        return self::$domain->doUpdate($data);
    }


    /**
     * 结束当前项目
     * @desc 将该项目的状态修改为售后
     */
    public function endProject(){
        return self::$domain->endProject($this->id);
    }

    /**
     * 回溯项目状态
     * @desc 从售后到进行中，删除所有售后内容
     */
    public function backProject(){
        return self::$domain->backProject($this->id);
    }


    /**
     * 删除一个项目
     * @desc 若项目有付款明细，施工、售后等信息将无法删除
     */
    public function delete(){
        return self::$domain->doDelete($this->id);
    }


    /**
     * 获取项目详情
     * @desc 包含项目的施工明细，售后明细 ，（签订明细）,付款明细
     */
    public function getProjectInfo(){
        return self::$domain->getProjectInfo($this->id);
    }


    /**
     * 获取项目列表
     * @desc
     */
    public function getProjectList(){
        return self::$domain->getProjectList();
    }

    /**
     * 获取项目列表
     * @desc
     */
    public function getProjectListByUid(){
        return self::$domain->getProjectListByUid($this->user_id);
    }




    /**
     * 添加一个项目的施工进度
     */
    public function addLog(){
        $data = array(
            'project_id' => $this->project_id,
            'title' => $this->title,
            'content' => $this->content,
            'build_time' => $this->build_time,
        );
        return self::$domain->addLog($data);
        
    }

    /**
     * 删除一个施工进度
     */
    public function deleteLog(){
        return self::$domain->deleteLog($this->id);
    }

    /**
     * 添加一个项目售后日志
     */
    public function addService(){
        $data = array(
            'project_id' => $this->project_id,
            'title' => $this->title,
            'content' => $this->content,
            'service_time' => $this->service_time,
        );
        return self::$domain->addService($data);
    }

    /**
     * 删除一个项目售后
     */
    public function deleteService(){
        return self::$domain->deleteService($this->id);
    }



}

?>