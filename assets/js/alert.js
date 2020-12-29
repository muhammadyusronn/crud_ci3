const flashdata = $('.flash-data').data('flashdata');
if(flashdata){
    swal({
        title: "Sukses!",
        text: flashdata,
        icon: "success",

    })
}

$( "#tombol-hapus" ).click(function(e) {
    e.preventDefault();
    const href = $(this).attr('href');
    swal({
        title: "Apakah anda yakin menghapus data? ",
        text: "Sekali data terhapus, kamu tidak akan bisa mengembalikan data!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
    if (willDelete) {
        document.location.href= href;
    } else {
        swal("Anda membatalkan hapus data!");
    }
    });
});