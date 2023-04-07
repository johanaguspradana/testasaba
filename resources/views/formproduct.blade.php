<div class="modal fade" id="inputModal" tabindex="-1" role="dialog" aria-labelledby="inputModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="inputModalLabel">Input Data</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="tambah">
                    @csrf
                    <div class="form-group">
                        <label for="inputGula">Gula</label>
                        <input type="text" class="form-control" id="inputGula" name="productgula" required>
                    </div>
                    <div class="form-group">
                        <label for="inputTepung">Tepung Tapioka</label>
                        <input type="text" class="form-control" id="inputTepung" name="producttepung" required>
                    </div>
                    <div class="form-group">
                        <label for="inputCoklat">Coklat Padat</label>
                        <input type="text" class="form-control" id="inputCoklat" name="productcoklat" required>
                    </div>
                    <button type="submit" class="btn btn-primary" id="btnSimpan" >Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
    // Tambahkan event listener ke tombol "Simpan"
    $('#tambah').submit(function(event) {

        event.preventDefault();
        // Kirim permintaan Ajax ke server
        $.ajax({
            type: 'POST',
            url: '/product',
            data: $(this).serialize(),
            success: function(response) {
                // Tampilkan pesan berhasil
                alert(response.message);
                getdata();
            },
            error: function(response) {
                // Tampilkan pesan kesalahan
                alert(response.responseJSON.message);
            }
        });
    });
// function getdata(){
//     $.ajax({
//         type: 'GET',
//             url: '/getdata',
//             success: function(response) {
//                 console.log(response);
//                 response.forEach(element => {
//                 var data = `
//                     <tr>
//                         <td>`+element.gula+`</td>
//                         <td>`+element.tepung+`</td>
//                         <td>`+element.coklat+`</td>
//                         <td><button class="btn btn-success btn-edit" data-id="`+element.id+`" data-gula="`+element.gula+`" data-tepung="`+element.tepung+`" data-coklat="`+element.coklat+`">Edit</button>
//                             <button class="btn btn-danger btn-hapus" data-id="`+element.id+`">Hapus</button>
//                         </td>
//                     </tr> `                   
//                 });
//                 endforeach;
//             },
//             error: function(response) {
//                 // Tampilkan pesan kesalahan
//                 alert(response.responseJSON.message);
//             }
//     });
// }
});

</script>