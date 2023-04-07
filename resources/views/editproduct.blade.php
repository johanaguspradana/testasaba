<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formedit">
                    @method('PUT')
                    @csrf
                        <input type="hidden" class="form-control" id="id" name="id" required>
                    <div class="form-group">
                        <label for="editGula">Gula</label>
                        <input type="text" class="form-control" id="editGula" name="productgula" required>
                    </div>
                    <div class="form-group">
                        <label for="editTepung">Tepung Tapioka</label>
                        <input type="text" class="form-control" id="editTepung" name="producttepung" required>
                    </div>
                    <div class="form-group">
                        <label for="editCoklat">Coklat Padat</label>
                        <input type="text" class="form-control" id="editCoklat" name="productcoklat" required>
                    </div>
                    <button type="submit" class="btn btn-primary" id="btnSimpanEdit" data-id="">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
    // Tambahkan event listener ke tombol "Edit"
    $('#editModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var bahan = button.data('id') // Extract info from data-* attributes
        var bahangula = button.data('productgula') // Extract info from data-* attributes
        var bahantepung = button.data('producttepung') // Extract info from data-* attributes
        var bahancoklat = button.data('productcoklat') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('New message to ')
        modal.find('.modal-body input[name=id]').val(bahan)
        modal.find('.modal-body input[name=productgula]').val(bahangula)
        modal.find('.modal-body input[name=producttepung]').val(bahantepung)
        modal.find('.modal-body input[name=productcoklat]').val(bahancoklat)
    });
    // Tambahkan event listener ke tombol "Simpan" di form edit
    $('#formedit').submit(function(event) {
        event.preventDefault();

        // Ambil data id dari tombol "Edit"
        var id = $(this).find('input[name=id]').val();

        // Ambil nilai dari input dan masukkan ke dalam objek data

        // Kirim permintaan Ajax ke server untuk melakukan operasi edit
        $.ajax({
            type: 'POST',
            url: '/product/' + id,
            data: $(this).serialize(),
            success: function(response) {
                // Tampilkan pesan berhasil
                alert(response.message);
                $('#editModal').modal('hide');
                // Muat ulang halaman untuk menampilkan data terbaru
                getdataproduct();
            },
            error: function(response) {
                // Tampilkan pesan kesalahan
                alert(response.responseJSON.message);
            }
        });
    });
    $('.btn-hapus').on('click', function() {
        let id = $(this).data('id');

        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            $.ajax({
                url: '/product/' + id,
                method: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    alert(response.message);
                    location.reload();
                },
                error: function(response) {
                    alert('Terjadi kesalahan saat mengirim permintaan AJAX.');
                }
            });
        }
    });
    });
</script>