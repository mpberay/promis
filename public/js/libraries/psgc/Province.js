$(function(){
    getRegion();
});
$('#frmProvinceFilter').on('submit', function(e) {
    var regionCode = $("#frmProvinceFilter select[name='getRegion']").val();
    Swal.fire({
        title: 'Please wait . . .',
        timer: 1000,
        onOpen: function () {
            swal.showLoading();
        }
    }).then(
        function () {
            // // Swal.fire(title,msg,status)
            if(regionCode == 0){
                Swal.fire("Filtering Province","Please select region first. . .","error");
            }else{
                getProvinceDatatable(regionCode);
            }
        },
        // handling the promise rejection
        function (dismiss) {
            if (dismiss === 'timer') {
               
            }
        }
    );
});
function getRegion(){
    $.ajax({
        url: baseUrl + "/libraries/provice/getregion",
        type: "GET",
        cache: false,
        //data: formData,
        // processData: false,
        // contentType: false,
        dataType: "JSON",
        success: function(data) {
            $("#frmProvinceFilter select[name='getRegion']").empty();
            $("#frmProvinceFilter select[name='getRegion']").append('<option selected value="0">Select region. . .</option>'); 
            $.each(data, function(key,val){
                $("#frmProvinceFilter select[name='getRegion']").append($('<option>', {value : val.regionCode}).text(val.regionName));
            });

            $("#frmProvince select[name='getRegion']").empty();
            $("#frmProvince select[name='getRegion']").append('<option selected value="0">Select region. . .</option>'); 
            $.each(data, function(key,val){
                $("#frmProvince select[name='getRegion']").append($('<option>', {value : val.regionCode}).text(val.regionName));
            });
        },
    });
}
function getProvinceDatatable(regionCode){
    var dataTable = $('#tableProvince').DataTable();
    dataTable.destroy();
    $('#tableProvince').DataTable({
        processing: true,
        serverSide: true,
        ajax: baseUrl + "/libraries/provice/getDataTable/"+regionCode,
        order: [],
        // type: 'GET',
        method: 'GET',
        dataType: "JSON",
        columns: [
            {data: 'no', orderable: false},
            {data: 'provinceCode'},
            {data: 'provinceName'},
            {data: 'dateAdded'},
            {data: 'status','className':'text-center'},
            {data: 'action','className':'text-center'},
        ]
    });
}