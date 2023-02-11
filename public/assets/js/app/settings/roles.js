$(document).ready(function(){
    data_table("#roles-datatables");
});
function handle_add(){
    var form = $("#from-add-role"),
    name = $("#name");
    form.find('.is-invalid').removeClass('is-invalid');
    if(name.val() === ""){
        name.addClass('is-invalid');
        name.next('div').text('Please enter name of role');
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