data_table("#buttons-datatables");
var upload = true;
var extentions = ['image/apng','image/avif','image/gif','image/jpeg','image/png','image/svg+xml','image/webp'];    
function previewFile(){
    var file = $('#profil_pic').get(0).files[0];
    var img = '/assets/images/users/user-dummy-img.jpg';
    upload = true;
    if(extentions.includes(file.type)){
        if(file){
            var reader = new FileReader();
            reader.onload = function(){
                $('.profil_pic').attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
    else {
        upload = false;
        toastify('please enter one of the allowed images type :\n'+extentions.join(),'danger');
        $('.profil_pic').attr('src',window.location.origin+img);
    }
}
var first_name = $("#first_name"),
    last_name = $("#last_name"),
    email = $("#email"),
    username = $("#username"),
    role = $("#role"),
    password = $("#password");
function handle_add(){
    var form = $("#from-add-user");        
    form.find('.is-invalid').removeClass('is-invalid');
    if(first_name.val() === ""){
        first_name.addClass('is-invalid');
        first_name.next('div').text('Please enter first name for the user');
        return false;
    }
    if(last_name.val() === ""){
        last_name.addClass('is-invalid');
        last_name.next('div').text('Please enter last name for the user');
        return false;
    }
    if(email.val() === ""){
        email.addClass('is-invalid');
        email.next('div').text('Please enter email for the user');
        return false;
    }
    var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; 
    if(!pattern.test(email.val())){
        email.addClass('is-invalid');
        email.next('div').text('Please enter valid e-mail address');
        return false;
    }
    if(username.val() === ""){
        username.addClass('is-invalid');
        username.next('div').text('Please enter username for the user');
        return false;
    }
    if(role.val() === ""){
        role.addClass('is-invalid');
        toastify('Please select role for the user','danger');
        return false;
    }
    if(password.val() === ""){
        password.addClass('is-invalid');
        password.next('div').text('Please enter password for the user');
        return false;
    }
    var pattern = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/; 
    if(!pattern.test(password.val())){
        password.addClass('is-invalid');
        password.next('div').text('Please enter a strong password');
        return false;
    }
    if(upload) form.submit();
    else toastify('please enter one of the allowed images type :\n'+extentions.join(),'danger');
}
function handle_upd(){
    var form = $("#from-upd-user");        
    form.find('.is-invalid').removeClass('is-invalid');
    if(first_name.val() === ""){
        first_name.addClass('is-invalid');
        first_name.next('div').text('Please enter first name for the user');
        return false;
    }
    if(last_name.val() === ""){
        last_name.addClass('is-invalid');
        last_name.next('div').text('Please enter last name for the user');
        return false;
    }
    if(email.val() === ""){
        email.addClass('is-invalid');
        email.next('div').text('Please enter email for the user');
        return false;
    }
    var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; 
    if(!pattern.test(email.val())){
        email.addClass('is-invalid');
        email.next('div').text('Please enter valid e-mail address');
        return false;
    }
    if(username.val() === ""){
        username.addClass('is-invalid');
        username.next('div').text('Please enter username for the user');
        return false;
    }
    if(role.val() === ""){
        role.addClass('is-invalid');
        toastify('Please select role for the user','danger');
        return false;
    }
    if(upload) form.submit();
    else toastify('please enter one of the allowed images type :\n'+extentions.join(),'danger');
}