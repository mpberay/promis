$(function(){
    $('#topHeadTab').on('click', function(e) {
        getSelectPosition();
        getHeadDatatable(headID = 0);
    });
    $('#frmHead').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        var radioButtons = $("input[type='radio']");
        var atLeastOneSelected = false;
        radioButtons.each(function() {
        if ($(this).is(":checked")) {
            atLeastOneSelected = true;
            return false; // Break the loop
        }
        });
        
        if (!atLeastOneSelected) {
            $("#sexValidator").html("Please Select Sex . . .");
        } else if($("#getPosition").val() == 0){
            $("#sexPosition").html("Please Select Position . . .");
            $("#sexValidator").html("");
        }else{
            $("#sexValidator").html("");
            $("#sexPosition").html("");
            $.ajax({
                url: baseUrl + "/libraries/head/action",
                type: "POST",
                cache: false,
                data: formData,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function(data) {
                    if (data.success == true) {
                        sweetAlert(1000,'Adding/Updating Position',data.msg,data.status);
                        getHeadDatatable(data.headID);
                        getSelectPosition();
                        $("#frmHead input[type='text']").val("");
                        $("input[type='radio']").prop("checked", false);
                    }else{
                        sweetAlert(1000,'Adding/Updating Position',data.msg,data.status);
                    }
                },
            });
        }
        
    });
    
});
function getSelectPosition(){
    $.ajax({
        url: baseUrl + "/libraries/position/select",
        type: "GET",
        cache: false,
        //data: formData,
        // processData: false,
        // contentType: false,
        dataType: "JSON",
        success: function(data) {
            $("#getPosition").empty(); 
            $("#getPosition").append('<option selected value="">Select Position . . .</option>'); 
            $.each(data, function(key,val){
                $("#getPosition").append($('<option>', {value : val.posID}).text(val.posName+' - '+val.posAcronym));
            });
        },
    });
}
function getHeadDatatable(headID){
    var dataTable = $('#tableHead').DataTable();
    dataTable.destroy();
    $('#tableHead').DataTable({
        processing: true,
        serverSide: true,
        ajax: baseUrl + "/libraries/head/getDataTable/"+headID,
        order: [],
        // type: 'GET',
        method: 'GET',
        dataType: "JSON",
        columns: [
            {data: 'no', orderable: false},
            {data: 'firstname'},
            {data: 'middlename'},
            {data: 'lastname'},
            {data: 'extensionname'},
            {data: 'sex'},
            {data: 'posName'},
            {data: 'dateAdded'},
            {data: 'status','className':'text-center'},
            {data: 'action','className':'text-center'},
        ]
    });
}
function jsUpdateHeadStatus(headID,status){
    $.ajax({
        url: baseUrl + "/libraries/head/status",
        type: "POST",
        cache: false,
        data: {
            headID:headID,
            status:status
        },
        // processData: false,
        // contentType: false,
        dataType: "JSON",
        success: function(data) {
            if (data.success == true) {
                sweetAlert(1000,'Update Status',data.msg,data.status);
                getHeadDatatable(headID);
            }else{
                sweetAlert(1000,'Update Status',data.msg,data.status);
            }
        },
    });
}
function jsUpdateHeadInformation(headID){
    $.ajax({
        url: baseUrl + "/libraries/head/getHead/"+headID,
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
                        $("input[name='firstname']").val(val.firstname);
                        $("input[name='middlename']").val(val.middlename);
                        $("input[name='lastname']").val(val.lastname);
                        $("input[name='extensionname']").val(val.extensionname);
                        $("input[name='headID']").val(val.headID);
                        getSelectPosition();
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