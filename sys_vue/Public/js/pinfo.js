$(function () {
    var vm = new Vue({
        el: '#pinfo',
        data: {
            'village_name':'',
            'house_id':'',
            'user_name':'',
            'customer_name':'',
            'customer_tel':'',
            'sign_time':'',
            'money':'',
            'left_money':'',
            'status':'',
            'id':'',
            'contract':'',
            'image':'',
            'business_id':null,
            'logList':[],
            'serviceList':[],
            'financeList':[],
            //已付金额
            'hasPayMoney':0,
            'isModify':'no'
        },
        methods:{
            isWeekBefore:function (time) {
                var dateTimeStamp = new Date(time).getTime();
                if(dateTimeStamp - new Date().getTime() > 7*86400*1000){
                    return true;
                }
                return false;
            },
            timeAgo:function (time) {
                return util.timeAgo(time);
            },
            modify:function () {
                if(this.money < this.hasPayMoney){
                    swal('项目金额不合法！');
                }
            }
        }
    });


    util.getHttp(API+'?service=App.Project.GetProjectInfo&uid='+uid+'&id=12').then(function (data) {
        vm.village_name = data.village_name;
        vm.house_id = data.house_id;
        vm.user_name = data.user_name;
        vm.customer_name = data.customer_name;
        vm.customer_tel = data.customer_tel;
        vm.sign_time = data.sign_time;
        vm.money = data.money;
        vm.left_money = data.left_money;
        vm.status = data.status;
        vm.id = data.id;
        vm.contract = data.contract;
        vm.image = data.image;
        vm.logList = data.logList;
        vm.financeList = data.financeList;
        vm.serviceList = data.serviceList;
        vm.hasPayMoney = Math.floor(data.money) - Math.floor(data.left_money);
        vm.business_id = data.business_id;
    });

    var E = window.wangEditor
    var editor = new E('#content');
    // 隐藏“网络图片”tab
    editor.customConfig.showLinkImg = false;
    editor.customConfig.uploadFileName = 'file';
    editor.customConfig.uploadImgServer = API+'?service=App.Upload.UploadImage&uid='+uid ; // 上传图片到服务器
    editor.customConfig.uploadImgHooks = {
        customInsert: function (insertImg, result, editor) {
            // 图片上传并返回结果，自定义插入图片的事件（而不是编辑器自动插入图片！！！）
            if(result.ret == 200){
                insertImg(result.data.url);
            }else{
                swal(result.msg,'','error');
            }
        }
    };
    editor.customConfig.customAlert = function (info) {
        // info 是需要提示的内容
        swal(info,'','error');
    };
    editor.create();


    //删除项目施工日志
    $(document).on('click','.btn-remove-log',function () {
        var id= $(this).data('id'),index = Math.floor($(this).data('index'));
        swal({
            title: "确定要删除吗?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#dc3545",
            confirmButtonText: "确定",
            cancelButtonText: "取消",
            closeOnConfirm: false,
        }, function (isConfirm) {
            if (isConfirm) {
                util.getHttp(API + '?service=App.Project.DeleteLog&uid=' + uid+'&id='+id).then(function (value) {
                    swal('删除成功','','success');
                    vm.logList.splice(index,1);
                });
            }
        });
    });
    //添加施工
    $('#btn_do_add').click(function () {
        $.ajax({
            url:API+'?service=App.Project.AddLog',
            data:{
                uid:uid,
                project_id:vm.id,
                title:$('#title').val(),
                content:editor.txt.html(),
                build_time:$('#build_time').val()
            },
            type:'POST'
        }).then(function (res) {
            if(res.ret == 200){
                $('#title').val('');
                $('#build_time').val('');
                editor.txt.html('');
                $('#largeModal').modal('toggle');
                swal('添加成功','','success');
                vm.logList.unshift(res.data);
            }else {
                swal(res.msg,'','error');
            }
        })
    });


    $('#btn_add_service').click(function () {
        $.ajax({
            url:API+'?service=App.Project.AddService',
            data:{
                uid:uid,
                project_id:vm.id,
                title:$('#service_title').val(),
                content:$('#service_content').val(),
                service_time:$('#service_time').val()
            },
            type:'POST'
        }).then(function (res) {
            if(res.ret == 200){
                $('#service_title').val('');
                $('#service_time').val('');
                $('#service_content').val('');
                $('#serviceModal').modal('toggle');
                swal('添加成功','','success');
                vm.serviceList.unshift(res.data);
            }else {
                swal(res.msg,'','error');
            }
        })
    });

    $('#btn-upload').click(function () {
        var formData = new FormData();
        formData.append('file', $('#file')[0].files[0]);
        $.ajax({
            url:API+'?service=App.Upload.UploadImage&uid='+uid,
            data:{
                file:formData
            }
        }).then(function (res) {
            if(res.ret == 200){
                util.getHttp(API+'?service=App.Project.Update&uid='+uid+'&contract='+res.data.url).then(function (data) {
                    $('#defaultModal').modal('toggle');
                    vm.contract = res.data.url;
                    swal('上传成功','','success');
                }).catch(function (reason) {  })
            }else {
                swal(res.msg,'','error');
            }
        });
    });

    $(document).on('click','.btn-delete-service',function () {
        var id= $(this).data('id'),index = Math.floor($(this).data('index'));
        swal({
            title: "确定要删除吗?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#dc3545",
            confirmButtonText: "确定",
            cancelButtonText: "取消",
            closeOnConfirm: false,
        }, function (isConfirm) {
            if (isConfirm) {
                util.getHttp(API + '?service=App.Project.DeleteService&uid=' + uid+'&id='+id).then(function (value) {
                    swal('删除成功','','success');
                    vm.serviceList.splice(index,1);
                });
            }
        });
    });
});