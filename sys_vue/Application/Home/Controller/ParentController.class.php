<?php
namespace Home\Controller;
use Think\Controller;
class ParentController extends Controller {



    public function _initialize()
    {
        $this->assign('pages',array('js/'.strtolower(CONTROLLER_NAME).'.js'));
    }


}