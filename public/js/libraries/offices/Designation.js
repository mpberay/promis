$(function(){
    $('#topDesignationTab').on('click', function(e) {
        getDesignationDatatable(desID=0);
    });
    $('#frmDesignation').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: baseUrl + "/libraries/designation/action",
            type: "POST",
            cache: false,
            data: formData,
            processData: false,
            contentType: false,
            dataType: "JSON",
            success: function(data) {
                if (data.success == true) {
                    sweetAlert(1000,'Adding/Updating Position',data.msg,data.status);
                    getDesignationDatatable(data.desID);
                    $("#frmDesignation input[type='text']").val("");
                }else{
                    sweetAlert(1000,'Adding/Updating Position',data.msg,data.status);
                }
            },
        });
    });
});
function getDesignationDatatable(desID){
    var dataTable = $('#tableDesignation').DataTable();
    dataTable.destroy();
    $('#tableDesignation').DataTable({
        processing: true,
        serverSide: true,
        ajax: baseUrl + "/libraries/designation/getDataTable/"+desID,
        order: [],
        // type: 'GET',
        method: 'GET',
        dataType: "JSON",
        columns: [
            {data: 'no', orderable: false},
            {data: 'desName'},
            {data: 'desAcronym'},
            {data: 'dateAdded'},
            {data: 'status','className':'text-center'},
            {data: 'action','className':'text-center'},
        ]
    });
}
function jsUpdateDesignationStatus(desID,status){
    $.ajax({
        url: baseUrl + "/libraries/designation/status",
        type: "POST",
        cache: false,
        data: {
            desID:desID,
            status:status
        },
        // processData: false,
        // contentType: false,
        dataType: "JSON",
        success: function(data) {
            if (data.success == true) {
                sweetAlert(1000,'Update Status',data.msg,data.status);
                getDesignationDatatable(desID);
            }else{
                sweetAlert(1000,'Update Status',data.msg,data.status);
            }
        },
    });
}
function jsDesignationLoadInformation(id,name,acronym){
    Swal.fire({
        title: 'Please wait getting information. . .',
        timer: 1000,
        onOpen: function () {
            swal.showLoading();
        }
    }).then(
        function () {
            // Swal.fire(title,msg,status)
            $("#frmDesignation input[name='desID']").val(id);
            $("#frmDesignation input[name='desName']").val(name);
            $("#frmDesignation input[name='desAcronym']").val(acronym);
        },
        // handling the promise rejection
        function (dismiss) {
            if (dismiss === 'timer') {
               
            }
        }
    );
}