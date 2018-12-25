<?php
namespace App\Api;

use App\Domain\BusinessLog;
use App\Domain\Business as BussinessDomain;
use PhalApi\Api;
use PhalApi\Exception\BadRequestException;


/**
 * 业务模块接口
 */
class Business extends Api {


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
                'follow_time' => array('name' => 'follow_time','type' => 'date','require' => true,'desc'=>'跟踪时间'),
            ),
            'updateBaseInfo' => array(
                'id' => array('name' => 'id' , 'require' => true),
                'village_id' => array('name' => 'village_id','desc'=>'工程地址ID'),
                'house_id' => array('name' => 'house_id','desc'=>'门牌号'),
                'customer_id' => array('name' => 'customer_id','desc'=>'客户')
            ),
            'getListByUid' => array(
                'user_id' => array('name' => 'user_id' ,'require'=>true)
            ),
            'endBusiness' => array(
                'id' => array('name' => 'id' , 'type' => 'int', 'require' => true),
                'status' => array('name' => 'status' , 'require' => true,'desc' => '1=成功，2=失败'),
                'reason' => array('name' => 'reason' , 'require' => true,'desc' => '原因说明'),
                'money' => array('name' => 'money','type' => 'float'),
                'sign_time' => array('name' => 'sign_time','type' => 'date'),
            ),
            'getOne' => array(
                'id' => array('name' => 'id' , 'require' => true),
            ),
            'addLog' => array(
                'id' => array('name' => 'id' , 'require' => true),
                'title' => array('name' => 'title' , 'require' => true ,'desc' => '标题'),
                'content' => array('name' => 'content' , 'require' => true,'desc' => '内容'),
                'follow_time' => array('name' => 'follow_time' , 'type'=>'date', 'require' => true),
            ),
            'deleteLog' => array(
                'id' => array('name' => 'id', 'require' => true , 'desc' => '日志ID')
            )

        );
    }

    /**
     * 获取所有业务列表
     * @desc
     */
    public function getAllList(){
        $D = new BussinessDomain();
        return $D->getAllList();
    }

    /**
     * 获取某个人的所有业务
     * @desc
     */
    public function getListByUid(){
        $D = new BussinessDomain();
        return $D->getListByUid($this->user_id);
    }

    /**
     * 获取某个业务详情
     * @desc 包含业务的跟踪明细
     */
    public function getOne(){
        $D = new BussinessDomain();
        return $D->getOne($this->id);
    }


    /**
     * 添加业务
     */
    public function add(){
        $data = array(
            'village_id' => $this->village_id,
            'house_id' => $this->house_id,
            'saleman_id' => $this->saleman_id,
            'customer_id' => $this->customer_id,
            'follow_time' => $this->follow_time,
        );
        $D = new BussinessDomain();
        return $D->doAdd($data);
    }

    /**
     * 删除业务
     */
    public function delete(){
        return '业务暂不支持删除！';
    }


    /**
     * 修改业务信息
     * @desc 只允许修改业务的基本信息,客户信息，工程地址的信息
     */
    public function updateBaseInfo(){
        $data = array(
            'id' => $this->id
        );
        if($this->village_id != null){
            $data['village_id'] = $this->village_id;
        }
        if($this->house_id != null){
            $data['house_id'] = $this->house_id;
        }
        if($this->customer_id != null){
            $data['customer_id'] = $this->customer_id;
        }
        $D = new BussinessDomain();
        return $D->doUpdate($data);
    }

    /**
     * 结束当前业务
     * @desc 根据传入的statusz状态判断，status = 1 转换成项目，status = 2 业务签单失败 当status为1时，必须要传入的字段 ，money项目金额,sign_time签订日期
     */
    public function endBusiness(){
        $data = array(
            'id' => $this->id,
            'status' => $this->status,
            'reason' => $this->reason
        );
        $pro = array(
            'money' => $this->money,
            'sign_time' => $this->sign_time
        );
        if($data['status'] != 1 && $data['status'] != 2){
            throw new BadRequestException('业务状态非法！');
        }
        if($data['status'] == 1 && ($this->money == null || $this->sign_time == null)){
            throw new BadRequestException('转换项目时缺少参数！');
        }
        $D = new BussinessDomain();
        return $D->endBusiness($data,$pro);

    }

    /**
     * 添加一个业务进度
     */
    public function addLog(){
        $data = array(
            'business_id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'follow_time' => $this->follow_time
        );
        $log = new BusinessLog();
        return $log->doAdd($data);
    }

    /**
     * 添加一个业务进度
     */
    public function deleteLog(){
        $log = new BusinessLog();
        return $log->doDelete($this->id);
    }

}

?>