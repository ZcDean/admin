$(function () {


    var vm = new Vue({
        el: '#business',
        data: {
            villages:villageList,
            staffs:[],
        },
    });



    //Exportable table
    $('.js-exportable').DataTable({
        ajax: {
            url: API + '?service=App.Business.GetAllList&uid=' + uid,
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
            { "data": "village_name" },
            { "data": "house_id" },
            { "data": "customer_info" },
            { "data": "name" },
            { "data": "star_html" },
            { "data": "follow_time" },
            { "data": "action" }
        ],
        displayLength: 20,
        lengthChange: false,
        buttons: [
            // { extend: 'excel', text:'导出EXCEL',className: 'btn btn-outline-primary'},
            // { extend: 'pdf', text:'导出PDF',className: 'btn btn-outline-primary' }
        ],
        aoColumnDefs: [ { "bSortable": false, "aTargets": [4,8] }],
        dom: 'Bfrtip',
        language:LANGUAGE,
    });


    function data2Item(item) {
        for(var k in item){
            if(item[k] == '' || item[k] == null){
                item[k] = '-';
            }
        }
        item.customer_info = item.customer_name+'、'+item.customer_tel;
        item.star_html = '';
        for(var i = 0 ; i < Math.floor(item.star) ; i++){
            item.star_html += '<i class="fa fa-star"></i>'
        }

        item.status_html = item.status == '0'?'<span class="badge badge-success">进行中</span>':item.status == '1'?'<span class="badge badge-info">已签单</span>':'<span class="badge badge-danger">已关闭</span>';
        var action = '<button class="btn btn-outline-secondary m-r-5" title="编辑" data-id="'+item.id+'"><i class="icon-eye"></i></button>';
        action += '<button class="btn btn-outline-danger btn-remove" title="删除" data-id="'+item.id+'"><i class="glyphicon glyphicon-remove"></i></button>';
        item.action = action;
    }
});


 
