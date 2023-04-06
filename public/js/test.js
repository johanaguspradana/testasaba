$(document).ready(function() {
    // Tambahkan event listener ke tombol "Edit"
    $('body').on('click', '.btn-edit', function(event) {
        event.preventDefault();

        // Ambil data id dari tombol "Edit"
        var id = $(this).data('id');

        // Kirim permintaan Ajax ke server untuk mendapatkan data yang akan diedit
        $.ajax({
            type: 'GET',
            url: '/data/' + id + '/edit',
            success: function(response) {
                // Tampilkan data pada form edit
                $('#editGula').val(response.gula);
                $('#editTepung').val(response.tepung_tapioka);
                $('#editCoklat').val(response.coklat_padat);
                $('#editModal').modal('show');
            },
            error: function(response) {
                // Tampilkan pesan kesalahan
                alert(response.responseJSON.message);
            }
        });
    });

    // Tambahkan event listener ke tombol "Simpan" di form edit
    $('#btnSimpanEdit').click(function(event) {
        event.preventDefault();

        // Ambil data id dari tombol "Edit"
        var id = $(this).data('id');

        // Ambil nilai dari input dan masukkan ke dalam objek data
        var data = {
            'gula': $('#editGula').val(),
            'tepung_tapioka': $('#editTepung').val(),
            'coklat_padat': $('#editCoklat').val()
        };

        // Kirim permintaan Ajax ke server untuk melakukan operasi edit
        $.ajax({
            type: 'PUT',
            url: '/data/' + id,
            data: JSON.stringify(data),
            contentType: 'application/json',
            success: function(response) {
                // Tampilkan pesan berhasil
                alert(response.message);

                // Muat ulang halaman untuk menampilkan data terbaru
                window.location.reload();
            },
            error: function(response) {
                // Tampilkan pesan kesalahan
                alert(response.responseJSON.message);
            }
        });
    });

    // Tambahkan event listener ke tombol "Hapus"
    $('body').on('click', '.btn-hapus', function(event) {
        event.preventDefault();

        // Ambil data id dari tombol "Hapus"
        var id = $(this).data('id');

        // Tampilkan konfirmasi hapus
        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            // Kirim permintaan Ajax ke server untuk melakukan operasi delete
            $.ajax({
                type: 'DELETE',
                url: '/data/' + id,
                success: function(response) {
                    // Tampilkan pesan berhasil
                    alert(response.message);

                    // Muat ulang halaman untuk menampilkan data terbaru
                    window.location.reload();
                },
                error: function(response) {
                    // Tampilkan pesan kesalahan
                    alert(response.responseJSON.message);
                }
            });
        }
    });
});