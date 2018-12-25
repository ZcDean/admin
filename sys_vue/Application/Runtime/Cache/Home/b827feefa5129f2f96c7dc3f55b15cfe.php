<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <title>项目管理系统</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="Mplify Bootstrap 4.1.1 Admin Template">
    <meta name="author" content="ThemeMakker, design by: ThemeMakker.com">

    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="/sys_vue/Public/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/sys_vue/Public/plugins/animate-css/animate.min.css">
    <link rel="stylesheet" href="/sys_vue/Public/plugins/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="/sys_vue/Public/plugins/sweetalert/sweetalert.css">

    <link rel="stylesheet" href="/sys_vue/Public/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/sys_vue/Public/plugins/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css">
    <link rel="stylesheet" href="/sys_vue/Public/plugins/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css">
    <link rel="stylesheet" href="/sys_vue/Public/plugins/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="/sys_vue/Public/css/main.css">
    <link rel="stylesheet" href="/sys_vue/Public/css/color_skins.css">
    <style>
        .l-h-36{
            line-height: 36px;
        }
        .select-customer-container{
            display: flex;
        }
        .select-customer{
            flex: 1;
        }
        table{
            width: 100% !important;
        }
        .timeline-item:after{
            top:1.3em;
        }
        .p-log-list:hover{
            cursor: pointer;
        }
        .btn-remove-log{
            display: none;
        }
        .p-log-list:hover .btn-remove-log{
            display: block;
        }

        .btn-delete-service{
            display: none;
        }
        .card-sercice:hover .btn-delete-service{
            display: block;
        }

    </style>
    <script>
        const PUBLIC_URL = '/sys_vue/Public';
        const MODULE_URL = '/sys_vue/index.php/Home';
        //表格语言配置
        const LANGUAGE = {
            "sProcessing": "处理中...",
            "sLengthMenu": "显示 _MENU_ 项结果",
            "sZeroRecords": "<img src='"+PUBLIC_URL+"/images/nodata.png'>",
            "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
            "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
            "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
            "sSearch": "搜索:",
            "sEmptyTable": "<img src='"+PUBLIC_URL+"/images/nodata.png'>",
            "sLoadingRecords": "<img src='"+PUBLIC_URL+"/images/loading.gif' style='width: 30px;height:30px;'>",
            "sInfoThousands": ",",
            "oPaginate": {
                "sFirst": "首页",
                "sPrevious": "上一页",
                "sNext": "下一页",
                "sLast": "末页"
            }
        };
        var villageList = [
            {
                id:1,
                status:1,
                title:'国家软件园'
            },
            {
                id:2,
                status:0,
                title:'新乐苑'
            }
        ];
        var companyList = [
            {
                'id':1,
                'name':'森鹰铝包木',
                'address':'无锡华夏家居港',
                'tel':'',
                'email':'',
                'fax':'',
                'boss':'',
                'remark':'世界铝包木20强'
            },
            {
                'id':2,
                'name':'E格门窗',
                'address':'无锡1969创业园区',
                'tel':'',
                'email':'',
                'fax':'',
                'boss':'',
                'remark':'没有最好，只有更好'
            }
        ];
    </script>
</head>
<body class="theme-blue">

<div class="loading-box">
    <div class="loading">
        <div class="spinner">
            <div class="spinner-container container1">
                <div class="circle1"></div>
                <div class="circle2"></div>
                <div class="circle3"></div>
                <div class="circle4"></div>
            </div>
            <div class="spinner-container container2">
                <div class="circle1"></div>
                <div class="circle2"></div>
                <div class="circle3"></div>
                <div class="circle4"></div>
            </div>
            <div class="spinner-container container3">
                <div class="circle1"></div>
                <div class="circle2"></div>
                <div class="circle3"></div>
                <div class="circle4"></div>
            </div>
        </div>
    </div>
</div>

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="/sys_vue/Public/images/logo.png" width="48" height="48" alt="Mplify"></div>
        <p>Please wait...</p>
    </div>
</div>
<!-- Overlay For Sidebars -->
<div class="overlay" style="display: none;"></div>

