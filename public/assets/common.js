var toastrOptions = {
    closeButton: !1,
    debug: !1,
    newestOnTop: !1,
    progressBar: !0,
    preventDuplicates: !1,
    onclick: null,
    showDuration: "300",
    hideDuration: "2500",
    timeOut: "5000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
};

function successToast(e = "İşlem başarıyla gerçekleşti", t = "", hideDuration = 2500, p="top-center") {
    toastrOptions.hideDuration=hideDuration;
    toastrOptions.positionClass = 'toast-'+p;
    (toastr.options = toastrOptions), toastr.success(e, t);
}

function infoToast(e = "Bilgilendirme", t = "", hideDuration = 2500, p="top-center") {
    toastrOptions.hideDuration=hideDuration;
    toastrOptions.positionClass = 'toast-'+p;
    (toastr.options = toastrOptions), toastr.info(e, t);
}

function warningToast(e = "Uyarı", t = "", hideDuration = 2500, p="top-center") {
    toastrOptions.hideDuration=hideDuration;
    toastrOptions.positionClass = 'toast-'+p;
    (toastr.options = toastrOptions), toastr.warning(e, t);
}

function errorToast(e = "Hata", t = "", hideDuration = 2500, p="top-center") {
    toastrOptions.hideDuration=hideDuration;
    toastrOptions.positionClass = 'toast-'+p;
    (toastr.options = toastrOptions), toastr.error(e, t);
}

function request(e = "POST", t, a = {}, i, s = null, n = null, c = null) {
    $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        }),
        (a._token = $("meta[name='csrf-token']").attr("content")),
        $.ajax({
            url: t,
            type: e,
            beforeSend: s,
            error: n,
            data: a,
           /*  processData: false,
            contentType: false, */
            complete: function(xhr) {
                if (200 !== xhr.status) {
                    var response = JSON.parse(xhr.responseText);
                    $.each(response.errors, function(key, value) {
                        errorToast(value.join(", "));
                    });
                }
            },
            success: function(e) {
                console.log(e.status)
            },
        });
}

$(".deleteBook").click(function(){
    
    if(confirm("This book will be deleted permanantly, are you sure?")) {
        $($(this).data("form")).submit();
    }
});

$(".deleteAuthor").click(function(){
    
    if(confirm("This auhtor will be deleted permanantly, are you sure?")) {
        $($(this).data("form")).submit();
    }
});