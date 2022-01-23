@extends('dashboard_layout')
@section('content')
<div class="container">
         <br>
         <h3>Create Prescription </h3>
         <span id="message_error"></span>
         <hr>
         <div class="row">
              <div class="col-md-8">

            <!-- ////////////////////////////  Student or other Selection Option  //////////////////////////////////// -->

            <select class="input-group-text bg-dark text-light w-25 p-2 border-info"  id="mySelect" onchange="myFunction()">
               <option value="">Select</option>
               <option value="St">Student</option>
               <option value="Ot">Other</option>
            </select>
            

            
            <div id="studentform" style="display:none;">
            <br>
               <div class="col">
                  <table class="table table-striped">
                     <thead class="table-dark">
                        <tr text-align="center">
                           <th>Student ID</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr> 
                           <td style="width:50%"> 
                              <input type="text" class="form-control" id="stdId" name="stdId" placeholder="Enter Student ID" aria-label="stdId"> 
                           </td> 

                           <td>
                              <button id="historybutton" class="btn btn-sm btn-success">Get History</button>
                           </td>
                        </tr>
                     </tbody> 
                  </table>
                  
               </div>
            </div>
            
            <form action="{{ url('submitData') }}" id="validate" method="post">
            @csrf 
         
            <div id="othersform" style="display:none;">
            <br>
                  <div class="row">
                    <div class="col">
                        <span class="input-group-text bg-dark text-light">Name</span>
                        <input type="text" value="" class="form-control" placeholder="Name Here" aria-label="name">
                    </div>
                    <div class="col">
                        <span class="input-group-text bg-dark text-light">Age</span>
                        <input type="text" class="form-control" name="age" placeholder="1-90" aria-label="age">
                    </div>
                  </div>
            </div>
            <br>
          
             <!-- /////////////////////////////////////////  Drug Form  ///////////////////////////////////////////////// -->
            <input type="hidden"  value="" class="form-control" id="name" name="name" aria-label="name">
            <input type="hidden"  value="" class="form-control" id="age" name="age" aria-label="age">
            <input type="hidden"  value="" class="form-control" id="faculty" name="faculty" aria-label="faculty">
            <input type="hidden"  value="" class="form-control" id="studentid" name="studentid"  aria-label="stdId"> 
 
            <!-- Start Table   -->
            <table id="emptbl" class="table table-striped">

               <!-- Table Header -->
               <thead class="table-dark">
                  <tr>
                     <th>Medicine Name</th>
                     <th>Feeding Rules</th>
                     <th>Feed Days</th> 
                     <th><button type="button" class="btn btn-success" onclick="addRows()"><i class='fa fa-plus'></i></button></th>
                  </tr>
               </thead>
               
                
               <!-- Table Body -->
               <tbody>
                  <tr> 
                     <td id="col0"> 
                           <input class="form-control" list="datalistOptions" name="medicine_name[]"  placeholder="Type to search..." required>
                              <datalist id="datalistOptions">
                                 @foreach($drugs as $drug)
                                    <option value="{{ $drug->trade_name }}"> 
                                 @endforeach
                              </datalist>  
                     </td> 

                     <td id="col1"> 
                        <input class="form-control" list="datalist" name="feeding_rules[]" placeholder="Type to asd..."  required>
                           <datalist id="datalist">
                              <option value="After 1+1+1"> 
                              <option value="After 1+1+0"> 
                              <option value="After 0+1+1"> 
                              <option value="After 1+0+1"> 
                              <option value="After 0+0+1"> 
                              <option value="After 1+0+0"> 
                              <option value="After 0+1+0">
                              <option value="Before 1+1+1"> 
                              <option value="Before 1+1+0"> 
                              <option value="Before 0+1+1"> 
                              <option value="Before 1+0+1"> 
                              <option value="Before 0+0+1"> 
                              <option value="Before 1+0+0"> 
                              <option value="Before 0+1+0">  
                           </datalist>  
                     </td> 

                     <td id="col2" style="width:40%"> 
                        <div class="row">
                           <div class="col">
                              <input class="form-control" type="number" name="feed_days[]" placeholder="Enter a number" required>
                           </div>  

                           <div class="col">
                              <select class="form-control select2 select2-hidden-accessible" name="trade_name[]" tabindex="-1" aria-hidden="true" required>                           
                                 <option>--Select--</option>
                                 <option>Day</option>
                                 <option>Week</option>
                                 <option>Month</option>
                              </select>
                           </div>
                        </div>
                     </td> 

                     <td id="col3">
                              <button type="button" class="btn btn-sm btn-danger" onclick="deleteRows(this)" id="btn"><i class="fas fa-trash-alt"></i></button>
                     </td>
                  </tr>
               </tbody>  
            </table> 
            <!-- End Table -->
            <br>


            <!-- /////////////////////////////////////////Test Form///////////////////////////////////////////////// -->

            <!-- Start Test Table   -->
            <table id="emptbl1" class="table table-striped">
               <!-- Table Header -->
               <thead class="table-dark" style="width:20%">
                  <tr>
                     <th>Test Form</th>
                  </tr>
               </thead>

               <!-- Table Body -->
               <tbody>
                  <tr> 
                     <td id="col100"> 
                           <select class="form-control"  data-live-search="true" name="test">                           
                              <option value="">Select Test ...</option>
                                 @foreach($tests as $test)
                                    <option value="{{ $test->test_name }}">{{ $test->test_name }}</option>
                                 @endforeach
                           </select>   
                     </td> 
                  </tr>
               </tbody>  
            </table>
            <!-- Save Button -->
            <button type="submit" class="btn btn-sm btn-success">Save</button>
         
              </div>

            <!-- //////////////////////////////////////////////Patient Details///////////////////////////////// -->
            <div class="col-md-4" id="detailsid">
            <h3 align="center">Patient Details</h3>
               <div class="card" style="width: 20rem;"><br>
                  <div style="text-align:center">
                  <img src="/images/user.png" class="card-img-top" alt="..." class="center" style="width:40%"> 

                  </div>
                  <br>
                  <div id="history">

                  </div>

                     
                  <h6 class="card-header" align="center"><b>History</b></h6>
      
                  <div id="history2" class="card-header">

                  </div>
               </div>
            </div>
            </form>
         </div>
        
