<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fontawesome ICON -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" >

    <!-- CoreUI for Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.0.2/dist/css/coreui.min.css" rel="stylesheet" >

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <!-- livewire -->
    @livewireStyles

    <style>
      .wrapper {
          padding-left: var(--cui-sidebar-occupy-start, 0);
      }
    </style>

    <title>Admin Panel</title>
  </head>
  <body>
    @include('partials.admin-sidebar')
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
      @include('partials.admin-header')

      <div class="body flex-grow-1 px-3">
        @yield('content')
      </div>
      <footer class="footer">
        <div><a href="https://coreui.io">CoreUI </a><a href="https://coreui.io">Bootstrap Admin Template</a> © 2021 creativeLabs.</div>
        <div class="ms-auto">Powered by&nbsp;<a href="https://coreui.io/bootstrap/ui-components/">CoreUI UI Components</a></div>
      </footer>
    </div>


    <!-- Option 1: CoreUI for Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.0.2/dist/js/coreui.bundle.min.js"></script>

    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <!-- data tables -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <!-- livewire -->
    @livewireScripts

    <script>
      $(document).ready(function(){
        $('#example').DataTable( {
        } );  
      });
      
    </script>

    @yield('script')
  </body>
</html>