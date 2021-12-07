<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="author" content="Digit93Team">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
      <title>Doctorino - @yield('title') </title>
      <!-- Custom styles for this template-->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      @yield('header')
   </head>
   <body id="page-top">
      <div id="app">
         <!-- Page Wrapper -->
         <div id="wrapper">
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
               <!-- Main Content -->
               <div id="content">
                  
                  <!-- Begin Page Content -->
                  <div class="container-fluid">
                     @yield('content')
                     <!-- Page Heading -->
                  </div>
                  <!-- /.container-fluid -->
               </div>
               <!-- End of Main Content -->
               
            </div>
            <!-- End of Content Wrapper -->
         </div>
         <!-- End of Page Wrapper -->
      </div>
     
      
      <!-- Bootstrap core JavaScript-->
      <script src="{{ asset('js/app.js') }}"></script>
      @yield('footer')
   </body>
</html>