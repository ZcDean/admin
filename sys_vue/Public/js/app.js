$(function () {

    var uuid = util.getCookie('uuid');
    if(uuid != '' && uuid != null){
        uid = uuid;
    }else {
        location.replace(MODULE_URL + '/Login/index');
    }

});