
<!DOCTYPE html>
<html>
<head>
@include('templates.header')
@stack('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
@include('templates.navbar')
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
@include('templates.sidebar')
  <!-- Content Wrapper. Contains page content -->
@yield('content')
  <!-- /.content-wrapper -->
  <footer class="main-footer">
@include('templates.footer')
  </footer>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@include('templates.script')
@stack('js')
</body>
</html>