<div id="wrapper">

    <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">

            <div class="navbar-brand">
                <a href="index.html">
                    <img src="/sys_vue/Public/images/logo-icon.svg" alt="Mplify Logo" class="img-responsive logo">
                    <span class="name">SAYYAS</span>
                </a>
            </div>

            <div class="navbar-right">
                <ul class="list-unstyled clearfix mb-0">
                    <li>
                        <div class="navbar-btn btn-toggle-show">
                            <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
                        </div>
                        <a href="javascript:void(0);" class="btn-toggle-fullwidth btn-toggle-hide"><i class="fa fa-bars"></i></a>
                    </li>

                    <li>
                        <div id="navbar-menu">
                            <ul class="nav navbar-nav">


                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                        <img class="rounded-circle" src="http://localhost/tx.jpg" width="30" alt="">
                                    </a>
                                    <div class="dropdown-menu user-profile">
                                        <div class="d-flex p-3 align-items-center">
                                            <div class="drop-left m-r-10">
                                                <img src="http://localhost/tx.jpg" class="rounded" width="50" alt="">
                                            </div>
                                            <div class="drop-right">
                                                <h4>Samuel Morriss</h4>
                                                <p class="user-name">samuelmorris@info.com</p>
                                            </div>
                                        </div>
                                        <div class="m-t-10 p-3 drop-list">
                                            <ul class="list-unstyled">
                                                <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>我的消息</a></li>
                                                <li><a href="javascript:void(0);"><i class="icon-settings"></i>设置</a></li>
                                                <li class="divider"></li>
                                                <li><a href="page-login.html"><i class="icon-power"></i>退出登录</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="leftsidebar" class="sidebar">
        <div class="sidebar-scroll">
            <nav id="leftsidebar-nav" class="sidebar-nav">
                <ul id="main-menu" class="metismenu">
                    <li class="heading">首页</li>
                    <li><a href="index.html"><i class="icon-home"></i><span>首页</span></a></li>
                    <li class="heading">业务</li>
                    <li><a href="/sys_vue/index.php/Home/Project"><i class="fa fa-pagelines"></i><span>项目管理</span></a></li>
                    <li><a href="/sys_vue/index.php/Home/Business"><i class="icon-eyeglasses"></i><span>业务管理</span></a></li>
                    <li><a href="/sys_vue/index.php/Home/Village"><i class="icon-calendar"></i><span>工程地址</span></a></li>
                    <li><a href="#"><i class="icon-trophy"></i><span>客户管理</span></a></li>
                    <li class="heading">财务</li>
                    <li><a href="/sys_vue/index.php/Home/Finance"><i class="fa fa-money"></i><span>财务管理</span></a></li>
                    <li><a href="#"><i class="icon-graph"></i><span>各类统计</span></a></li>
                    <li class="heading">人文</li>
                    <li><a href="/sys_vue/index.php/Home/Company"><i class="icon-notebook"></i><span>企业信息</span></a></li>
                    <li><a href="/sys_vue/index.php/Home/Staff"><i class="icon-users"></i><span>员工管理</span></a></li>
                    <li><a href="/sys_vue/index.php/Home/Group"><i class="fa fa-cubes"></i><span>职位管理</span></a></li>
                    <li class="heading">个人</li>
                    <li><a href="#"><i class="icon-user"></i><span>个人信息</span></a></li>

                </ul>
            </nav>
        </div>
    </div>

    <div id="main-content">
        
