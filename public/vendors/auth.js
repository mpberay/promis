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
        e.preventDefault();
        var formData = new FormData(this);
        if($('input[type="checkbox"]').is(":checked")){
           
            $.ajax({
                url: baseUrl + "/newaccount",
                type: "POST",
                cache: false,
                data: formData,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function(data) {
                    if (data.success == true) {
                        //window.location = baseUrl + "/dashboard";
                        // console.log(data.msg);
                        $("#DivValidator").show(data.msg);
                        $("#DivValidator" ).removeClass('alert-danger').addClass('alert-success');
                        $("#spanValidator").html(data.msg);
                        $('input[type="submit"]').attr("disabled",true);
                        $("#frmRegistration input[type='text'], #frmRegistration input[type='email'], #frmRegistration input[type='checkbox'],#frmRegistration input[type='password']").val("");
                    }else{
                        $("#DivValidator").show(data.msg);
                        $("#spanValidator").html(data.msg);
                        //console.log(data.msg);
                        //grecaptcha.reset();
                    }
                    //alert("asdasd");
                },
            });
        }else{
            $("#spanAgree").html("Warning: You Must Agree to Our Privacy Policy, Thanks");
            $("#spanAgree").show('slow');
        }
    });
    $("#checkbox1").click(function() {
        if ($('input[type="checkbox"]').is(":checked")) {
            $("#spanAgree").hide();
        } 
    });
    $("#password").keyup(passwordLength);
    $("#password").keyup(checkPasswordMatch);
	$("#confirm_password").keyup(checkPasswordMatch);
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
function checkPasswordMatch() {
    var password = $("#password").val();
    var confirmPassword = $("#confirm_password").val();
    if (password != confirmPassword){
        $('input[type="submit"]').attr("disabled",true);
        $("#spanConfirmPassword").html("Passwords does not match!");
        $("#spanConfirmPassword" ).addClass('text-danger text-sm'); //.attr('class','text-success text-sm');
    }else{
        $('input[type="submit"]').removeAttr('disabled');
        $('input[type="submit"]').attr("false",true);
        $("#spanConfirmPassword").html("Passwords match.");
        $("#spanConfirmPassword" ).removeClass('text-danger text-sm').addClass('text-success text-sm'); //.attr('class','text-success text-sm');
    }
    
}
function passwordLength(){
    var password = $("#password").val();
    if(password.length  < 8 ){
        $("#spanPassword").html("Password length must be atleast 8 characters");
        $("#spanPassword").show();
    }else{
        $("#spanPassword").hide();
    }
}