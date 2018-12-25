<?php
namespace App\Api;

use PhalApi\Api;
use PhalApi\Exception\BadRequestException;
use \App\Domain\Finance as FinanceDomain;

/**
 * 财务模块接口
 */
class Finance extends Api {



    /**
     * 规则验证
     * @return array
     */
    public function getRules() {
        return array(
            'add' => array(
                'title' => array('name' => 'title','require' => true,'desc'=>'资金来源或去向'),
                'money' => array('name' => 'money','require' => true,'type' => 'float','desc'=>'交易金额'),
                'type' => array('name' => 'type','require' => true,'desc'=>'income|expense'),
                'description' => array('name' => 'description' ,'require' => true,'desc' => '描述'),
                'trade_time' => array('name' => 'trade_time' , 'type' => 'date','require' => 'true', 'desc' => '交易日期'),
                'project_id' => array('name' => 'project_id' , 'desc' => '关联的项目编号')
            ),
            'delete' => array(
                'id' => array('name' => 'id' , 'require' => 'true')
            ),
            'getAllList' => array(
                'type' => array('name' => 'type','desc' => 'type|all','default'=>'tye')
            ),

        );
    }

    /**
     * 获取财物流水
     * @desc
     */
    public function getAllList(){
        $D = new FinanceDomain();
        if($this->type != 'all'){
            $income = $D->getListByType('income');
            $expense = $D->getListByType('expense');
            return array(
                'income' => $income,
                'expense' => $expense
            );
        }else{
            return $D->getAllList();
        }

    }

    /**
     * 添加流水
     * @desc 如果涉及到项目，则会更新项目的尾款字段
     */
    public function add(){
        $data = array(
            'title' => $this->title,
            'money' => $this->money,
            'type' => $this->type,
            'description' => $this->description,
            'trade_time' => $this->trade_time,
        );
        if($this->project_id != null){
            $data['project_id'] = $this->project_id;
        }
        if($data['type'] != 'income' && $data['type'] != 'expense'){
            throw new BadRequestException('type值非法！');
        }
        $D = new FinanceDomain();
        return $D->doAdd($data);

    }


    /**
     * 删除流水
     * @desc 如果涉及到项目，则会更新项目的尾款字段
     */
    public function delete(){
        $D = new FinanceDomain();
        return $D->doDelete($this->id);
    }
}

?>