$(function() {
    $('.tambahDataMahasiswa').on('click', function() {
        $('#formModalLabel').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');

        $('#nim').val('');
        $('#nama').val('');
        $('#email').val('');
        $('#jurusan').val('');
    });

    $('.ubahDataMahasiswa').on('click', function() {
        $('#formModalLabel').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/edit');

        const nim = $(this).data('nim');

        $.ajax({
            url: 'http://localhost/phpmvc/public/mahasiswa/getubah',
            data: {nim : nim},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#nim').val(data.NIM);
                $('#nama').val(data.Nama);
                $('#email').val(data.Email);
                $('#jurusan').val(data.Jurusan);
            }
        });
    });
});