$(function () {


    var vm = new Vue({
        el: '#project',
        data: {
            villages:villageList,
            customers:[
                {
                    "id": "1",
                    "name": "赵大本",
                    "tel": "18352566666",
                    "address": "无锡",
                    "company": "京东",
                    "from": "1",
                    "remark": "贼有钱啊！！",
                    "update_time": "2018-10-26 13:53:10",
                    "create_time": "2018-10-26 13:45:29"
                },
                {
                    "id": "2",
                    "name": "吴建建",
                    "tel": "13851866425",
                    "address": "上海",
                    "company": "投资公司",
                    "from": "自己送上门",
                    "remark": "投资住宅",
                    "update_time": null,
                    "create_time": "2018-10-26 14:26:17"
                }
            ],
            staffs:[
                {
                "id": "3",
                "name": "朱沾沾",
                "password": "123456",
                "tel": "15252217170",
                "group_id": "2",
                "company_id": "1",
                "status": "1",
                "sex": "2",
                "head_img": "http://192.168.11.136/tx.jph",
                "email": null,
                "work_time": null,
                "is_show": "1",
                "last_read_notice_time": null,
                "update_time": null,
                "create_time": "2018-10-26 14:52:17"
            },
                {
                    "id": "2",
                    "name": "李健",
                    "password": "123456",
                    "tel": "18352566686",
                    "group_id": "2",
                    "company_id": "1",
                    "status": "1",
                    "sex": "2",
                    "head_img": "http://loclahost/tx.jph",
                    "email": "979963739@qq.com",
                    "work_time": "2017-12-10",
                    "is_show": "1",
                    "last_read_notice_time": null,
                    "update_time": null,
                    "create_time": "2018-10-26 14:21:34"
                },],
            project_money:0
        },
    });



    //Exportable table
    $('.js-exportable').DataTable({
        ajax: {
            url: API + '?service=App.Project.GetProjectList&uid=' + uid,
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
            { "data": "user_name" },
            { "data": "money" },
            { "data": "left_money" },
            { "data": "sign_time" },
            { "data": "action" }
        ],
        displayLength: 20,
        lengthChange: false,
        buttons: [
            // { extend: 'excel', text:'导出EXCEL',className: 'btn btn-outline-primary'},
            // { extend: 'pdf', text:'导出PDF',className: 'btn btn-outline-primary' }
        ],
        aoColumnDefs: [ { "bSortable": false, "aTargets": [4,9] }],
        dom: 'Bfrtip',
        language:LANGUAGE,
    });


    function data2Item(item) {
        item.customer_info = item.customer_name+'、'+item.customer_tel;
        item.status_html = item.status == '1'?'<span class="badge badge-success">进行中</span>':'<span class="badge badge-danger">已售后</span>';
        var action = '<button class="btn btn-outline-secondary m-r-5" title="编辑" data-id="'+item.id+'"><i class="icon-eye"></i></button>';
        action += '<button class="btn btn-outline-danger btn-remove" title="删除" data-id="'+item.id+'"><i class="glyphicon glyphicon-remove"></i></button>';
        item.action = action;
    }
});


 
