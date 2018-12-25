<?php
namespace App\Api;

use PhalApi\Api;


/**
 * 上传文件接口
 */
class Upload extends Api {

    /**
     * 获取参数
     * @return array 参数信息
     */
    public function getRules() {
        return array(
            'uploadImage' => array(
                'file' => array(
                    'name' => 'file',
                    'type' => 'file',
                    'require' => 'true',
                    'min' => 0,
                    'max' => 3*1024 * 1024,
                    'range' => array('image/jpg', 'image/jpeg', 'image/png'),
                    'ext' => array('jpg', 'jpeg', 'png')
                ),
            ),
        );
    }


    /**
     * 上传图片
     */
    public function uploadImage(){
        //设置上传路径 设置方法参考3.2
        \PhalApi\DI()->ucloud->set('save_path',date('Ymd'));

        //新增修改文件名设置上传的文件名称
        \PhalApi\DI()->ucloud->set('file_name', date('Ymd').rand(10000,99999));
        //上传表单名
        $rs = \PhalApi\DI()->ucloud->upfile($this->file);

        return $rs;
    }



}

?>