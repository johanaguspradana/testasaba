@extends('index')
@section('konten')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Jumlah Produk</h6>
    </div>
        @include('formperhitungan')
    <div class="card-header py-3">
        <button class="btn btn-success btn-input btn-lg" data-bs-toggle="modal" data-bs-target="#hitungModal">Hitung</button>
    </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                           <th>No</th>
                           <th>Jumlah Produksi Snaki</th>
                        </tr>
                    </thead>
                    <tbody>                                                                    
                        <tr>
                            <td>1</td>
                            <td><div id="hasil"></div></td>
                        </tr>    
                    </tbody>
                </table>
           </div>
        </div>
    </div>
</div>
@endsection