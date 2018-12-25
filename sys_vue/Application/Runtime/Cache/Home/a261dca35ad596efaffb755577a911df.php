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
                    <li><a href="/sys_vue/index.php/Home/Business"><i class="icon-eyeglasses"></i><span>业务管理</span></a></li>
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
        
<div class="container-fluid" id="pinfo">
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
                <div class="header clearfix">
                    <h2 >基本信息
                        <span class="badge btn-outline-primary" v-if="business_id != null">项目涉及业务，无法修改基本信息</span>
                        <span v-else>
                            <button class="btn btn-outline-danger float-right" v-on:click="modify"  v-if="isModify == 'yes'">保存</button>
                            <button class="btn btn-outline-secondary float-right" v-on:click="isModify='yes'" v-else-if="isModify=='no'">修改</button>
                        </span>
                    </h2>

                </div>
                <div class="body">
                    <table class="table table-bordered" v-if="isModify=='no'">
                        <tbody>
                        <tr>
                            <td colspan="4" class="text-center clearfix">
                                <b><h5>{{village_name}}-{{house_id}}</h5></b>
                            </td>
                        </tr>
                        <tr>
                            <td><b>项目地址</b></td>
                            <td>{{village_name}}</td>
                            <td><b>门牌号</b></td>
                            <td>{{house_id}}</td>
                        </tr>
                        <tr>
                            <td><b>客户姓名</b></td>
                            <td>{{customer_name}}</td>
                            <td><b>客户联系方式</b></td>
                            <td>{{customer_tel}}</td>
                        </tr>
                        <tr>
                            <td><b>项目金额</b></td>
                            <td><i class="fa fa-rmb"></i>{{money}}</td>
                            <td><b>尾款</b></td>
                            <td><i class="fa fa-rmb"></i>{{left_money}}</td>
                        </tr>
                        <tr>
                            <td><b>签订日期</b></td>
                            <td>{{sign_time}}</td>
                            <td><b>业务员</b></td>
                            <td>{{user_name}}</td>
                        </tr>
                        <tr>
                            <td><b>状态</b></td>
                            <td>
                                <span class="badge badge-dark" v-if="status == 1">进行中...</span>
                                <span class="badge badge-secondary" v-else-if="status == 2">已售后</span>
                                <span class="badge badge-danger" v-else-if="status == 3">已关闭</span>
                            </td>
                            <!--<td><b>合同</b></td>-->
                            <!--<td>见‘项目合同’<button class="btn btn-outline-secondary float-right">上传合同</button></td>-->
                        </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered" v-else-if="isModify=='yes'">
                        <tbody>
                        <tr>
                            <td colspan="4" class="text-center">
                                <b><h5>{{village_name}}-{{house_id}}</h5></b>

                            </td>
                        </tr>
                        <tr>
                            <td><b>项目地址</b></td>
                            <td><input type="text" v-model="village_name" class="form-control"></td>
                            <td><b>门牌号</b></td>
                            <td><input type="text" v-model="house_id" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><b>客户姓名</b></td>
                            <td><input type="text" :value="customer_name" class="form-control"></td>
                            <td><b>客户联系方式</b></td>
                            <td><input type="text" :value="customer_tel" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><b>项目金额</b></td>
                            <td><input type="number" v-model="money" class="form-control"></td>
                            <td><b>尾款</b></td>
                            <td><i class="fa fa-rmb"></i>{{money-hasPayMoney}}</td>
                        </tr>
                        <tr>
                            <td><b>签订日期</b></td>
                            <td><input type="date" :value="sign_time" class="form-control"></td>
                            <td><b>业务员</b></td>
                            <td>{{user_name}}</td>
                        </tr>
                        <tr>
                            <td><b>状态</b></td>
                            <td>
                                <select class="form-control">
                                    <option value="1">进行中</option>
                                    <option value="2">售后中</option>
                                    <option value="3">已关闭</option>
                                </select>
                            </td>
                            <!--<td><b>合同</b></td>-->
                            <!--<td>见‘项目合同’<button class="btn btn-outline-secondary float-right">上传合同</button></td>-->
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="header">
                    <h2 class="clearfix">施工历程 <button class="btn btn-outline-secondary float-right" v-if="status == 1" data-toggle="modal" data-target="#largeModal">添加施工进度</button></h2>
                </div>
                <div class="body" style="padding-top: 0">
                    <p v-show="logList.length <= 0">暂无数据！</p>
                    <div :class="status==1?'row p-log-list':'row'" v-for="(log,index) in logList">
                        <div class="col-11">
                            <div :class="isWeekBefore(log.build_time)?'timeline-item warning':'timeline-item blue'" :date-is="timeAgo(log.build_time)" >
                                <h5>{{log.title}}</h5>
                                <div class="msg" v-html="log.content">
                                    {{log.content}}
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <button class="btn btn-outline-danger m-t-50 btn-remove-log" :data-id="log.id" :data-index="index"><i class="fa fa-times text-large"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="header">
                    <h2>订单确认图</h2>
                </div>
                <div class="body text-center" style="padding-top: 0;">
                    <img src="http://localhost/tx.jpg" alt="项目合同" style="max-width: 100%;max-height: 800px;margin: 0 auto">
                </div>
            </div>

        </div>

        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="header">
                    <h2 class="clearfix">项目合同 <button class="btn btn-outline-secondary float-right" v-if="contract == ''" data-toggle="modal" data-target="#defaultModal">上传合同</button></h2>
                </div>
                <div class="body" style="padding-top: 0">
                    <span v-if="contract == ''">尚未上传</span>
                    <img v-else :src="contract" alt="项目合同" style="width: 100%;max-height: 500px;margin: 0 auto">
                </div>
            </div>
            <div class="card">
                <div class="header">
                    <h2>财务记录</h2>
                </div>
                <div class="body" style="padding-top: 0">
                    <div class="card border-secondary" v-for="(f,index) in financeList">
                        <div class="card-header clearfix">{{timeAgo(f.trade_time)}} <span class="float-right"><span class="fa fa-rmb"></span>{{f.money}}</span></div>
                        <div class="card-body text-secondary">
                            <h5 class="card-title">{{f.title}}</h5>
                            <p class="card-text">{{f.description}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="header">
                    <h2>售后历程 <button class="btn btn-outline-secondary float-right" v-if="status == 2" data-toggle="modal" data-target="#serviceModal">添加售后</button></h2>
                </div>
                <div class="body" style="padding-top: 0">
                    <span v-if="status == 1">
                        项目尚未结束！
                    </span>
                    <span v-if="status==2 && serviceList.length<=0">
                        暂无售后内容！
                    </span>
                    <div class="card border-secondary card-sercice" v-for="(s,index) in serviceList">
                        <div class="card-header">{{timeAgo(s.service_time)}} <button class="btn btn-outline-danger btn-delete-service float-right" :data-index="index" :data-id="s.id"><i class="fa fa-times"></i></button></div>
                        <div class="card-body text-secondary">
                            <h5 class="card-title">{{s.title}}</h5>
                            <p class="card-text">{{s.content}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="largeModalLabel">添加进度</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td colspan="4" class="text-center">
                                        项目信息
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>项目地址</b></td>
                                    <td>{{village_name}}</td>
                                    <td><b>门牌号</b></td>
                                    <td>{{house_id}}</td>
                                </tr>
                                <tr>
                                    <td><b>客户姓名</b></td>
                                    <td>{{customer_name}}</td>
                                    <td><b>客户联系方式</b></td>
                                    <td>{{customer_tel}}</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1 l-h-36">
                            <label for="title">简介</label>
                        </div>
                        <div class="col-11">
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1 l-h-36">
                            <label for="build_time">日期</label>
                        </div>
                        <div class="col-11">
                            <input type="date" class="form-control" id="build_time" name="build_time">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1">
                            <label for="content">详情</label>
                        </div>
                        <div class="col-11">
                            <div type="text" class="" id="content" name="content" rows="6"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn_do_add">添加</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">取消</button>
                </div>
            </div>
        </div>
    </div>

    <!--售后-->
    <div class="modal fade" id="serviceModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="serviceModalLabel">添加售后</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td colspan="4" class="text-center">
                                        项目信息
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>项目地址</b></td>
                                    <td>{{village_name}}</td>
                                    <td><b>门牌号</b></td>
                                    <td>{{house_id}}</td>
                                </tr>
                                <tr>
                                    <td><b>客户姓名</b></td>
                                    <td>{{customer_name}}</td>
                                    <td><b>客户联系方式</b></td>
                                    <td>{{customer_tel}}</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1 l-h-36">
                            <label for="service_title">简介</label>
                        </div>
                        <div class="col-11">
                            <input type="text" class="form-control" id="service_title" name="title">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1 l-h-36">
                            <label for="service_time">日期</label>
                        </div>
                        <div class="col-11">
                            <input type="date" class="form-control" id="service_time" name="build_time">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1">
                            <label for="content">详情</label>
                        </div>
                        <div class="col-11">
                            <textarea class="form-control" id="service_content" name="content" rows="6"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn_add_service">添加</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">取消</button>
                </div>
            </div>
        </div>
    </div>

    <!--上传合同-->
    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form enctype="multipart/form-data">
                    <div class="modal-header">
                        <h6 class="title" id="defaultModalLabel">{{village_name}}{{house_id}}项目合同上传</h6>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-2 l-h-36">
                                合同
                            </div>
                            <div class="col-10">
                                <input type="file" name="file" id="file" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-upload">上传</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">取消</button>
                    </div>
                </form>
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
<?php if(is_array($pages)): $i = 0; $__LIST__ = $pages;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$page): $mod = ($i % 2 );++$i;?><script src="/sys_vue/Public/<?php echo ($page); ?>"></script><?php endforeach; endif; else: echo "" ;endif; ?>

</body>
</html>