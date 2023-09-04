$(function(){
    $('#topDivisionTab').on('click', function(e) {
        getDivisionDatatable(divID = 0);
        getSelectHead();
        getSelectDesignation();
    });
    $('a[name="refreshDivision"]').on('click', function(e) {
        getDivisionDatatable(divID = 0);
        getSelectHead();
        getSelectDesignation();
    });
    $('#frmDivision').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var headID = $("#frmDivision select[name='headID']").val();
        var desID = $("#frmDivision select[name='desID']").val();
        if(headID == 0){
            $("#h6_headID").html("Please select head of the office. . .");
        }else if(desID == 0){
            $("#h6_headID").html("");
            $("#h6_desID").html("Please select designation of the head. . .");
        }else{
            $.ajax({
                url: baseUrl + "/libraries/division/action",
                type: "POST",
                cache: false,
                data: formData,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function(data) {
                    if (data.success == true) {
                        sweetAlert(1000,'Adding/Updating Position',data.msg,data.status);
                        getDivisionDatatable(data.divID);
                        $("#frmDivision input[type='text']").val("");
                        getSelectHead();
                        getSelectDesignation();
                    }else{
                        sweetAlert(1000,'Adding/Updating Position',data.msg,data.status);
                    }
                },
            });
        }
        
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
            $("#frmDivision select[name='headID']").append('<option selected value="0">Select office head . . .</option>'); 
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
            $("#frmDivision select[name='desID']").append('<option selected value="0">Select head designation . . .</option>'); 
            $.each(data, function(key,val){
                $("#frmDivision select[name='desID']").append($('<option>', {value : val.desID}).text(val.desName));
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
            {data: 'divAcronym'},
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
function jsgitDivisionInfo(divID,headID,desID){
    $.ajax({
        url: baseUrl + "/libraries/division/getDivisionInformation",
        type: "GET",
        cache: false,
        data: {
            divID:divID,
            headID:headID,
            desID:desID
        },
        // processData: false,
        // contentType: false,
        dataType: "JSON",
        success: function(data) {
            // $("#getPosition").empty(); 
            // $("#getPosition").append('<option selected value="">Select Position . . .</option>'); 
            Swal.fire({
                title: 'Please wait getting information. . .',
                timer: 2000,
                onOpen: function () {
                    swal.showLoading();
                }
            }).then(
                function () {
                    // Swal.fire(title,msg,status)
                    $.each(data.division, function(key,val){
                        // $("#getPosition").append($('<option>', {value : val.posID}).text(val.posName+' - '+val.posAcronym));
                        $("#frmDivision input[name='divCode']").val(val.divCode);
                        $("#frmDivision input[name='divName']").val(val.divName);
                        $("#frmDivision input[name='divAcronym']").val(val.divAcronym);
                        $("#frmDivision input[name='divID']").val(val.divID);
                    });

                    //update select attribute for head librariee
                    $("#frmDivision select[name='headID']").empty();
                    $("#frmDivision select[name='headID']").append($('<option>', {value : data.division[0]['headID']}).text(data.division[0]['firstname']+' '+data.division[0]['middlename']+' '+data.division[0]['lastname']));
                    $.each(data.head, function(key,val){                        
                        $("#frmDivision select[name='headID']").append($('<option>', {value : val.headID}).text(val.firstname+' '+val.middlename+' '+val.lastname));
                    });
                    //update select attribute for designation librariee
                    $("#frmDivision select[name='desID']").empty();
                    $("#frmDivision select[name='desID']").append($('<option>', {value : data.division[0]['desID']}).text(data.division[0]['desName']));
                    $.each(data.designation, function(key,val){
                        $("#frmDivision select[name='desID']").append($('<option>', {value : val.desID}).text(val.desName));
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