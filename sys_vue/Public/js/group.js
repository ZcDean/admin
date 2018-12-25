$(function () {

    var keys = Object.keys(AUTH_BELONG);

    var ruleList = null;
    //分组查询的规则
    var hasRequest = false;
    var vm = new Vue({
        el: '#group',
        data: {
            trade_type:'income',
            groupList:[],
            ruleListhg:{},
            editTitle:'',
            editDesctiption:'',
            editRules:'',
        },
        methods:{
            hideTel:function (tel) {
                return util.hideTel(tel);
            },
            getAuthBelong:function (k) {
                if(AUTH_BELONG.hasOwnProperty(k)){
                    return AUTH_BELONG[k];
                }
                return null;
            }
        }
    });
    // var table = $('#group-list').DataTable({
    //     displayLength: 20,
    //     lengthChange: false,
    //     buttons: [
    //         // { extend: 'excel', text:'导出EXCEL',className: 'btn btn-outline-primary'},
    //         // { extend: 'pdf', text:'导出PDF',className: 'btn btn-outline-primary' }
    //     ],
    //     aoColumnDefs: [ { "bSortable": false, "aTargets": [4]}],
    //     dom: 'Bfrtip',
    //     language:LANGUAGE,
    // });

    var p1 = util.getHttp(API+'?service=App.Group.GetAllList&status=-1&uid='+uid);
    var p2 = util.getHttp(API+'?service=App.Auth.GetAuthList');


    Promise.all([p1,p2]).then(function (res) {
        var gl = res[0];
        ruleList = res[1];
        for (var i = 0 , len = gl.length ; i < len ; i++){
            var item = gl[i];
            var rules = item.rules.split(',');
            var ch_rules = [];
            for(var j = 0 , l = rules.length ; j < l ; j++){
                ch_rules.push(getRuleTitle(rules[j]));
            }
            item.ch_rules = ch_rules;
        }
        vm.groupList = gl;

    }).catch((e)=>{
        console.log(e)
    });


    $(document).on('click','.btn-remove-group',function () {
        var id = $(this).data('gid');
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
                util.getHttp(API + '?service=App.Group.Delete&uid=' + uid+'&id='+id).then(function (value) {
                    swal({
                        type:'success',
                        title:'删除成功',
                        confirmButtonText:'确定'
                    });
                }).catch(()=>{});
            }
        });
    });
    $(document).on('click','.btn-edit-group',function () {
        util.showLoading();
        var id = $(this).data('gid');
        var index = $(this).data('index');
        vm.editTitle = vm.groupList[index].title;
        vm.editDesctiption = vm.groupList[index].description;
        vm.editRules = vm.groupList[index].rules;
        getRuleList().then((res)=>{
            util.hideLoading();
            if(res){
                vm.ruleListhg = res;
            }
            $('#largeModal').modal({backdrop: 'static', keyboard:false});
        }).catch(()=>{
            util.hideLoading();
        })

    });




    $('#checkAll').change(function(){
        if (this.checked){
            keys.forEach(function (depart) {
                $('#'+depart).attr("checked", true);
                $("input[name='actions["+depart+"][]']:checkbox").each(function(){
                    $(this).attr("checked", true);
                });
            });

        } else {
            keys.forEach(function (depart) {
                $('#'+depart).removeAttr('checked');
                $("input[name='actions["+depart+"][]']:checkbox").each(function(){
                    $(this).removeAttr('checked');
                });
            });
        }
    });


    keys.forEach(function (depart) {
        var item = $('#'+depart);
        $(document).on('change',item,function () {
            var id = $(this).attr('id');
            console.log(id);
            if (this.checked){
                $("input[name='actions["+id+"][]']:checkbox").each(function(){
                    $(this).prop("checked", true);
                });
            }else{
                $("input[name='actions["+id+"][]']:checkbox").each(function(){
                    $(this).removeProp("checked");
                });
            }
        });

    });



    function getRuleList() {
        return new Promise((reslove,reject)=>{
            if(!hasRequest){
                util.getHttp(API+'?service=App.Auth.GetAuthList&isGroup=1').then((res)=>{
                    hasRequest = true;
                    reslove(res);
                }).catch(()=>{
                    reject();
                });
            }else {
                reslove('');
            }

        })
    }

    function getRuleTitle(id) {
        if(ruleList && Array.isArray(ruleList)){
           for(var i = 0 , len = ruleList.length; i < len ; i++){
               if(ruleList[i].id == id){
                   return ruleList[i].title;
               }
           }
        }
        return null;
    }

});