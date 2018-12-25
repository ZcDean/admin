$(function () {



    var vm = new Vue({
        el: '#staff',
        data: {
            jobList:[],
            companyList:companyList
        },
    });

    var table = $('.js-exportable').DataTable({
        ajax: {
            url: API + '?service=App.Staff.GetAllList&type=detail&uid=' + uid,
            dataSrc: function (json) {
                if(json.ret == 200){
                    var list = json.data;
                    for (var i = 0 , len = list.length ; i < len ; i++){
                        var item = list[i];
                        data2Item(item);
                        item.index = i+1;
                    }
                    return list;
                }else {
                    swal({
                        title: json.msg,
                        confirmButtonText: "确定",
                    });
                    return [];
                }
            },
        },
        "columns": [
            { "data": "index" },
            { "data": "status_html" },
            { "data": "name" },
            { "data": "tel" },
            { "data": "title" },
            { "data": "counts" },
            { "data": "signs" },
            { "data": "amount" },
            { "data": "work_time" },
            { "data": "action" }
        ],
        displayLength: 20,
        lengthChange: false,
        buttons: [
            // { extend: 'excel', text:'导出EXCEL',className: 'btn btn-outline-primary'},
            // { extend: 'pdf', text:'导出PDF',className: 'btn btn-outline-primary' }
        ],
        aoColumnDefs: [ { "bSortable": false, "aTargets": [9] }],
        dom: 'Bfrtip',
        language:LANGUAGE,
    });



    $(document).on('click','.btn-remove-staff',function () {
        var id = $(this).data('id');
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
                util.getHttp(API + '?service=App.Staff.Delete&uid=' + uid+'&id='+id).then(function (value) {
                    swal('删除成功','','success');
                    table.ajax.reload();
                });
            }
        });
    });



    //所有职位信息
    util.getHttp(API+'?service=App.Group.GetAllList&uid='+uid).then(function (data) {
        data.forEach(function (value) {
            vm.jobList.push(value);
        })
    }).catch(function (reason) {
        swal({
            title: reason,
            confirmButtonText: "确定",
        });
    });


    $('#basic-form').submit(function () {
        $('#btn-submit').attr('disabled','disabled');
        util.getHttp(API + '?service=App.Staff.Add&uid=' + uid+'&'+$(this).serialize()).then(function (value) {
            table.ajax.reload();
            $('.nav-tabs-new2 li:eq(0) a').tab('show');
            $('#btn-submit').removeAttr('disabled');
            document.getElementById('basic-form').reset();
        });
        return false;
    });



    function data2Item(item) {
        for (var k in item){
            if(item[k] == '' || item[k] == 0 || item[k] == null){
                item[k] = '-';
            }
        }
        item.status_html = item.status == '1'?'<span class="badge badge-success">已激活</span>':'<span class="badge badge-danger">尚未激活</span>';
        var action = '';
        if(item.is_root == 1){
            action += '<span class="text-primary">该职位无法修改</span>';
        }else{
            action += '<button class="btn btn-outline-dark m-r-5 " title="编辑" data-id="'+item.id+'"><i class="icon-pencil"></i></button>';
            action += '<button class="btn btn-outline-danger btn-remove-staff" title="删除" data-id="'+item.id+'"><i class="glyphicon glyphicon-remove"></i></button>';
        }
        item.action = action;
    }
});