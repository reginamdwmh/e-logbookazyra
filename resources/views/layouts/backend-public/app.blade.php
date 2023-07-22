<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <link rel="icon" href="{{ asset('assets/AdminLTE/dist/img/e-booklogo.png')}}">
  @include('layouts.backend-public.stylesheet')
</head>


<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

@include('layouts.backend-public.navbar')

@include('layouts.backend-public.sidebar')  
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('title')</h1>

          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div><!-- /.col -->



        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    @yield('content')
    @include('layouts.backend-public.modal')
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('layouts.backend-public.footer')
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@include('sweetalert::alert')

@include('layouts.backend-public.javascript')
</body>
</html>
