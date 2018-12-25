$(function () {




    //Exportable table
    var table = $('.js-exportable').DataTable({
        ajax: {
            url: API + '?service=App.Village.GetDetailList&uid=' + uid,
            dataSrc: function (json) {
                if(json.ret == 200){
                    var list = json.data;
                    for (var i = 0 , len = list.length ; i < len ; i++){
                        var item = list[i];
                        data2Item(item);
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
            { "data": "id" },
            { "data": "status_html" },
            { "data": "title" },
            { "data": "name" },
            { "data": "create_time" },
            { "data": "action" }
        ],
        displayLength: 20,
        lengthChange: false,
        buttons: [
            // { extend: 'excel', text:'导出EXCEL',className: 'btn btn-outline-primary'},
            // { extend: 'pdf', text:'导出PDF',className: 'btn btn-outline-primary' }
        ],
        aoColumnDefs: [ { "bSortable": false, "aTargets": [5] }],
        dom: 'Bfrtip',
        language:LANGUAGE,
    });





    $(document).on('click','.btn-remove-village',function () {
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
                util.getHttp(API + '?service=App.Village.Delete&uid=' + uid+'&id='+id).then(function (value) {
                    swal({
                        type:'success',
                        title:'删除成功',
                        confirmButtonText:'确定'
                    });
                    table.ajax.reload();
                });
            }
        });
    });

    //禁用
    $(document).on('click','.btn-lock',function () {
        var id = $(this).data('id');
        util.getHttp(API + '?service=App.Village.Update&uid=' + uid+'&id='+id+'&status=0').then(function (value) {
            swal('已禁用','','success');
            table.ajax.reload();
        });
    });
    //解锁
    $(document).on('click','.btn-unlock',function () {
        var id = $(this).data('id');
        util.getHttp(API + '?service=App.Village.Update&uid=' + uid+'&id='+id+'&status=1').then(function (value) {
            swal('已解锁','','success');
            table.ajax.reload();
        });
    });


    $('#basic-form').submit(function () {
        $('#btn-submit').attr('disabled','disabled');
        util.getHttp(API + '?service=App.Village.Add&uid=' + uid+'&'+$(this).serialize()).then(function (value) {
            table.ajax.reload();
            $('.nav-tabs-new2 li:eq(0) a').tab('show');
            $('#btn-submit').removeAttr('disabled');
            document.getElementById('basic-form').reset();
        });
        return false;
    });


    function data2Item(item) {
        item.status_html = item.status == '1'?'<span class="badge badge-success">使用中</span>':'<span class="badge badge-danger">已禁用</span>';
        var action = '';
        if(item.status == 1){
            action += '<button  class="btn btn-outline-primary m-r-5 btn-lock" title="禁用" data-id="'+item.id+'"><i class="icon-lock"></i></button>';
        }else{
            action += '<button class="btn btn-outline-dark m-r-5 btn-unlock" title="解锁" data-id="'+item.id+'"><i class="icon-lock-open"></i></button>';
        }
        action += '<button class="btn btn-outline-danger btn-remove-village" title="删除" data-id="'+item.id+'"><i class="glyphicon glyphicon-remove"></i></button>';
        item.action = action;
    }


});


 
