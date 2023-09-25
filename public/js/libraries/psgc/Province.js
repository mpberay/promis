$(function(){
    getProvinceDatatable(region=null,id=null);
});
$('#frmProvinceFilter').on('submit', function(e) {
    var region_id = $("#frmProvinceFilter select[name='getRegion']").val();
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
            }else{
                getProvinceDatatable(region_id,id=null);
            }
        },
        // handling the promise rejection
        function (dismiss) {
            if (dismiss === 'timer') {
               
            }
        }
    );
});

$('#frmProvince').on('submit', function(){
    var formData = new FormData(this);
    if(formData.get('getRegion') == 0){
        $("#frmProvince h6[name='selectRegion']").html("Please select region . . .");
    }else{
        $.ajax({
            url: baseUrl + "/libraries/provice/action",
            type: "POST",
            cache: false,
            data: formData,
            processData: false,
            contentType: false,
            dataType: "JSON",
            success: function(data) {
                if (data.success == true) {
                    sweetAlert(1000,data.title,data.msg,data.status);
                    getProvinceDatatable(regionCode=null,data.id);
                    $("#frmProvince input[type='text']").val("");
                    getRegion();
                }else{
                    sweetAlert(1000,data.title,data.msg,data.status);
                }
            },
        });
    }
});
function getProvinceDatatable(region,id){
    var dataTable = $('#tableProvince').DataTable();
    dataTable.destroy();
    $('#tableProvince').DataTable({
        processing: true,
        serverSide: true,
        order: [],
        ajax: {
            url: baseUrl + "/libraries/provice/getDataTable", 
            type: 'GET',
            data: function (d) {
                d.region = region;
                d.id = id;
            },
            dataType: "JSON",
        },
        columns: [
            {data: 'no', orderable: false},
            {data: 'regionName'},
            {data: 'provinceCode'},
            {data: 'provinceName'},
            {data: 'provinceAcronym'},
            {data: 'dateAdded'},
            {data: 'status','className':'text-center'},
            {data: 'action','className':'text-center'},
        ]
    });
}
function jsProvinceStatus(id,status){
    $.ajax({
        url: baseUrl + "/libraries/provice/status",
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
                getProvinceDatatable(regionCode=null,id);
            }else{
                sweetAlert(1000,'Update Status',data.msg,data.status);
            }
        },
    });
}
function jsGitProvinceInfo(prov_id,region_id){
    $.ajax({
        url: baseUrl + "/libraries/provice/information",
        type: "GET",
        cache: false,
        data: {
            prov_id:prov_id,
            region_id:region_id,
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
                    $("#frmProvince select[name='getRegion']").empty();
                    $.each(data.province, function(key,val){
                        $("#frmProvince input[name='provId']").val(val.provinceID);
                        $("#frmProvince input[name='code']").val(val.provinceCode);
                        $("#frmProvince input[name='name']").val(val.provinceName);
                        $("#frmProvince input[name='acronym']").val(val.provinceAcronym);
                        $("#frmProvince select[name='getRegion']").append($('<option>', {value : val.regionID}).text(val.regionName));
                    });

                    //$("#frmProvince select[name='getRegion']").append('<option selected value="0">Select region. . .</option>'); 
                    
                    $.each(data.region, function(key,val){
                        $("#frmProvince select[name='getRegion']").append($('<option>', {value : val.regionID}).text(val.regionName));
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