</div>


<!-- /////////////////////////////////////////////// Script Section //////////////////////////////////////////////////////////////// -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Student or Others select section -->
   <script>
$("#historybutton").click(function(){   // var id = $(this).serialize();
   var id = document.getElementById("stdId").value;
   
      $.ajax({
       url: 'get_student_history' ,
       type: "GET",
       data: {id:id} ,
       datatype:"json",
       success: function (response) {
      
         const  data = JSON.parse(response);
             for (let i = 0; i < data.student_infos.length; i++) {

 
      document.getElementById("history").innerHTML = "<table><tr><th>Name</th><td>"+data.student_infos[i].name + "</td></tr><tr><th>Age</th><td>"+data.student_infos[i].age+"</td></tr><tr><th>Faculty</th><td>"+data.student_infos[i].faculty+"</td></tr></table>";
      document.getElementById("name").value= data.student_infos[i].name;
      document.getElementById("age").value= data.student_infos[i].age;
      document.getElementById("faculty").value= data.student_infos[i].faculty;
      document.getElementById("studentid").value= id;     
     

}

             for (let i = 0; i < data.prescription_infos.length; i++) {

 
      document.getElementById("history2").innerHTML = "<table><tr><th>Date Time</th><td>"+data.prescription_infos[i].created_at+"</td></tr></table>";
      document.getElementById("created_at").value= data.prescription_infos[i].created_at;
     
}



       },
       error: function(jqXHR, textStatus, errorThrown) {
          console.log(textStatus, errorThrown);
       }
   });})
   /* Get from elements values */


      function myFunction() {
      var x = document.getElementById("mySelect").value;
      var studentform = document.getElementById("studentform");
      var othersform = document.getElementById("othersform");

      if(x=="St"){
         studentform.style.display = "block";
         othersform.style.display = "none";
      }else if(x=="Ot"){
         othersform.style.display = "block";
         studentform.style.display = "none";
      }
      }
   </script>


   <!-- Add Rows & Delete Rows Script section -->
   <script>
        function addRows()
        { 
            var table = document.getElementById('emptbl');
            var rowCount = table.rows.length;
            var row = "";

            var cellCount = table.rows[0].cells.length; 
            row = table.insertRow(1);
            for(var i =0; i <= cellCount; i++)
            {
               var cell = 'cell'+i;
               cell = row.insertCell(i);
               var copycel = document.getElementById('col'+i).innerHTML;
               cell.innerHTML=copycel;   
            }
       
        }

        function deleteRows(btn)
        {
 
            var table = document.getElementById('emptbl');
            var rowCount = table.rows.length;
            if(rowCount > '2')
            {
                var row = btn.parentNode.parentNode;
                    row.parentNode.removeChild(row);
            
            }else{
                alert('There should be atleast one row');
            }

        }
   </script>

   <!-- alert blink text -->
   <script>
        function blink_text()
        {
            $('#message_error').fadeOut(700);
            $('#message_error').fadeIn(700);
        }
        setInterval(blink_text,1000);
   </script>

   <!-- script validate form -->
   <script>
        $('#validate').validate({
            reles: {
                'empname[]': {
                    required: true,
                },
                'phone[]': {
                    required:true,
                },
                'department[]': {
                    required:true,
                },
            },
            messages: {
                'empname[]' : "Please input file*",
                'phone[]' : "Please input file*",
                'department[]' : "Please input file*",
            },
        });
   </script>
    
@endsection