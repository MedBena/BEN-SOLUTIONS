data_table("#roles-datatables");
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
    form.submit();
}
function handle_update(){
    var form = $("#from-update-role"),
        name = $("#name");
    form.find('.is-invalid').removeClass('is-invalid');
    if(name.val() === ""){
        name.addClass('is-invalid');
        name.next('div').text('Please enter name of role');
        return false;
    }
    form.submit();
}