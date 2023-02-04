async function authentification(){    
    $(".invalid-feedback").text('');
    var form = $("#authentification-form"),
        username = $("#username"),
        password = $("#password");
    form.find('.is-invalid').removeClass('is-invalid');
    if(username.val() === ""){
        username.addClass('is-invalid');
        username.next('div').text('Please enter your username');
        return false;
    }
    if(password.val() === ""){
        password.addClass('is-invalid');
        password.next('div').text('Please enter your password');
        return false;
    }
    loading_btn("add",$("#sign-in"));
    var formData = new FormData(form[0]);
    let response = await ajax_request('POST','authentification',formData);    
    loading_btn("remove",$("#sign-in"));
    response = JSON.parse(response);
    if(response.hasOwnProperty("errors")==true){
        var errors = response.errors;
        if(errors.hasOwnProperty("field")==true){
            $("#"+errors.field).addClass('is-invalid');
            $("#"+errors.field).next('div').text(errors.msg);
        }
        else toastify(response.errors,'danger');
    }
    if(response.hasOwnProperty("success")==true){
        toastify(response.success,'success');
        setTimeout(() => {
            window.location.href = 'home';  
        }, 2000);       
    }
}
async function forgotPassword(){    
    $(".invalid-feedback").text('');
    var form = $("#forgot-password-form"),
        email = $("#email");
    form.find('.is-invalid').removeClass('is-invalid');
    if(email.val() === ""){
        email.addClass('is-invalid');
        email.next('div').text('Please enter your email');
        return false;
    }    
    var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; 
    if(!pattern.test(email.val())){
        email.addClass('is-invalid');
        email.next('div').text('Please enter valid e-mail address');
        return false;
    }
    loading_btn("add",$("#send-reset"));
    var formData = new FormData(form[0]);
    let response = await ajax_request('POST','forgotPassword',formData);    
    loading_btn("remove",$("#send-reset"));
    response = JSON.parse(response);
    if(response.hasOwnProperty("errors")==true){
        var errors = response.errors;
        if(errors.hasOwnProperty("field")==true){
            $("#"+errors.field).addClass('is-invalid');
            $("#"+errors.field).next('div').text(errors.msg);
        }
        else toastify(response.errors,'danger');
    }
    if(response.hasOwnProperty("success")==true){
        email.val('');
        $(".alert-warning").hide();    
        $(".alert-success").show();   
         
    }
}
async function resetPassword(){
    $(".invalid-feedback").text('');
    var form = $("#reset-password-form"),
        password_input = $("#password"),
        confirm_password_input = $("#confirm-password-input")
        btn = $("#reset-password");
    form.find('.is-invalid').removeClass('is-invalid');
    if(password_input.val() === ""){
        password_input.addClass('is-invalid');
        password_input.next('div').text('Please enter password');
        return false;
    } 
    var pattern = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/; 
    if(!pattern.test(password_input.val())){
        password_input.addClass('is-invalid');
        password_input.next('div').text('Please enter a strong password');
        return false;
    }
    if(confirm_password_input.val() === ""){
        confirm_password_input.addClass('is-invalid');
        confirm_password_input.next('div').text('Please enter confirm password');
        return false;
    } 
    if(confirm_password_input.val() != password_input.val()){
        confirm_password_input.addClass('is-invalid');
        confirm_password_input.next('div').text('Please enter a correct confirm password');
        return false;
    } 
    loading_btn("add",btn); 
    var formData = new FormData(form[0]);
    let response = await ajax_request('POST','/resetPassword',formData);    
    loading_btn("remove",btn);
    response = JSON.parse(response);
    if(response.hasOwnProperty("errors")==true){
        var errors = response.errors;
        if(errors.hasOwnProperty("field")==true){
            $("#"+errors.field).addClass('is-invalid');
            $("#"+errors.field).next('div').text(errors.msg);
        }
        else toastify(response.errors,'danger');
    }
    if(response.hasOwnProperty("success")==true){
        toastify(response.success,'success');
        setTimeout(() => {
            window.location.href = '/home';  
        }, 2000);       
    }
}