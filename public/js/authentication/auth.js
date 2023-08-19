$(function() {
    $('#FrmLogin').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        //console.log(formData.get('email'));
        $.ajax({
            url: baseUrl + "/login",
            type: "POST",
            cache: false,
            data: formData,
            processData: false,
            contentType: false,
            dataType: "JSON",
            success: function(data) {
                if (data.success == true) {
                    window.location = baseUrl + "/dashboard";
                }else{
                    $("#DivValidator").show(data.msg);
                    $("#SpanValidator").html(data.msg);
                }
            },
        });
    })
});
