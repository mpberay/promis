$(function(){
    loadPosition(posID = 0);
    $('#frmPosition').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        //console.log(formData.get('login[password]'));
        $.ajax({
            url: baseUrl + "/libraries/position/action",
            type: "POST",
            cache: false,
            data: formData,
            processData: false,
            contentType: false,
            dataType: "JSON",
            success: function(data) {
                if (data.success == true) {
                    sweetAlert(1000,'Adding/Updating Position',data.msg,data.status);
                    loadPosition(data.posID);
                    $("#frmPosition input[type='text']").val("");
                }else{
                    sweetAlert(1000,'Adding/Updating Position',data.msg,data.status);
                }
            },
        });
    });   
    $('#topPositionTab').on('click', function(e) {
        loadPosition(posID = 0);
    });
});
function loadPosition(posID){
    var dataTable = $('#tablePosition').DataTable();
    dataTable.destroy();
    $('#tablePosition').DataTable({
        processing: true,
        serverSide: true,
        ajax: baseUrl + "/libraries/position/load/"+posID,
        order: [],
        // type: 'GET',
        method: 'GET',
        dataType: "JSON",
        columns: [
            {data: 'no', orderable: false},
            {data: 'posName'},
            {data: 'posAcronym'},
            {data: 'dateAdded'},
            {data: 'status','className':'text-center'},
            {data: 'action','className':'text-center'},
        ]
    });
}
function jsIsActive(posID,isActive){
    $.ajax({
        url: baseUrl + "/libraries/position/status",
        type: "POST",
        cache: false,
        data: {
            posID:posID,
            isActive:isActive
        },
        // processData: false,
        // contentType: false,
        dataType: "JSON",
        success: function(data) {
            if (data.success == true) {
                sweetAlert(1000,'Update Status',data.msg,data.status);
                loadPosition(posID);
                $("#frmPosition input[type='text']").val("");
            }else{
                sweetAlert(1000,'Update Status',data.msg,data.status);
            }
        },
    });
}
function jsUpdate(posID,isActive,posName,posAcronym){
    $('input[name="posID"]').val(posID);
    $('input[name="posName"]').val(posName);
    $('input[name="posAcronym"]').val(posAcronym);
}