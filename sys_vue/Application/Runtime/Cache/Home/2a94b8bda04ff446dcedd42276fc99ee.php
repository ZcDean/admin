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
        
<div class="container-fluid" id="index">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-8 col-sm-12">
                <h2>系统首页</h2>
            </div>
            <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                <ul class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item">系统首页</li>
                </ul>
            </div>
        </div>
    </div>


    <div class="row clearfix">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card">
                <div class="body">
                    <div class="row">
                        <div class="col-3">
                            <i class="icon-user text-primary font-30"></i>
                        </div>
                        <div class="col-6 pt-2">
                            <h6 class="mb-0">本月新增客户</h6>
                        </div>
                        <div class="col-3 font-22 text-center">
                            <p class="mb-0">6</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card">
                <div class="body">
                    <div class="row">
                        <div class="col-3">
                            <i class="icon-handbag text-col-red font-30"></i>
                        </div>
                        <div class="col-6 pt-2">
                            <h6 class="mb-0">本月新增业务</h6>
                        </div>
                        <div class="col-3 font-22 text-center">
                            15
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card">
                <div class="body">
                    <div class="row">
                        <div class="col-2">
                            <i class="icon-heart text-col-orange font-30"></i>
                        </div>
                        <div class="col-5 pt-2">
                            <h6 class="mb-0">本月签单</h6>
                        </div>
                        <div class="col-5 font-22 text-center">
                            4
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card">
                <div class="body">
                    <div class="row">
                        <div class="col-2">
                            <i class="icon-trophy text-success font-30"></i>
                        </div>
                        <div class="col-5 pt-2">
                            <h6 class="mb-0">本月订单</h6>
                        </div>
                        <div class="col-5 font-22 text-center">
                            <i class="fa fa-rmb"></i> 100万
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">

        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="header">
                    <h2>统计汇总</h2>
                </div>
                <div class="body" style="padding-top: 0">
                    <div class="row text-center">
                        <div class="col-6 border-right border-bottom pb-4 pt-4">
                            <div id="Traffic1" class="carousel vert slide" data-ride="carousel" data-interval="3000">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <label class="mb-0">{{year}}年订单完成率</label>
                                        <h4 class="font-30 font-weight-bold text-danger">{{project_style.width}}</h4>
                                    </div>
                                    <div class="carousel-item">
                                        <label class="mb-0">今年失败订单</label>
                                        <h4 class="font-30 font-weight-bold text-danger">0</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 border-bottom pb-4 pt-4">
                            <div id="Traffic1" class="carousel vert slide" data-ride="carousel" data-interval="3000">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <label class="mb-0">{{year}}年转化率</label>
                                        <h4 class="font-30 font-weight-bold text-success">{{transferPersent}}%</h4>
                                    </div>
                                    <div class="carousel-item">
                                        <label class="mb-0">今年新增客户</label>
                                        <h4 class="font-30 font-weight-bold text-primary">52</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header">
                    <h2>意向签单客户</h2>
                </div>
                <div class="body" style="padding-top: 0">
                    <ul class="right_chat list-unstyled">
                        <li class="online" v-for="b in starBusiness">
                            <div class="media">
                                <div class="media-body">
                                    <div class="name">
                                        {{b.customer_name}}、{{b.customer_tel}}
                                        <small class="float-right">{{b.name}}</small>
                                    </div>
                                    <div style="margin-top: 10px;">
                                        {{b.villagea_name}} {{b.house_id}}
                                        <div class="float-right">
                                            <i class="fa fa-star text-primary" v-for="n in Math.floor(b.star)"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="header">
                    <h2>关于森鹰</h2>
                </div>
                <div class="body project_report" style="padding-top: 0;padding-bottom: 0">
                    是一个做窗户的！
                </div>
                <div class="header">
                    <h2>关于E格</h2>
                </div>
                <div class="body project_report" style="padding-top: 0;padding-bottom: 0">
                    是一个做门的！
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="header">
                    <h2>项目 <small>最近项目</small></h2>
                </div>
                <div class="body project_report" style="padding-top: 0;padding-bottom: 0">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tbody>
                            <tr v-for="p in nearProject">
                                <td>
                                    <span class="badge bg-info text-white" v-if="p.status == 1">进行中</span>
                                    <span class="badge bg-warning text-white" v-else-if="p.status == 2">已售后</span>
                                    <span class="badge bg-secondary text-white" v-else-if="p.status == 3">已关闭</span>
                                </td>
                                <td class="project-title">
                                    <h6>{{p.village_name}} {{p.housep_id}}</h6>
                                    <small>{{p.customer_name}} {{hideTel(p.customer_tel)}}</small>
                                </td>
                                <td>
                                    <small>{{timeAgo(p.create_time)}}</small>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="header">
                    <h2>业务 <small>最近业务</small></h2>
                </div>
                <div class="body project_report" style="padding-top: 0;padding-bottom: 0">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tbody>
                            <tr v-for="b in nearbusiness">
                                <td>
                                    <span class="badge badge-success bg-info text-white" v-if="b.status == 0">维护中</span>
                                    <span class="badge bg-success text-white" v-else-if="b.status == 1">已签单</span>
                                    <span class="badge bg-danger text-white" v-else>已关闭</span>
                                </td>
                                <td class="project-title">
                                    <h6>{{b.village_name}} {{b.house_id}}</h6>
                                    <small>{{b.customer_name}} {{hideTel(b.customer_tel)}}</small>
                                </td>
                                <td>
                                    <small>{{timeAgo(b.create_time)}}</small>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="header">
                    <h2>最近更新</h2>
                    <ul class="nav nav-tabs-new2" style="position: absolute;top: 15px;right: 0px;">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#business-update">业务更新</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#project-update">项目更新</a></li>
                    </ul>
                </div>
                <div class="body" style="padding: 0">
                    <div class="tab-content">
                        <div class="tab-pane show active" id="business-update">
                            <ul class="list-unstyled basic-list">
                                <li>
                                    <p>李建 更新了 威尼斯花园9# 王总 <span class="badge badge-info float-right">维护<i class="fa  fa-hand-o-down "> </i></span></p>
                                    <small class="p-l-20">客户来店里喝茶，并咨询了产品。<time class="float-right text-primary">2018-10-23</time></small>
                                </li>
                                <li>
                                    <p>李建 更新了 威尼斯花园9# 王总 <span class="badge badge-info float-right">维护<i class="fa  fa-hand-o-down "> </i></span></p>
                                    <small class="p-l-20">客户来店里喝茶，并咨询了产品。<time class="float-right text-primary">2018-10-23</time></small>
                                </li>
                                <li>
                                    <p>李建 更新了 威尼斯花园9# 王总 <span class="badge badge-info float-right">维护<i class="fa  fa-hand-o-down "> </i></span></p>
                                    <small class="p-l-20">客户来店里喝茶，并咨询了产品。<time class="float-right text-primary">2018-10-23</time></small>
                                </li>
                                <li>
                                    <p>李建 更新了 威尼斯花园9# 王总 <span class="badge badge-info float-right">维护<i class="fa  fa-hand-o-down "> </i></span></p>
                                    <small class="p-l-20">客户来店里喝茶，并咨询了产品。<time class="float-right text-primary">2018-10-23</time></small>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="project-update">
                            <ul class="list-unstyled basic-list">
                                <li>
                                    <p>朱子健 更新了 威尼斯花园9# 王总 <span class="badge badge-warning float-right">售后<i class="fa  fa-hand-o-down "> </i></span></p>
                                    <small class="p-l-20">客户来店里喝茶，并咨询了产品。<time class="float-right text-primary">2018-10-23</time></small>
                                </li>
                                <li>
                                    <p>王小二 更新了 威尼斯花园9# 王总 <span class="badge badge-info float-right">施工<i class="fa  fa-hand-o-down "> </i></span></p>
                                    <small class="p-l-20">客户来店里喝茶，并咨询了产品。<time class="float-right text-primary">2018-10-23</time></small>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card right-box">
                <div class="header">
                    <h2>快捷入口</h2>
                </div>
                <div class="body" style="padding-top: 0">
                    <button type="button" class="btn btn-outline-primary mb-2">我的业务</button>
                    <button type="button" class="btn btn-outline-primary mb-2">待办事项</button>
                    <button type="button" class="btn btn-outline-primary mb-2">今日任务</button>
                    <button type="button" class="btn btn-outline-primary mb-2">我的业务</button>
                    <button type="button" class="btn btn-outline-primary mb-2">我的指标</button>
                    <button type="button" class="btn btn-outline-primary mb-2">个人信息</button>
                    <button type="button" class="btn btn-outline-primary mb-2">我的辉煌业绩</button>
                    <button type="button" class="btn btn-outline-primary mb-2">森鹰门窗</button>
                    <button type="button" class="btn btn-outline-primary mb-2">关于E格</button>
                </div>
            </div>
            <div class="card">
                <div class="header">
                    <h2>系统版本</h2>
                </div>
                <div class="body" style="padding-top: 0">
                    <ul class=" list-unstyled basic-list">
                        <li> 1.0.1 <small class="float-right text-muted">项目管理系统上线</small></li>
                    </ul>
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