<div class="container-fluid" id="group">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-8 col-sm-12">
                <h2>职位管理</h2>
            </div>
            <div class="col-lg-7 col-md-2 col-sm-12 text-right">
                <ul class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item">职位管理</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row clearfix">

        <div class="col-12">
            <div class="card">
                <div class="body">
                    <ul class="nav nav-tabs-new2">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Home-new2" data-index="0">职位列表</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#add-finance" data-index="1">添加职位</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane  active show" id="Home-new2">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover text-center " id="group-list">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>职位名称</th>
                                        <th>职位描述</th>
                                        <th>状态</th>
                                        <th>权限列表</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(g,index) in groupList">
                                        <td>{{index+1}}</td>
                                        <td>{{g.title}}</td>
                                        <td>{{g.description || '-'}}</td>
                                        <td><span class='badge badge-success' v-if="g.status==1">可用</span>
                                            <span class='badge badge-danger' v-else>不可用</span></td>
                                        <td>
                                                <span class="badge badge-info" v-for="r in g.ch_rules">
                                                    {{r}}
                                                </span>
                                        </td>
                                        <td>
                                            <span class="badge badge-warning" v-if="g.can_del==0">该职位不可操作！</span>
                                            <section v-else-if="g.can_del==1">
                                                <button class="btn btn-outline-primary btn-edit-group" :data-index="index" title="编辑"><i class="icon icon-pencil"></i></button>
                                                <button class="btn btn-outline-secondary" v-show="g.status==1" title="禁用"><i class="icon icon-lock"></i></button>
                                                <button class="btn btn-outline-secondary" v-show="g.status!=1" title="解锁"><i class="icon icon-lock-open"></i></button>
                                                <button class="btn btn-outline-danger btn-remove-group" :data-gid="g.id"  title="删除"><i class="glyphicon glyphicon-remove"></i></button>
                                            </section>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="add-finance">
                            ####
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!--//修改权限弹窗-->
    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="largeModalLabel">职位编辑</h4>
                </div>
                <div class="modal-body" style="font-size: 16px;">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-1 l-h-36">名称</div>
                            <div class="col-11">
                                <input class="form-control"  v-model="editTitle">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-1">描述</div>
                            <div class="col-11">
                                <textarea class="form-control" rows="2" v-model="editDesctiption">
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-1">权限</div>
                            <div class="col-11">
                                <!--<table class="table table-bordered my-table">-->
                                <!--<thead>-->
                                <!--<tr>-->
                                <!--<th>职位</th>-->
                                <!--<th width="90%">权限列表</th>-->
                                <!--</tr>-->
                                <!--</thead>-->
                                <!--<tbody>-->
                                <!--<tr>-->

                                <!--<td class="text-center" style="vertical-align: middle">总经理                                                                    </td>-->
                                <!--<td>-->
                                <!---->

                                <!--</td>-->
                                <!--</tr>-->
                                <!--<tr>-->
                                <!--<td rowspan="2"></td>-->
                                <!--<td>-->
                                <!--<label for="checkAll">全选</label>-->
                                <!--<input type="checkbox" id="checkAll">-->
                                <!--</td>-->
                                <!--</tr>-->
                                <!--</tbody>-->
                                <!--</table>-->
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr v-for="(r, key, i) in ruleListhg">
                                        <td width="10%" style="vertical-align: middle;text-align: center">
                                            <label class="fancy-checkbox">
                                                <input type="checkbox" name="checkbox" :for="key" :id="key">
                                                <span>{{getAuthBelong(key)}}</span>
                                            </label>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-lg-2 col-sm-3" v-for="(item,index) in r">
                                                    <label class="fancy-checkbox">
                                                        <input type="checkbox" name="checkbox" :value="item.id" :name="'actions['+key+'][]'" checked v-if="editRules.indexOf(item.id) > -1" >
                                                        <input type="checkbox" name="checkbox" :value="item.id" :name="'actions['+key+'][]'"  v-else>
                                                        <span>{{item.title}}</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="10%" style="vertical-align: middle;text-align: center">
                                        </td>
                                        <td>
                                            <label class="fancy-checkbox">
                                                <input type="checkbox" name="checkbox" id="checkAll">
                                                <span>全选</span>
                                            </label>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">保存</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">取消</button>
                </div>
            </div>
        </div>
    </div>

</div>


    </div>

</div>



<!-- Javascript -->
<script src="/sys_vue/Public/bundles/libscripts.bundle.js"></script>
<script src="/sys_vue/Public/bundles/vendorscripts.bundle.js"></script>


<script src="/sys_vue/Public/bundles/datatablescripts.bundle.js"></script>
<script src="/sys_vue/Public/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
<script src="/sys_vue/Public/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
<script src="/sys_vue/Public/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
<script src="/sys_vue/Public/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
<script src="/sys_vue/Public/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>

<script src="/sys_vue/Public/plugins/sweetalert/sweetalert.min.js"></script>

<script src="/sys_vue/Public/plugins/bootstrap-progressbar/js/bootstrap-progressbar.min.js"></script>


<script src="/sys_vue/Public/bundles/mainscripts.bundle.js"></script>
<script src="/sys_vue/Public/bundles/morrisscripts.bundle.js"></script>
<script src="/sys_vue/Public/bundles/vue.js"></script>
<script src="/sys_vue/Public/js/app.js"></script>
<script src="/sys_vue/Public/js/config.js"></script>
<script src="/sys_vue/Public/js/util.js"></script>
<?php if(is_array($pages)): $i = 0; $__LIST__ = $pages;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$page): $mod = ($i % 2 );++$i;?><script src="/sys_vue/Public/<?php echo ($page); ?>"></script><?php endforeach; endif; else: echo "" ;endif; ?>
</body>
</html>