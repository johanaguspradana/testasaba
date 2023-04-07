<div class="modal fade" id="hitungModal" tabindex="-1" role="dialog" aria-labelledby="hitungModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="inputModalLabel">Hitung Produksi</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="hitung-snak-form">
                @csrf
                    <button type="submit" class="btn btn-primary">Hitung</button>
                </form>    
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script>
$(document).ready(function () {
    $('#hitung-snak-form').submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: '/hitung-snak',
            type: 'POST',
            data: $(this).serialize(),
            success: function (response) {
                $('#hasil').html('Jumlah maksimum snak yang dapat diproduksi adalah ' + response.jumlah_snak);
            }
        });
    });
});
</script>