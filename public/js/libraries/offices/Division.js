$(function(){
    getDivisionDatatable(divID = 0);
    getSelectHead();
    getSelectDesignation();
    $('#frmDivision').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: baseUrl + "/libraries/division/action",
            type: "POST",
            cache: false,
            data: formData,
            processData: false,
            contentType: false,
            dataType: "JSON",
            success: function(data) {
                // if (data.success == true) {
                //     sweetAlert(1000,'Adding/Updating Position',data.msg,data.status);
                //     getDesignationDatatable(data.desID);
                //     $("#frmDesignation input[type='text']").val("");
                // }else{
                //     sweetAlert(1000,'Adding/Updating Position',data.msg,data.status);
                // }
            },
        });
    });
});

function getSelectHead(){
    $.ajax({
        url: baseUrl + "/libraries/head/select",
        type: "GET",
        cache: false,
        //data: formData,
        // processData: false,
        // contentType: false,
        dataType: "JSON",
        success: function(data) {
            //$("#getPosition").empty(); 
            $("#frmDivision select[name='headID']").empty();
            $("#frmDivision select[name='headID']").append('<option selected value="">Select office head . . .</option>'); 
            $.each(data, function(key,val){
                $("#frmDivision select[name='headID']").append($('<option>', {value : val.headID}).text(val.firstname+' '+val.middlename+' '+val.lastname));
            });
        },
    });
}
function getSelectDesignation(){
    $.ajax({
        url: baseUrl + "/libraries/designation/select",
        type: "GET",
        cache: false,
        //data: formData,
        // processData: false,
        // contentType: false,
        dataType: "JSON",
        success: function(data) {
            $("#frmDivision select[name='desID']").empty();
            $("#frmDivision select[name='desID']").append('<option selected value="">Select head designation . . .</option>'); 
            $.each(data, function(key,val){
                $("#frmDivision select[name='desID']").append($('<option>', {value : val.desID}).text(val.desName+' '+val.desAcronym));
            });
        },
    });
}
function getDivisionDatatable(divID){
    var dataTable = $('#tableDivision').DataTable();
    dataTable.destroy();
    $('#tableDivision').DataTable({
        processing: true,
        serverSide: true,
        ajax: baseUrl + "/libraries/division/getDataTable/"+divID,
        order: [],
        // type: 'GET',
        method: 'GET',
        dataType: "JSON",
        columns: [
            {data: 'no', orderable: false},
            {data: 'divCode'},
            {data: 'divName'},
            {data: 'fullname'},
            {data: 'desAcronym'},
            {data: 'dateAdded'},
            {data: 'status','className':'text-center'},
            {data: 'action','className':'text-center'},
        ]
    });
}
function jsUpdateDivisionStatus(divID,status){
    $.ajax({
        url: baseUrl + "/libraries/division/status",
        type: "POST",
        cache: false,
        data: {
            divID:divID,
            status:status
        },
        // processData: false,
        // contentType: false,
        dataType: "JSON",
        success: function(data) {
            if (data.success == true) {
                sweetAlert(1000,'Update Status',data.msg,data.status);
                getDivisionDatatable(divID);
            }else{
                sweetAlert(1000,'Update Status',data.msg,data.status);
            }
        },
    });
}
function jsgitDivisionInfo(divID){
    $.ajax({
        url: baseUrl + "/libraries/division/getDivisionInformation/"+divID,
        type: "GET",
        cache: false,
        //data: formData,
        // processData: false,
        // contentType: false,
        dataType: "JSON",
        success: function(data) {
            // $("#getPosition").empty(); 
            // $("#getPosition").append('<option selected value="">Select Position . . .</option>'); 
            Swal.fire({
                title: 'Please wait getting information. . .',
                timer: 1000,
                onOpen: function () {
                    swal.showLoading();
                }
            }).then(
                function () {
                    // Swal.fire(title,msg,status)
                    $.each(data, function(key,val){
                        // $("#getPosition").append($('<option>', {value : val.posID}).text(val.posName+' - '+val.posAcronym));
                        $("#frmDivision input[name='divCode']").val(val.divCode);
                        $("#frmDivision input[name='divName']").val(val.divName);
                        $("#frmDivision input[name='divAcronym']").val(val.divAcronym);
                        getSelectHead();
                        getSelectDesignation();
                    });
                },
                // handling the promise rejection
                function (dismiss) {
                    if (dismiss === 'timer') {
                       
                    }
                }
            );
        },
    });
}