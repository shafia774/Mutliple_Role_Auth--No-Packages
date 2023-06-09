<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Roles') }}</title>
    <link rel="shortcut icon" href="{{ asset('/images/admin-panel/roles.png') }}">

    <!-- Custom fonts for this template-->
    @vite('resources/admin_panel/vendor/fontawesome-free/css/all.min.css')
    
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    @vite('resources/admin_panel/css/sb-admin-2.min.css')

     <!-- Custom styles for this Tables -->
    @vite('resources/admin_panel/vendor/datatables/dataTables.bootstrap4.min.css')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        
        <!-- End of Sidebar -->
        @include('layouts/partials.sidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column bg-light">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layouts/partials.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid ">
                    
                    <!-- Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger dismissible sticky-bottom fade show m-3">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @yield('content')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('layouts/partials.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    @vite('resources/admin_panel/vendor/jquery/jquery.min.js')
    @vite('resources/admin_panel/vendor/bootstrap/js/bootstrap.bundle.min.js')

    <!-- Core plugin JavaScript-->
    @vite('resources/admin_panel/vendor/jquery-easing/jquery.easing.min.js')


    <!-- Custom scripts for all pages-->
    @vite('resources/admin_panel/js/sb-admin-2.min.js')

    <!--  Table page level plugins -->
    @vite('resources/admin_panel/vendor/datatables/jquery.dataTables.min.js')
    @vite('resources/admin_panel/vendor/datatables/dataTables.bootstrap4.min.js')

    <!--  Table page custom scripts -->
    @vite('resources/admin_panel/js/demo/datatables-demo.js')

</body>

</html>