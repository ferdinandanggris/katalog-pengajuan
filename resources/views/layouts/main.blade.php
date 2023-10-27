@include('layouts.header')
@include('layouts.navbar')

<div id="content">
  <div>
    <!-- Begin Page Content -->
    <div class="container-fluid">
    @yield('container')
    </div>
    <!-- /.container-fluid -->
  </div>
    <!-- End of Main Content -->
</div>
@include('layouts.footer')