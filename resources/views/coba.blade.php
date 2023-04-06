<!DOCTYPE html>
<html>
<head>
	<title>Test FD</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>
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
                <td><button class="btn btn-success btn-edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{ $item->id }}" data-gula="{{ $item->gula }}" data-tepung="{{ $item->tepung }}" data-coklat="{{ $item->coklat }}">Edit</button>
                </td>
            </tr>    
        @endforeach
    </tbody>
    </table>
    @include('edit')
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>