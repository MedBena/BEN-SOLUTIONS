$(document).ready(function(){
    $(".input-client-type").on('change',function(){
        if($(this).val() === 'p'){
            $('body').find('.input_particular').show();
            $('body').find('.input_company').hide();
        } 
        else{
            $('body').find('.input_particular').hide();
            $('body').find('.input_company').show();
        }
    });
});
var client_number = $("#client_number"),
    input_client_type = $(".input-client-type"),
    first_name = $("#first_name"),
    last_name = $("#last_name"),
    company = $("#company"),
    email = $("#email"),
    email = $("#email"),
    phone = $("#phone");

function handle_add(){
    console.log(input_client_type.parent().parent().html());
    var form = $("#from-add-client");        
    form.find('.is-invalid').removeClass('is-invalid');
    form.find('.invalid-feedback').text('');
    if(client_number.val() === ""){
        client_number.addClass('is-invalid');
        client_number.next('div').text('Please enter client number');
        return false;
    }
    if(!input_client_type.is(':checked')){
        input_client_type.addClass('is-invalid');
        var invalid =  input_client_type.parent().parent().find('.invalid-feedback');
        invalid.text('Please enter client type');
        invalid.show();
        return false;
    }
    
    if(email.val() === ""){
        email.addClass('is-invalid');
        email.next('div').text('Please enter email for the user');
        return false;
    }
    return false;
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
    var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; 
    if(!pattern.test(email.val())){
        email.addClass('is-invalid');
        email.next('div').text('Please enter valid e-mail address');
        return false;
    }
    form.submit();
}