<?php
/**
 * Created by PhpStorm.
 * User: 29426
 * Date: 2018/10/25
 * Time: 13:49
 */
namespace App\Model;


use PhalApi\Exception\BadRequestException;
use PhalApi\Model\NotORMModel;

class User extends NotORMModel{


    /**
     * 添加一个员工
     */
    public function add($data){
        try{
            $data['id'] = \App\create_uuid();
            $db = $this->getORM();
            $user =  $db->insert($data);
            //插入员工职位的映射关系
            $db_access = new AuthGroupAccess();
            $db_access->add(array(
                'uid' => $data['id'],
                'group_id' => $data['group_id']
            ));
            return $user;
        }catch (\Exception $e){
            throw new BadRequestException('当前手机号已存在',2);
        }
    }

    /**
     * 登录操作
     * @param $data
     */
    public function login($data){
        $db = $this->getORM();
        $user = $db->where('tel=? AND password=?',$data['tel'],$data['pwd'])->select('*')->fetchOne();
        return $user;
    }

    /**
     */
    public function doUpdate($data){
        $db = $this->getORM();
        $user = $db->where('id',$data['id'])->update($data);
        return $user;
    }

    public function doSelect(){
        $db = $this->getORM();
        return $db->order('create_time desc')->select('*');
    }

    /**
     * 不做删除操作，只是不再显示
     * 可能牵扯到项目，或者财务记录，所以暂时不删除员工
     * @param $id
     * @return int
     */
    public function doDelete($id){
        $db = $this->getORM();
        return $db->where('id',$id)->update(array('is_show'=>0));
    }


    public function doDetailSelect(){
        $db = $this->getORM();
        $list = $db->queryAll('SELECT a.* ,d.title, IFNULL(counts ,0) as counts ,IFNULL(amount , 0) as amount ,IFNULL(signs , 0) as signs FROM db_user a LEFT JOIN (SELECT saleman_id,count(*) as counts FROM db_business GROUP BY saleman_id) as b ON a.id = b.saleman_id LEFT JOIN (SELECT saleman_id ,SUM(money) as amount,COUNT(id) as signs FROM db_project GROUP BY saleman_id) as c ON a.id = c.saleman_id LEFT JOIN db_group d ON a.group_id=d.id WHERE a.is_show=1  ORDER BY a.create_time ASC');
        return $list;
    }


    /**
     * 根据职位查询
     * @param $gid
     */
    public function getListByGid($gid){
        $db = $this->getORM();
        return $db->where('group_id',$gid)->select('*')->fetchAll();
    }
}
