@if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div> <!-- /.alert -->
@endif

@if(session('error'))
  <div class="alert alert-danger">
    {{ session('error') }}
  </div> <!-- /.alert -->
@endif
