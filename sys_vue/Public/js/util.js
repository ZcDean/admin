var util = (function () {
    var util = {};

    util.postHttp = function (url,params) {
        return new Promise(function (reslove,reject) {
            if(!params.hasOwnProperty('uid')){
                params['uid'] = uid;
            }
            $.ajax({
                url:url,
                data:params,
                type:'POST',
            }).then(function (res) {
                if(res.ret == 200){
                    reslove(res.data);
                }else {
                    swal({
                        type:'info',
                        title:'',
                        text: res.msg,
                        confirmButtonText: "确定",
                    });
                    reject();
                }
            })
        });
    };
    util.getHttp = function (url) {
        return new Promise(function (reslove,reject) {
            $.ajax({
                url:url,
                type:'GET'
            }).then(function (res) {
                if(res.ret == 200){
                    reslove(res.data);
                }else {
                    swal({
                        type:'info',
                        title:'',
                        text:res.msg,
                        confirmButtonText: "确定",
                    });
                    reject();
                }
            })
        });
    };

    /**
     * dateTimeStamp是一个时间毫秒，注意时间戳是秒的形式，在这个毫秒的基础上除以1000，就是十位数的时间戳。13位数的都是时间毫秒。
     * @param dateTimeStamp
     * @returns {*|string}
     */
    util.timeAgo = function (time){

        var dateTimeStamp = new Date(time).getTime();

        var minute = 1000 * 60;      //把分，时，天，周，半个月，一个月用毫秒表示
        var hour = minute * 60;
        var day = hour * 24;
        var week = day * 7;
        var halfamonth = day * 15;
        var month = day * 30;
        var now = new Date().getTime();   //获取当前时间毫秒
        var diffValue = now - dateTimeStamp;//时间差

        if(diffValue < 0){
            return;
        }
        var minC = diffValue/minute;  //计算时间差的分，时，天，周，月
        var hourC = diffValue/hour;
        var dayC = diffValue/day;
        var weekC = diffValue/week;
        var monthC = diffValue/month;
        if(monthC >= 1 && monthC <= 3){
            result = " " + parseInt(monthC) + "月前"
        }else if(weekC >= 1 && weekC <= 3){
            result = " " + parseInt(weekC) + "周前"
        }else if(dayC >= 1 && dayC <= 6){
            result = " " + parseInt(dayC) + "天前"
        }else if(hourC >= 1 && hourC <= 23){
            result = " " + parseInt(hourC) + "小时前"
        }else if(minC >= 1 && minC <= 59){
            result =" " + parseInt(minC) + "分钟前"
        }else if(diffValue >= 0 && diffValue <= minute){
            result = "刚刚"
        }else {
            var datetime = new Date();
            datetime.setTime(dateTimeStamp);
            var Nyear = datetime.getFullYear();
            var Nmonth = datetime.getMonth() + 1 < 10 ? "0" + (datetime.getMonth() + 1) : datetime.getMonth() + 1;
            var Ndate = datetime.getDate() < 10 ? "0" + datetime.getDate() : datetime.getDate();
            var Nhour = datetime.getHours() < 10 ? "0" + datetime.getHours() : datetime.getHours();
            var Nminute = datetime.getMinutes() < 10 ? "0" + datetime.getMinutes() : datetime.getMinutes();
            var Nsecond = datetime.getSeconds() < 10 ? "0" + datetime.getSeconds() : datetime.getSeconds();
            result = Nyear + "-" + Nmonth + "-" + Ndate
        }
        return result;
    }


    util.hideTel = function (tel) {
        return tel.replace(/(\d{3})\d{4}(\d{4})/, '$1****$2');
    }


    util.getCookie = function (c_name) {
        var strCookie = document.cookie;
        var arrCookie = strCookie.split(";");
        for (var i = 0; i < arrCookie.length; i++) {
            var arr = arrCookie[i].split("=");
            if (c_name == arr[0].replace(/(^\s*)|(\s*$)/g, "")) {
                return arr[1];
            }
        }
        return "";
    };

    util.setCookie = function (c_name, value) {
        document.cookie = c_name + "=" + value;
    };

    util.showLoading = function () {
        $('.loading-box').css('display','flex');
    };
    util.hideLoading = function () {
        $('.loading-box').hide();
    };

    return util;
})();