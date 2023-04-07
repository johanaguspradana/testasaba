@extends('index')
@section('konten')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
    </div>
        @include('formproduct')
    <div class="card-header py-3">
        <button class="btn btn-success btn-input btn-lg" data-bs-toggle="modal" data-bs-target="#inputModal">Tambah</button>
    </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                           <th>No</th>
                           <th>Gula</th>
                           <th>Tepung Tapioka</th>
                           <th>Coklat Padat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>                                                                    
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $item->productgula }}</td>
                            <td>{{ $item->producttepung }}</td>
                            <td>{{ $item->productcoklat}}</td>
                            <td><button class="btn btn-success btn-edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{ $item->id }}" data-gula="{{ $item->productgula }}" data-tepung="{{ $item->producttepung }}" data-coklat="{{ $item->productcoklat }}">Edit</button>
                            <button class="btn btn-danger btn-hapus" data-id="{{ $item->id }}">Hapus</button>    
                        </td>
                        </tr>    
                        @endforeach
                    </tbody>
                </table>
                @include('editproduct') 
           </div>
        </div>
    </div>
</div>
@endsection