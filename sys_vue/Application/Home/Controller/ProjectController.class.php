<?php
namespace Home\Controller;
class ProjectController extends ParentController {
    public function index(){
        $this->display();
    }


    public function pinfo(){

        $this->assign('pages',array('bundles/wangEditor.min.js','js/pinfo.js'));
        $this->display();
    }
}