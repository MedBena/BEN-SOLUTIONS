var colors = {
    danger: "#ff6c6c",
    warning: "#f6b749",
    info: "#4ab0c1",
    success: "#2dcb73",
    primary: "#438eff"
}
function toastify(text,color){
    Toastify({
        text: text,
        style :{
            background : colors[color]
        },
        duration: 3000,
        close: true,
        gravity: "top", 
        position: "center",
        stopOnFocus: true
      }).showToast();
}

function ajax_request(method = 'GET',url,data){     
    return $.ajax({
        url: url,
        type: method,
        data: data,
        contentType: false,
        cache: false,
        processData: false,
    });
}

function loading_btn(action,btn,color='primary',Cwith=''){
    let loading_btn = `
        <button class="btn btn-outline-`+color+` btn-load `+Cwith+`">
            <span class="d-flex align-items-center">
                <span class="spinner-border flex-shrink-0" role="status">
                    <span class="visually-hidden">Loading...</span>
                </span>
                <span class="flex-grow-1 ms-2">
                    Loading...
                </span>
            </span>
        </button>
    `;
    if(action === 'add'){
        btn.hide();
        btn.after(loading_btn); 
    }    
    else {
        btn.next('button').remove();
        btn.show();
    }
}

function data_table(table,add_option = {},order=false){
    document.addEventListener("DOMContentLoaded", function () {
        var main_option = {scrollX: !0 ,fixedHeader: !0 , pagingType: "full_numbers",ordering:order };
        var option = Object.assign(main_option, add_option);
        new DataTable(table,option);
    });
}

function DeleteWithUrl(url){
    Swal.fire({
        html:
            '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon><div class="mt-4 pt-2 fs-15 mx-5"><h4>Are you Sure ?</h4><p class="text-muted mx-4 mb-0">Are you Sure You want to Delete this ?</p></div></div>',
        showCancelButton: !0,
        confirmButtonClass: "btn btn-primary w-xs me-2 mb-1",
        confirmButtonText: "Yes, Delete It!",
        cancelButtonClass: "btn btn-danger w-xs mb-1",
        buttonsStyling: !1,
        showCloseButton: !0,
    }).then(function (t) {
        if(t.isConfirmed) window.location.href = url;
    });
}