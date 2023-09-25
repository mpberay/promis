$(function(){
    $('#topSectionTab').on('click', function(e) {
        getSelectHeadSection();
        getSelectDesignationSection();
        getSelectDivisionSection();
        getSectionDatatable(secID = 0);
    });
    $('a[name="refreshSection"]').on('click', function(e) {
        getSelectHeadSection();
        getSelectDesignationSection();
        getSelectDivisionSection();
        getSectionDatatable(secID = 0);
    });
    $('#frmSection').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var divID = $("#frmSection select[name='divID']").val();
        var headID = $("#frmSection select[name='headID']").val();
        var desID = $("#frmSection select[name='desID']").val();
        
        
        if(divID == 0){
            $("#frmSection h6[id='h6_divID']").html("Please select division. . .");
        }else if(headID == 0){
            $("#frmSection h6[id='h6_divID']").html("");
            $("#frmSection h6[id='h6_headID']").html("Please select head. . .");
        }else if(desID == 0){
            $("#frmSection h6[id='h6_divID']").html("");
            $("#frmSection h6[id='h6_headID']").html("");
            $("#frmSection h6[id='h6_desID']").html("Please select designation. . .");
        }else{
            $.ajax({
                url: baseUrl + "/libraries/section/action",
                type: "POST",
                cache: false,
                data: formData,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function(data) {
                    if (data.success == true) {
                        sweetAlert(1000,'Adding/Updating Position',data.msg,data.status);
                        getSectionDatatable(data.divID);
                        $("#frmSection input[type='text']").val("");
                        getSelectHeadSection();
                        getSelectDesignationSection();
                        getSelectDivisionSection();
                    }else{
                        sweetAlert(1000,'Adding/Updating Position',data.msg,data.status);
                    }
                },
            });
        }
        
        
    });
});
function getSectionDatatable(secID){
    var dataTable = $('#tableSection').DataTable();
    dataTable.destroy();
    $('#tableSection').DataTable({
        processing: true,
        serverSide: true,
        ajax: baseUrl + "/libraries/section/getDataTable/"+secID,
        order: [],
        // type: 'GET',
        method: 'GET',
        dataType: "JSON",
        columns: [
            {data: 'no', orderable: false},
            {data: 'secCode'},
            {data: 'secName'},
            {data: 'secAcronym'},
            {data: 'divName'},
            {data: 'fullname'},
            {data: 'desName'},
            {data: 'dateAdded'},
            {data: 'status','className':'text-center'},
            {data: 'action','className':'text-center'},
        ]
    });
}
function getSelectHeadSection(){
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
            $("#frmSection select[name='headID']").empty();
            $("#frmSection select[name='headID']").append('<option selected value="0">Select office head . . .</option>'); 
            $.each(data, function(key,val){
                $("#frmSection select[name='headID']").append($('<option>', {value : val.headID}).text(val.firstname+' '+val.middlename+' '+val.lastname));
            });
        },
    });
}
function getSelectDesignationSection(){
    $.ajax({
        url: baseUrl + "/libraries/designation/select",
        type: "GET",
        cache: false,
        //data: formData,
        // processData: false,
        // contentType: false,
        dataType: "JSON",
        success: function(data) {
            $("#frmSection select[name='desID']").empty();
            $("#frmSection select[name='desID']").append('<option selected value="0">Select head designation . . .</option>'); 
            $.each(data, function(key,val){
                $("#frmSection select[name='desID']").append($('<option>', {value : val.desID}).text(val.desName));
            });
        },
    });
}
function getSelectDivisionSection(){
    $.ajax({
        url: baseUrl + "/libraries/division/select",
        type: "GET",
        cache: false,
        //data: formData,
        // processData: false,
        // contentType: false,
        dataType: "JSON",
        success: function(data) {
            $("#frmSection select[name='divID']").empty();
            $("#frmSection select[name='divID']").append('<option selected value="0">Select division office . . .</option>'); 
            $.each(data, function(key,val){
                $("#frmSection select[name='divID']").append($('<option>', {value : val.divID}).text(val.divName));
            });
        },
    });
}
function jsUpdateSectionStatus(secID,status){
    $.ajax({
        url: baseUrl + "/libraries/section/status",
        type: "POST",
        cache: false,
        data: {
            secID:secID,
            status:status
        },
        // processData: false,
        // contentType: false,
        dataType: "JSON",
        success: function(data) {
            if (data.success == true) {
                sweetAlert(1000,'Update Status',data.msg,data.status);
                getSectionDatatable(secID);
            }else{
                sweetAlert(1000,'Update Status',data.msg,data.status);
            }
        },
    });
}
function jsgitSectionInfo(secID,divID,headID,desID){
    $.ajax({
        url: baseUrl + "/libraries/section/getInformation",
        type: "GET",
        cache: false,
        data: {
            secID:secID,
            divID:divID,
            headID:headID,
            desID:desID
        },
        // processData: false,
        // contentType: false,
        dataType: "JSON",
        success: function(data) {
            Swal.fire({
                title: 'Please wait getting information. . .',
                timer: 2000,
                onOpen: function () {
                    swal.showLoading();
                }
            }).then(
                function () {
                    // // Swal.fire(title,msg,status)
                    $.each(data.section, function(key,val){
                        $("#frmSection input[name='secCode']").val(val.secCode);
                        $("#frmSection input[name='secName']").val(val.secName);
                        $("#frmSection input[name='secAcronym']").val(val.secAcronym);
                        $("#frmSection input[name='secID']").val(val.secID);
                    });

                    //update select attribute for division librariee
                    $("#frmSection select[name='divID']").empty();
                    $("#frmSection select[name='divID']").append($('<option>', {value : data.section[0]['divID']}).text(data.section[0]['divName']));
                    $.each(data.division, function(key,val){                        
                        $("#frmSection select[name='divID']").append($('<option>', {value : val.divID}).text(val.divName));
                    });

                    //update select attribute for head librariee
                    $("#frmSection select[name='headID']").empty();
                    $("#frmSection select[name='headID']").append($('<option>', {value : data.section[0]['headID']}).text(data.section[0]['firstname']+' '+data.section[0]['middlename']+' '+data.section[0]['lastname']));
                    $.each(data.head, function(key,val){                        
                        $("#frmSection select[name='headID']").append($('<option>', {value : val.headID}).text(val.firstname+' '+val.middlename+' '+val.lastname));
                    });
                    //update select attribute for designation librariee
                    $("#frmSection select[name='desID']").empty();
                    $("#frmSection select[name='desID']").append($('<option>', {value : data.section[0]['desID']}).text(data.section[0]['desName']));
                    $.each(data.designation, function(key,val){
                        $("#frmSection select[name='desID']").append($('<option>', {value : val.desID}).text(val.desName));
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