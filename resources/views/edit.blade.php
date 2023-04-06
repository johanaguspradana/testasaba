<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="editGula">Gula</label>
                        <input type="text" class="form-control" id="editGula" name="gula" required>
                    </div>
                    <div class="form-group">
                        <label for="editTepung">Tepung Tapioka</label>
                        <input type="text" class="form-control" id="editTepung" name="tepung_tapioka" required>
                    </div>
                    <div class="form-group">
                        <label for="editCoklat">Coklat Padat</label>
                        <input type="text" class="form-control" id="editCoklat" name="coklat_padat" required>
                    </div>
                    <button type="submit" class="btn btn-primary" id="btnSimpanEdit" data-id="">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>