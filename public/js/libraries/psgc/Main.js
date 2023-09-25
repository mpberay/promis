$(function(){
    $(".jsSingleSelect").select2({
        //placeholder: "Select Position . . ."
    }); 
     
    getRegion();
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
            //Province
            $("#frmProvinceFilter select[name='getRegion']").empty();
            $("#frmProvinceFilter select[name='getRegion']").append('<option selected value="0">Select region. . .</option>'); 
            $.each(data, function(key,val){
                $("#frmProvinceFilter select[name='getRegion']").append($('<option>', {value : val.regionID}).text(val.regionName));
            });

            $("#frmProvince select[name='getRegion']").empty();
            $("#frmProvince select[name='getRegion']").append('<option selected value="0">Select region. . .</option>'); 
            $.each(data, function(key,val){
                $("#frmProvince select[name='getRegion']").append($('<option>', {value : val.regionID}).text(val.regionName));
            });

            //City Municipality
            $("#frmCityMunFilter select[name='getRegion']").empty();
            $("#frmCityMunFilter select[name='getRegion']").append('<option selected value="0">Select region. . .</option>'); 
            $.each(data, function(key,val){
                $("#frmCityMunFilter select[name='getRegion']").append($('<option>', {value : val.regionID}).text(val.regionName));
            });


            $("#frmCityMun select[name='getRegion']").empty();
            $("#frmCityMun select[name='getRegion']").append('<option selected value="0">Select region. . .</option>'); 
            $.each(data, function(key,val){
                $("#frmCityMun select[name='getRegion']").append($('<option>', {value : val.regionID}).text(val.regionName));
            });

            //Barangay
            $("#frmBrgyFilter select[name='getRegion']").empty();
            $("#frmBrgyFilter select[name='getRegion']").append('<option selected value="0">Select region. . .</option>'); 
            $.each(data, function(key,val){
                $("#frmBrgyFilter select[name='getRegion']").append($('<option>', {value : val.regionID}).text(val.regionName));
            });


            $("#frmBrgy select[name='getRegion']").empty();
            $("#frmBrgy select[name='getRegion']").append('<option selected value="0">Select region. . .</option>'); 
            $.each(data, function(key,val){
                $("#frmBrgy select[name='getRegion']").append($('<option>', {value : val.regionID}).text(val.regionName));
            });
        },
    });
}

