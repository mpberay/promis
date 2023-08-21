$(function() {
    $('#FrmLogin').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        //console.log(formData.get('login[password]'));
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
                    grecaptcha.reset();
                }
            },
        });
    });
    $('#frmRegistration').on('submit', function(e) {
        $.ajax({
            url: baseUrl + "/newaccount",
            type: "POST",
            cache: false,
            data: formData,
            processData: false,
            contentType: false,
            dataType: "JSON",
            success: function(data) {
                // if (data.success == true) {
                //     window.location = baseUrl + "/dashboard";
                // }else{
                //     $("#DivValidator").show(data.msg);
                //     $("#SpanValidator").html(data.msg);
                //     grecaptcha.reset();
                // }
            },
        });
    });
});

function ShowPassword(){
    var SpanAttr = $('#SpanPassword').attr('class');
    if(SpanAttr == ""){
        $( "input[name*='password']" ).attr('type','password');
    }else{
        $( "input[name*='password']" ).attr('type','text');
    }
}
function registerShowPassword(){
    var SpanAttr = $('#registerSpanPassword').attr('class');
    if(SpanAttr == ""){
        $( "input[name*='password']" ).attr('type','password');
    }else{
        $( "input[name*='password']" ).attr('type','text');
    }
}
function confirmShowPassword(){
    var SpanAttr = $('#confirmSpanPassword').attr('class');
    if(SpanAttr == ""){
        $( "input[name*='confirm_password']" ).attr('type','password');
    }else{
        $( "input[name*='confirm_password']" ).attr('type','text');
    }
}
