<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard_layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/add-new-medicine.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/medicine-list.css') }}">
    <link rel="stylesheet" type="text/js" href="{{ asset('js/app.js') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    

    <title>Bootstap 5 Responsive Admin Dashboard</title>
</head>

<body>
<div id="app">
         <!-- Page Wrapper -->
         <div id="wrapper">
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
               <!-- Main Content -->
               <div id="content">
                  
                  <!-- Begin Page Content -->
                  <div class="container-fluid">
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
     



    <div class="d-flex" id="wrapper">
        <!------------------------------------- Sidebar start -------------------------------------------------->
        
        <div class="bg-dark" id="sidebar-wrapper" style="width: 340px;">

            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
                <i class="fas fa-clinic-medical me-2"></i>Health Care
            </div>

            <div class="sidebar-heading text-center py-1 primary-text fs-6 fw-bold text-uppercase border-bottom">
                 Admin
            </div>

            <ul class="list-group list-group-flush my-1">
                <li class="mb-1">
                    <a href="{{ url ('/dashboard')}}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                </li>
                <li class="mb-1">
                    <a href="{{ url ('/patients_info')}}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-info-circle me-2"></i>Patients Info</a>
                </li>
                <li class="mb-1">
                    <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-user-clock me-2"></i>Past Records</a>
                </li>
                <li class="mb-1">
                    <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-paperclip me-2"></i>Reports</a>
                </li>
                <li class="mb-1">
                    <a href="{{ url ('/prescribe')}}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-paste me-2"></i>Prescribe</a>
                </li>
                
                <li class="mb-1">
                    <button style="margin: 20px;" class="btn btn-toggle bg-transparent second-text fw-bold" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false"><i 
                        class="fas fa-pills me-2" ></i>Medicine &nbsp;<i class="fas fa-sort-down"></i>
                    </button>
                    <div class="collapse" id="account-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-bold pb-0 small">
                            <li><a href="{{ url ('medicine/create')}}" class="link-light rounded bg-transparent second-text fw-bold">Add New Medicine</a></li>
                            <li><a href="{{ url ('medicine/')}}" class="link-light rounded bg-transparent second-text fw-bold">Medicine List</a></li>
                        </ul>
                    </div>
                </li>


                <li class="mb-1">
                    <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-users-cog me-2"></i>Admin Settings</a>
                </li>
                <li class="border-top my-3"></li>

            </ul>
        </div>
      
        <!---------------------------------- sidebar end ------------------------------------------------------>

        
        <!---------------------------------- Top bar Start ---------------------------------------------------->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-4 text-light m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>Doctor
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
            @yield('content')
        </div>
       
        <!---------------------------------- Top bar end ---------------------------------------------------->
    </div>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>


 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
     $(document).ready(function ()
        {
            $('select').selectpicker();

        });
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>


<script>

$(document).ready(function(){
$("#myInput").on("keyup", function() {
var value = $(this).val().toLowerCase();
$("#medicine_table tr").filter(function() {
$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
});
});
});
</script>



<script>
        $(document).ready(function ()
        {
            $('select').selectpicker();

 
            var i = 1;
            var template = jQuery.validator.format($.trim($("#addChild").html()));
            $("#btnAdd").click(function (e)
            {
                $(template(i++)).appendTo("#employeeList");
                $('.netEmp').each(function ()
                {
                    $(this).rules("add", {
                        required: true
                    });
                });
                e.preventDefault();
            });

            $("#myForm").validate({
                rules: {
                    Name: "required"
                }
            });
    
        });
    </script>

    <script type="text/html" id="addChild">
     
    </script>		
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('js/app.js') }}"></script>
  @yield('footer')
<script>
    $(function() {
  $("form .repeatable-container").repeatable({
    template: "#people2"
  });
});
</script>
</body>

</html>