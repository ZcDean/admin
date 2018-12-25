$(function () {


    $('#tip_content').text(TIPS[Math.floor(Math.random() * TIPS.length)]);

    $('#btn_login').click(function () {

        var uid = $('#uid').val();
        var pwd = $('#pwd').val();

        if(uid == '' || pwd == ''){
            swal({
                type:'info',
                title:'提示',
                text:'账号或密码不能为空',
                confirmButtonText:'确定'
            })
        }else{
            $(this).attr('disabled','disabled');
            util.postHttp(API,{
                service:'App.User.Login',
                tel:uid,
                pwd:pwd
            }).then(data => {
                if(data != false){
                    util.setCookie('uuid',data.id);
                    location.replace(MODULE_URL+'/Index/index');
                }else {
                    swal({
                        type:'error',
                        title:'账号或密码有误！',
                        confirmButtonText:'确定'
                    });
                    $(this).removeAttr('disabled');
                }
            }).catch(()=>{})
        }
    });

});