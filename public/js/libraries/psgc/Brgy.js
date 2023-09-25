$("#frmBrgy select[name='getRegion']").on('change', function(e) {
    var region_id = $("#frmBrgy select[name='getRegion']").val();
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
            $("#frmBrgy select[name='getProvince']").empty();
            $("#frmBrgy select[name='getProvince']").append('<option selected value="0">Select province. . .</option>'); 
            $.each(data.province, function(key,val){
                $("#frmBrgy select[name='getProvince']").append($('<option>', {value : val.provinceID}).text(val.provinceName));
            });
        },
    });
});
$("#frmBrgyFilter select[name='getRegion']").on('change', function(e) {
    var region_id = $("#frmBrgyFilter select[name='getRegion']").val();
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
            $("#frmBrgyFilter select[name='getProvince']").empty();
            $("#frmBrgyFilter select[name='getProvince']").append('<option selected value="0">Select province. . .</option>'); 
            $.each(data.province, function(key,val){
                $("#frmBrgyFilter select[name='getProvince']").append($('<option>', {value : val.provinceID}).text(val.provinceName));
            });
        },
    });
});
$("#frmBrgy select[name='getProvince']").on('change', function(e) {
    var province_id = $("#frmBrgy select[name='getProvince']").val();
    $.ajax({
        url: baseUrl + "/libraries/citymun/citymun",
        type: "GET",
        cache: false,
        data: {
            province_id:province_id
        },
        // processData: false,
        // contentType: false,
        dataType: "JSON",
        success: function(data) {
            $("#frmBrgy select[name='getCitymun']").empty();
            $("#frmBrgy select[name='getCitymun']").append('<option selected value="0">Select City / Municipality. . .</option>'); 
            $.each(data.citymun, function(key,val){
                $("#frmBrgy select[name='getCitymun']").append($('<option>', {value : val.citymunID}).text(val.citymunName));
            });
        },
    });
});
$("#frmBrgyFilter select[name='getProvince']").on('change', function(e) {
    var province_id = $("#frmBrgyFilter select[name='getProvince']").val();
    $.ajax({
        url: baseUrl + "/libraries/citymun/citymun",
        type: "GET",
        cache: false,
        data: {
            province_id:province_id
        },
        // processData: false,
        // contentType: false,
        dataType: "JSON",
        success: function(data) {
            $("#frmBrgyFilter select[name='getCitymun']").empty();
            $("#frmBrgyFilter select[name='getCitymun']").append('<option selected value="0">Select City / Municipality. . .</option>'); 
            $.each(data.citymun, function(key,val){
                $("#frmBrgyFilter select[name='getCitymun']").append($('<option>', {value : val.citymunID}).text(val.citymunName));
            });
        },
    });
});
$('#frmBrgyFilter').on('submit', function(e) {
    var region_id = $("#frmBrgyFilter select[name='getRegion']").val();
    var province_id = $("#frmBrgyFilter select[name='getProvince']").val();
    var citymun_id = $("#frmBrgyFilter select[name='getCitymun']").val();
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
                Swal.fire("Filtering Province","Please select region. . .","error");
            }else {
                getBrgy(region_id,province_id,citymun_id);
            }
        },
        // handling the promise rejection
        function (dismiss) {
            if (dismiss === 'timer') {
               
            }
        }
    );
});
function getBrgy(region_id,province_id,citymun_id){
    var dataTable = $('#tableBrgy').DataTable();
    dataTable.destroy();
    $('#tableBrgy').DataTable({
        processing: true,
        serverSide: true,
        order: [],
        ajax: {
            url: baseUrl + "/libraries/brgy/getbrgy", 
            type: 'GET',
            data: function (d) {
                d.region_id = region_id;
                d.province_id = province_id;
                d.citymun_id = citymun_id;
            },
            dataType: "JSON",
        },
        columns: [
            // {data: 'no', orderable: false},
            // {data: 'regionName'},
            // {data: 'provinceName'},
            // {data: 'citymunCode'},
            // {data: 'citymunName'},
            // {data: 'citymunAcronym'},
            // {data: 'zipCode'},
            // {data: 'dateAdded'},
            // {data: 'status','className':'text-center'},
            // {data: 'action','className':'text-center'},
        ]
    });
}