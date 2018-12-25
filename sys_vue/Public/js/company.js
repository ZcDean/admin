$(function () {


    var vm = new Vue({
        el: '#company',
        data: {
            companyList:companyList,
        },
    });


    var table = $('.js-exportable').DataTable({
        displayLength: 20,
        lengthChange: false,
        paging:false,
        buttons: [
            // { extend: 'excel', text:'导出EXCEL',className: 'btn btn-outline-primary'},
            // { extend: 'pdf', text:'导出PDF',className: 'btn btn-outline-primary' }
        ],
        aoColumnDefs: [ { "bSortable": false, "aTargets": [5] }],
        dom: 'Bfrtip',
        language:LANGUAGE,
    });
});