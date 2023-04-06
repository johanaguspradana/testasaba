<!DOCTYPE html>
<html>
<head>
	<title>Test FD</title>
</head>
<body>
	<a href="/pegawai/tambah"> + Tambah Pegawai Baru</a>
    <div id="form-container">
        @include('form')
    </div>
	<table class="table table-striped">
    <thead>
        <tr>
            <th>Gula</th>
            <th>Tepung Tapioka</th>
            <th>Coklat Padat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->gula }}</td>
                <td>{{ $item->tepung }}</td>
                <td>{{ $item->coklat}}</td>
                <td><button class="btn btn-success btn-edit" data-id="{{ $item->id }}" data-gula="{{ $item->gula }}" data-tepung="{{ $item->tepung }}" data-coklat="{{ $item->coklat }}">Edit</button>
                    <button class="btn btn-danger btn-hapus" data-id="{{ $item->id }}">Hapus</button>
                </td>
            </tr>    
        @endforeach
    </tbody>
    </table>
</body>
</html>