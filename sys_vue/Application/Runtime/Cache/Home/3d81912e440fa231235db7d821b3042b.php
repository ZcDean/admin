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

    </style>
    <script>
        const PUBLIC_URL = '/sys_vue/Public';
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
        ]
    </script>
</head>
<body class="theme-blue">

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
                    <li><a href="#"><i class="icon-eyeglasses"></i><span>业务管理</span></a></li>
                    <li><a href="/sys_vue/index.php/Home/Village"><i class="icon-calendar"></i><span>工程地址</span></a></li>
                    <li><a href="#"><i class="icon-trophy"></i><span>至尊无上</span></a></li>
                    <li class="heading">财务</li>
                    <li><a href="/sys_vue/index.php/Home/Finance"><i class="fa fa-money"></i><span>财务管理</span></a></li>
                    <li><a href="#"><i class="icon-graph"></i><span>各类统计</span></a></li>
                    <li class="heading">人文</li>
                    <li><a href="/sys_vue/index.php/Home/Company"><i class="icon-notebook"></i><span>企业信息</span></a></li>
                    <li><a href="/sys_vue/index.php/Home/Staff"><i class="icon-users"></i><span>员工管理</span></a></li>
                    <li><a href="#"><i class="fa fa-cubes"></i><span>职位管理</span></a></li>
                    <li class="heading">个人</li>
                    <li><a href="#"><i class="icon-user"></i><span>个人信息</span></a></li>

                </ul>
            </nav>
        </div>
    </div>

    <div id="main-content">
        
<div class="container-fluid" id="project">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-8 col-sm-12">
                <h2>项目详情</h2>
            </div>
            <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                <ul class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item">项目管理</li>
                    <li class="breadcrumb-item active">项目详情</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-8 col-md-12">
            <div class="card">
                <div class="header">
                    <h2>基本信息</h2>
                </div>
                <div class="body">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <td colspan="4" class="text-center">
                                <b><h5>威尼斯花园5#</h5></b>
                            </td>
                        </tr>
                        <tr>
                            <td><b>项目地址</b></td>
                            <td>威尼斯花园</td>
                            <td><b>门牌号</b></td>
                            <td>5#</td>
                        </tr>
                        <tr>
                            <td><b>客户姓名</b></td>
                            <td>王总</td>
                            <td><b>客户联系方式</b></td>
                            <td>18865532323</td>
                        </tr>
                        <tr>
                            <td><b>项目金额</b></td>
                            <td>1200000</td>
                            <td><b>尾款</b></td>
                            <td>32000</td>
                        </tr>
                        <tr>
                            <td><b>签订日期</b></td>
                            <td>2017-12-15</td>
                            <td><b>业务员</b></td>
                            <td>李鹏涛</td>
                        </tr>
                        <tr>
                            <td><b>状态</b></td>
                            <td><span class="badge badge-dark">进行中...</span></td>
                            <!--<td><b>合同</b></td>-->
                            <!--<td>见‘项目合同’<button class="btn btn-outline-secondary float-right">上传合同</button></td>-->
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="header">
                    <h2 class="clearfix">施工历程 <button class="btn btn-outline-secondary float-right">添加施工进度</button></h2>
                </div>
                <div class="body">
                    <div class="timeline-item blue" date-is="今天 2018-11-20">
                        <h5>Hello, 'Im a single div responsive timeline without media Queries!</h5>
                        <span><a href="javascript:void(0);">Elisse Joson</a> San Francisco, CA</span>
                        <div class="msg">
                            <p>I'm speaking with myself, number one, because I have a very good brain and I've said a lot of things. I write the best placeholder text, and I'm the biggest developer on the web card she has is the Lorem card.</p>
                            <a href="javascript:void(0);" class="m-r-20"><i class="icon-heart"></i> Like</a>
                            <a role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="icon-bubbles"></i> Comment</a>
                        </div>
                    </div>

                    <div class="timeline-item blue" date-is="19-04-2018 - Yesterday">
                        <h5>Oeehhh, that's awesome.. Me too!</h5>
                        <span><a href="javascript:void(0);" title="">Katherine Lumaad</a> Oakland, CA</span>
                        <div class="msg">
                            <p>I'm speaking with myself, number one, because I have a very good brain and I've said a lot of things. on the web by far... While that's mock-ups and this is politics, are they really so different? I think the only card she has is the Lorem card.</p>
                            <a href="javascript:void(0);" class="m-r-20"><i class="icon-heart"></i> Like</a>
                            <a role="button" data-toggle="collapse" href="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1"><i class="icon-bubbles"></i> Comment</a>
                        </div>
                    </div>

                    <div class="timeline-item warning" date-is="21-02-2018">
                        <h5>An Engineer Explains Why You Should Always Order the Larger Pizza</h5>
                        <span><a href="javascript:void(0);" title="">Gary Camara</a> San Francisco, CA</span>
                        <div class="msg">
                            <p>I'm speaking with myself, number one, because I have a very good brain and I've said a lot of things. I write the best placeholder text, and I'm the biggest developer on the web by far... While that's mock-ups and this is politics, is the Lorem card.</p>
                            <a href="javascript:void(0);" class="m-r-20"><i class="icon-heart"></i> Like</a>
                            <a role="button" data-toggle="collapse" href="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2"><i class="icon-bubbles"></i> Comment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-12">

            <div class="card">
                <div class="header">
                    <h2>订单确认图</h2>
                </div>
                <div class="body text-center" style="padding-top: 0;">
                    <img src="http://localhost/tx.jpg" alt="项目合同" style="max-width: 100%;max-height: 500px;margin: 0 auto">
                </div>
            </div>

            <div class="card">
                <div class="header">
                    <h2 class="clearfix">项目合同 <button class="btn btn-outline-secondary float-right">上传合同</button></h2>
                </div>
                <div class="body" style="padding-top: 0">
                    尚未上传
                </div>
            </div>
            <div class="card">
                <div class="header">
                    <h2>财务记录</h2>
                </div>
                <div class="body" style="padding-top: 0">
                    <div class="new_timeline">
                        <ul>
                            <li>
                                <div class="bullet pink"></div>
                                <div class="time">今天</div>
                                <div class="desc">
                                    <h3>首付款</h3>
                                    <h4>项目首付款！</h4>
                                </div>
                            </li>
                            <li>
                                <div class="bullet green"></div>
                                <div class="time">12pm</div>
                                <div class="desc">
                                    <h3>Design Team</h3>
                                    <h4>Hangouts</h4>
                                </div>
                            </li>
                            <li>
                                <div class="bullet orange"></div>
                                <div class="time">1:30pm</div>
                                <div class="desc">
                                    <h3>Lunch Break</h3>
                                </div>
                            </li>
                            <li>
                                <div class="bullet green"></div>
                                <div class="time">2pm</div>
                                <div class="desc">
                                    <h3>Finish</h3>
                                    <h4>Go to Home</h4>
                                </div>
                            </li>
                        </ul>
                    </div>
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
<script src="/sys_vue/Public/js/config.js"></script>
<script src="/sys_vue/Public/js/util.js"></script>
<script src="/sys_vue/Public/js/<?php echo (CONTROLLER_NAME); ?>.js"></script>

</body>
</html>