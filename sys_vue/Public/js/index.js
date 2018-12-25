$(function () {

    $('.progress-bar').progressbar();

    var vm = new Vue({
        el: '#index',
        data: {
            nearUpdateProject:[],
            nearUpdatebusiness:[],
            nearbusiness:[],
            nearProject:[],
            starBusiness:[],
            year:new Date().getFullYear(),
            projectPersent:80,
            transferPersend:0,
            project_style:{
                width:'0%'
            },
            transferPersent:0
        },
        methods:{
            timeAgo:function (time) {
                return util.timeAgo(time);
            },
            hideTel:function (tel) {
               return util.hideTel(tel);
            }
        }
    });


    //获取最近项目
    util.getHttp(API+'?service=App.Main.GetNearProject').then(function (data) {
        data.forEach(function (value) {
            vm.nearProject.push(value);
        })
    }).catch(function (reason) {
        swal({
            title:'网络请求异常',
            type:'error',
            confirmButtonText:'确定'
        });
    });
    //获取最近业务
    util.getHttp(API+'?service=App.Main.GetNearBusiness').then(function (data) {
        data.forEach(function (value) {
            vm.nearbusiness.push(value);
        })
    }).catch(function (reason) {  });
    //获取星级业务
    util.getHttp(API+'?service=App.Main.GetMostStarBusiness').then(function (data) {
        data.forEach(function (value) {
            vm.starBusiness.push(value);
        })
    }).catch(function (reason) {  });
    //获取星级业务
    util.getHttp(API+'?service=App.Main.GetMonthInfo').then(function (data) {
       vm.projectPersent = (Math.floor(data.yearMoney)/5000000 * 100).toFixed(2);
       vm.project_style.width = vm.projectPersent + '%';
       vm.transferPersent = (Math.floor(data.projectCount)/Math.floor(data.busniessCount)*100).toFixed(2);
    }).catch(function (reason) {  });


});