@extends('dashboard_layout')
@section('content')
<div class="container">
        <h3>Form Basic</h3>
        <span id="message_error"></span>
        <hr>
        <form id="validate" method="post">
            @csrf 

<!-- /////////////////////////////////////////Drug Form///////////////////////////////////////////////// -->

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
                            <input class="form-control" list="datalistOptions"   placeholder="Type to search...">
                                <datalist id="datalistOptions">
                                    @foreach($drugs as $drug)
                                        <option value="{{ $drug->trade_name }}"> 
                                    @endforeach
                                </datalist>  
                        </td> 

                        <td id="col1"> 
                            <input class="form-control" list="datalist"   placeholder="Type to asd...">
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
                                    <input type="number" class="form-control" name="amount" placeholder="Enter a number" required type="number">
                                </div>  

                                <div class="col">
                                    <select class="form-control select2 select2-hidden-accessible" name="trade_name[]" id="drug" tabindex="-1" aria-hidden="true">                           
                                        <option>--Select--</option>
                                        <option>Day</option>
                                        <option>Week</option>
                                        <option>Month</option>
                                    </select>
                                </div>
                            </div>
                        </td> 

                        <td id="col3">
                                <button type="button" class="btn btn-sm btn-danger" onclick="deleteRows(this)"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                </tbody>  
            </table> 
            <!-- End Table -->
<br>


<!-- /////////////////////////////////////////Test Form///////////////////////////////////////////////// -->

            <!-- Start Table   -->
            <table id="emptbl" class="table table-striped">
                <!-- Table Header -->
                <thead class="table-dark" style="width:20%">
                    <tr>
                        <th>Test Form</th>
                    </tr>
                </thead>

                <!-- Table Body -->
                <tbody>
                    <tr> 
                        <td id="col0"> 
                            <select class="form-control"  data-live-search="true">                           
                            <option value="">Select Drug...</option>
                            @foreach($drugs as $drug)
                                    <option value="{{ $drug->id }}">{{ $drug->trade_name }}</option>
                            @endforeach
                            </select>   
                        </td> 
                    </tr>
                </tbody>  
            </table>
            <!-- Save Button -->
            <button type="submit" class="btn btn-sm btn-success">Save</button>
          
        </form>
    </div>

    <script>
        function addRows()
        { 
            var table = document.getElementById('emptbl');
            var rowCount = table.rows.length;
            var cellCount = table.rows[0].cells.length; 
            var row = table.insertRow(rowCount);
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