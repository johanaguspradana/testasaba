    <div>
        <form id="calculate-snacks-form">
            <label for="gula">Jumlah gula (gram):</label>
            <input type="number" name="gula" id="gula" required>

            <label for="tepung">Jumlah tepung (gram):</label>
            <input type="number" name="tepung" id="tepung" required>

            <label for="coklat">Jumlah coklat (gram):</label>
            <input type="number" name="coklat" id="coklat" required>

            <button type="submit" id="calculate-snacks-btn">Hitung</button>
        </form>

        <div id="result-container" style="display:none;">
            Jumlah snack yang dapat dibuat: <span id="jumlah-snack"></span>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#calculate-snacks-form').on('submit', function(event) {
                event.preventDefault();

                var gula = $('#gula').val();
                var tepung = $('#tepung').val();
                var coklat = $('#coklat').val();

                $.ajax({
                    url: '/calculate-snacks',
                    method: 'POST',
                    data: {
                        gula: gula,
                        tepung: tepung,
                        coklat: coklat,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $('#jumlah-snack').text(data.jumlah_snack);
                        $('#result-container').show();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            });
        });
    </script>
