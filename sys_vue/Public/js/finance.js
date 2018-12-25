$(function () {


    var hasGetProject = false;

    var vm = new Vue({
        el: '#finance',
        data: {
            trade_type:'income',
            projectList:[],
        },
        methods:{
            hideTel:function (tel) {
                return util.hideTel(tel);
            }
        }
    });

    var table = $('#finance_look').DataTable({
        ajax: {
            url: API + '?service=App.Finance.GetAllList&type=type&uid=' + uid,
            dataSrc: function (json) {
                if(json.ret == 200){
                    var list = [];
                    var expense_list = json.data.expense,
                        income_list = json.data.income;
                    var expense_len = expense_list.length,
                        income_len = income_list.length;
                    var extra =expense_len>income_len?expense_list.splice(income_len-1,expense_len-income_len):income_list.splice(expense_len-1,income_len-expense_len);
                    for (var i = 0 , len = Math.min(expense_len,income_len) ; i < len ; i++){
                        list.push({
                            index:i+1,
                            expense_title:expense_list[i].title,
                            expense_money:expense_list[i].money,
                            expense_description:expense_list[i].description,
                            expense_trade_time:expense_list[i].trade_time,
                            income_title:income_list[i].title,
                            income_money:income_list[i].money,
                            income_description:income_list[i].description,
                            income_trade_time:income_list[i].trade_time,
                        })
                    }

                    if(expense_len > income_len){
                        for (var j = 0 ; j < extra.length ; j++){
                            list.push({
                                index:income_len+j+1,
                                expense_title:extra[j].title,
                                expense_money:extra[j].money,
                                expense_description:extra[j].description,
                                expense_trade_time:extra[j].trade_time,
                                income_title:'-',
                                income_money:'-',
                                income_description:'-',
                                income_trade_time:'-',
                            });
                        }
                    }else{
                        for (var j = 0 ; j < extra.length ; j++){
                            list.push({
                                index:income_len+j+1,
                                expense_title:'-',
                                expense_money:'-',
                                expense_description:'-',
                                expense_trade_time:'-',
                                income_title:extra[j].title,
                                income_money:extra[j].money,
                                income_description:extra[j].description,
                                income_trade_time:extra[j].trade_time
                            });
                        }
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
            { "data": "expense_title" },
            { "data": "expense_money" },
            { "data": "expense_description" },
            { "data": "expense_trade_time" },
            { "data": "income_title" },
            { "data": "income_money" },
            { "data": "income_description" },
            { "data": "income_trade_time" }
        ],
        displayLength: 20,
        lengthChange: false,
        buttons: [
            // { extend: 'excel', text:'导出EXCEL',className: 'btn btn-outline-primary'},
            // { extend: 'pdf', text:'导出PDF',className: 'btn btn-outline-primary' }
        ],
        aoColumnDefs: [ { "bSortable": false, "aTargets": [1,3,5,7]}],
        dom: 'Bfrtip',
        language:LANGUAGE,
    });

    var table2 = $('#finance_manager').DataTable({
        ajax: {
            url: API + '?service=App.Finance.GetAllList&type=all&uid=' + uid,
            dataSrc: function (json) {
                if(json.ret == 200){
                    var list = json.data;
                    for (var i = 0 , len = list.length ; i < len ; i++){
                        var item = list[i];
                        data2Item(item);
                        item.index = i+1;
                    }
                    return list;
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
            { "data": "trade_type" },
            { "data": "title" },
            { "data": "money" },
            { "data": "description" },
            { "data": "trade_time" },
            { "data": "action" },
        ],
        displayLength: 20,
        lengthChange: false,
        buttons: [
            // { extend: 'excel', text:'导出EXCEL',className: 'btn btn-outline-primary'},
            // { extend: 'pdf', text:'导出PDF',className: 'btn btn-outline-primary' }
        ],
        aoColumnDefs: [ { "bSortable": false, "aTargets": [2,4,6]}],
        dom: 'Bfrtip',
        language:LANGUAGE,
    });



    $(document).on('click','.btn-remove-finance',function () {
        var id = $(this).data('id');
        var pid = $(this).data('pid');
        swal({
            title: "确定要删除吗?",
            text:pid?'该条记录涉及项目付款记录，删除将更新项目的尾款!':'',
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#dc3545",
            confirmButtonText: "确定",
            cancelButtonText: "取消",
            closeOnConfirm: false,
        }, function (isConfirm) {
            if (isConfirm) {
                util.getHttp(API + '?service=App.Finance.Delete&uid=' + uid+'&id='+id).then(function (value) {
                    swal('删除成功','','success');
                    table.ajax.reload();
                    table2.ajax.reload();
                });
            }
        });
    });


    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        if($(e.target).data('index') == '2' && !hasGetProject){
            util.getHttp(API + '?service=App.Project.GetProjectList&uid=' + uid).then(function (value) {
                hasGetProject = true;
                value.forEach(function (item) {
                    vm.projectList.push(item);
                })
            });
        }
    });

    $('#basic-form').submit(function () {
        $('#btn-submit').attr('disabled','disabled');
        util.getHttp(API + '?service=App.Finance.Add&uid=' + uid+'&'+$(this).serialize()).then(function (value) {
            swal('添加成功','','success');
            table.ajax.reload();
            table2.ajax.reload();
            document.getElementById('basic-form').reset();
        });
        return false;
    });



    function data2Item(item) {
        item.trade_type = item.type == 'income'?'<span class="badge badge-success">收入</span>':'<span class="badge badge-danger">支出</span>';
        item.action = '<button class="btn btn-outline-danger btn-remove-finance" title="删除" data-id="'+item.id+'" data-pid="'+item.project_id+'"><i class="glyphicon glyphicon-remove"></i></button>';
    }

});