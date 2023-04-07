<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.htm">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>            
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('product') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Data Produk</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('data') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Bahan Produk</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('perhitungan') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Perhitungan</span></a>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>
                @yield('konten')        
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('js/demo/chart-pie-demo.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    <script>
        function getdata(){
            $.ajax({
                type: 'GET',
                    url: '/getdata',
                    success: function(response) {
                        console.log(response);
                        $(`#dataTable tbody`).html(``);
                        response.forEach((element,i) => {
                        var data = `
                            <tr>
                                <td>`+(i+1)+`</td>
                                <td>`+element.gula+`</td>
                                <td>`+element.tepung+`</td>
                                <td>`+element.coklat+`</td>
                                <td><button class="btn btn-success btn-edit" data-id="`+element.id+`" data-gula="`+element.gula+`" data-tepung="`+element.tepung+`" data-coklat="`+element.coklat+`">Edit</button>
                                <button class="btn btn-danger btn-hapus" data-id="`+element.id+`">Hapus</button>
                                </td>
                            </tr> `                   
                        
                            $(`#dataTable tbody`).append(data); 
                        });
                    },
                    error: function(response) {
                        // Tampilkan pesan kesalahan
                        alert(response.responseJSON.message);
                    }
            });
        }
    </script>
    <script>
        function getdata(){
            $.ajax({
                type: 'GET',
                    url: '/getdataproduct',
                    success: function(response) {
                        console.log(response);
                        $(`#dataTable tbody`).html(``);
                        response.forEach((element,i) => {
                        var data = `
                            <tr>
                                <td>`+(i+1)+`</td>
                                <td>`+element.productgula+`</td>
                                <td>`+element.producttepung+`</td>
                                <td>`+element.productcoklat+`</td>
                                <td><button class="btn btn-success btn-edit" data-id="`+element.id+`" data-gula="`+element.productgula+`" data-tepung="`+element.producttepung+`" data-coklat="`+element.productcoklat+`">Edit</button>
                                <button class="btn btn-danger btn-hapus" data-id="`+element.id+`">Hapus</button>
                                </td>
                            </tr> `                   
                        
                            $(`#dataTable tbody`).append(data); 
                        });
                    },
                    error: function(response) {
                        // Tampilkan pesan kesalahan
                        alert(response.responseJSON.message);
                    }
            });
        }
    </script>
</body>
</html>