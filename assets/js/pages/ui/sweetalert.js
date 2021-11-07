var salah = $('#salah').data('salah');
        if(salah) {swal("ERROR!", salah, "error");}
var flash = $('#flash').data('flash');
        if(flash) {swal("Good job!", flash, "success");}
$(document).on('click', '#btn-hapus', function(e){
        e.preventDefault();
        var link = $(this).attr('href');
        swal({
                title: "Apakah anda yakin?",
                text: "Data yang anda pilih akan terhapus!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya, Hapus!",
                cancelButtonText: "tidak jadi!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    window.location = link;
                } else {
                    swal("Batal", "Data aman! :)", "error");
                }
            });
})