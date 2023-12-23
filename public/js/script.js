const swal = $('.swal').data('swal');
console.log(swal);
if(swal) {
    Swal.fire({
        title: 'data berhasil',
        text: swal,
        icon: 'success'
    })
}


