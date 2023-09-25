$(function(){
    getCityMun();
});

$("#frmCityMun select[name='getRegion']").on('change', function(e) {
    var region_id = $("#frmCityMun select[name='getRegion']").val();
    $.ajax({
        url: baseUrl + "/libraries/provice/getprovince",
        type: "GET",
        cache: false,
        data: {
            region_id:region_id
        },
        // processData: false,
        // contentType: false,
        dataType: "JSON",
        success: function(data) {
            $("#frmCityMun select[name='getProvince']").empty();
            $("#frmCityMun select[name='getProvince']").append('<option selected value="0">Select province. . .</option>'); 
            $.each(data.province, function(key,val){
                $("#frmCityMun select[name='getProvince']").append($('<option>', {value : val.provinceID}).text(val.provinceName));
            });
        },
    });
});
$("#frmCityMunFilter select[name='getRegion']").on('change', function(e) {
    var region_id = $("#frmCityMunFilter select[name='getRegion']").val();
    $.ajax({
        url: baseUrl + "/libraries/provice/getprovince",
        type: "GET",
        cache: false,
        data: {
            region_id:region_id
        },
        // processData: false,
        // contentType: false,
        dataType: "JSON",
        success: function(data) {
            $("#frmCityMunFilter select[name='getProvince']").empty();
            $("#frmCityMunFilter select[name='getProvince']").append('<option selected value="0">Select province. . .</option>'); 
            $.each(data.province, function(key,val){
                $("#frmCityMunFilter select[name='getProvince']").append($('<option>', {value : val.provinceID}).text(val.provinceName));
            });
        },
    });
});
$('#frmCityMunFilter').on('submit', function(e) {
    var region_id = $("#frmCityMunFilter select[name='getRegion']").val();
    var province_id = $("#frmCityMunFilter select[name='getProvince']").val();
    Swal.fire({
        title: 'Please wait . . .',
        timer: 1000,
        onOpen: function () {
            swal.showLoading();
        }
    }).then(
        function () {
            // // Swal.fire(title,msg,status)
            if(region_id == 0){
                Swal.fire("Filtering Province","Please select region first. . .","error");
            }else {
                getCityMun(region_id,province_id,id=0);
            }
        },
        // handling the promise rejection
        function (dismiss) {
            if (dismiss === 'timer') {
               
            }
        }
    );
});
$('#frmCityMun').on('submit', function(e) {
    var formData = new FormData(this);
    if(formData.get('getRegion') == 0){
        $("#frmCityMun h6[name='selectRegion']").html("Please select region . . .");
    }else if(formData.get('getProvince') == 0){
        $("#frmCityMun h6[name='selectProvince']").html("Please select province . . .");
        $("#frmCityMun h6[name='selectRegion']").html("");
    }else{
        $.ajax({
            url: baseUrl + "/libraries/citymun/action",
            type: "POST",
            cache: false,
            data: formData,
            processData: false,
            contentType: false,
            dataType: "JSON",
            success: function(data) {
                if (data.success == true) {
                    sweetAlert(1000,data.title,data.msg,data.status);
                    getCityMun(region_id = 0,province_id = 0,data.id);
                    $("#frmCityMun input[type='text']").val("");
                    $("#frmCityMun input[type='number']").val("");

                    //refresh select
                    $("#frmCityMunFilter select[name='getProvince']").empty();
                    $("#frmCityMunFilter select[name='getProvince']").append('<option selected value="0">Select province. . .</option>'); 
                    $("#frmCityMun select[name='getProvince']").empty();
                    $("#frmCityMun select[name='getProvince']").append('<option selected value="0">Select province. . .</option>'); 
                    getRegion();
                }else{
                    sweetAlert(1000,data.title,data.msg,data.status);
                }
            },
        });
    }
    //alert(formData.get('getRegion'));
});
function getCityMun(region_id,province_id,id){
    var dataTable = $('#tableCityMun').DataTable();
    dataTable.destroy();
    $('#tableCityMun').DataTable({
        processing: true,
        serverSide: true,
        order: [],
        ajax: {
            url: baseUrl + "/libraries/citymun/getcitymun", 
            type: 'GET',
            data: function (d) {
                d.region_id = region_id;
                d.province_id = province_id;
                d.id = id;
            },
            dataType: "JSON",
        },
        columns: [
            {data: 'no', orderable: false},
            {data: 'regionName'},
            {data: 'provinceName'},
            {data: 'citymunCode'},
            {data: 'citymunName'},
            {data: 'citymunAcronym'},
            {data: 'zipCode'},
            {data: 'dateAdded'},
            {data: 'status','className':'text-center'},
            {data: 'action','className':'text-center'},
        ]
    });
}
function jsUpdateCityMunStatus(id,status){
    $.ajax({
        url: baseUrl + "/libraries/citymun/status",
        type: "POST",
        cache: false,
        data: {
            id:id,
            status:status
        },
        // processData: false,
        // contentType: false,
        dataType: "JSON",
        success: function(data) {
            if (data.success == true) {
                sweetAlert(1000,'Update Status',data.msg,data.status);
                getCityMun(region_id = 0,province_id = 0,id);
            }else{
                sweetAlert(1000,'Update Status',data.msg,data.status);
            }
        },
    });
}
function jsGetCitymunInfo(region,province,citymun){
    $.ajax({
        url: baseUrl + "/libraries/citymun/information",
        type: "GET",
        cache: false,
        data: {
            region:region,
            province:province,
            citymun:citymun,
        },
        dataType: "JSON",
        success: function(data) {
            Swal.fire({
                title: 'Please wait getting information. . .',
                timer: 1000,
                onOpen: function () {
                    swal.showLoading();
                }
            }).then(
                function () {
                    $("#frmCityMun select[name='getRegion']").empty();
                    $("#frmCityMun select[name='getProvince']").empty();
                    $.each(data.citymun, function(key,val){
                        $("#frmCityMun input[name='citymun_id']").val(val.citymunID);
                        $("#frmCityMun input[name='citymuncode']").val(val.citymunCode);
                        $("#frmCityMun input[name='name']").val(val.citymunName);
                        $("#frmCityMun input[name='acronym']").val(val.citymunAcronym);
                        $("#frmCityMun input[name='zip']").val(val.zipCode);
                        $("#frmCityMun select[name='getRegion']").append($('<option>', {value : val.regionID}).text(val.regionName));
                        $("#frmCityMun select[name='getProvince']").append($('<option>', {value : val.provinceID}).text(val.provinceName));
                    });

                    // //$("#frmProvince select[name='getRegion']").append('<option selected value="0">Select region. . .</option>'); 
                    
                    $.each(data.region, function(key,val){
                        $("#frmCityMun select[name='getRegion']").append($('<option>', {value : val.regionID}).text(val.regionName));
                    });
                    $.each(data.province, function(key,val){
                        $("#frmCityMun select[name='getProvince']").append($('<option>', {value : val.provinceID}).text(val.provinceName));
                    });
                },
                // handling the promise rejection
                function (dismiss) {
                    if (dismiss === 'timer') {
                       
                    }
                }
            );
        }
    });
}