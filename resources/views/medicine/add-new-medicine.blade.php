@extends('dashboard_layout')
@section('content')
<div class="container">
        <br><br>
        <h3>Add New Medicine</h3>
        <span id="message_error"></span>
        <hr><br>
        <form action="{{ url('medicine') }}" method="post">
        {!! csrf_field() !!}
            <div class="col">
                <div class="row">
                    <div class="col">
                        <span class="input-group-text">Medicine Name</span>
                        <input type="text" class="form-control" name="medicine_name" placeholder="Name Here" aria-label="First name">
                    </div>
                    <div class="col">
                        <span class="input-group-text">Medicine Power</span>
                        <input type="text" class="form-control" name="medicine_power" placeholder="500..." aria-label="Last name">
                    </div>
                    
                    
                        
                </div>


                <br>


                <div class="row">
                    <div class="col">
                        <span class="input-group-text">Company</span>
                        <input type="text" class="form-control" name="company" placeholder="Which Company" aria-label="First name">
                    </div>
                    <div class="col">
                        <span class="input-group-text">Group</span>
                        <input type="text" class="form-control" name="group" placeholder="Which Group" aria-label="Last name">
                    </div>
                    
                    
                        
                </div>

                <br>
                <div class="row"> 

                    <!-- Date input -->
                    <div class="col">
                        <span class="input-group-text">Expire date</span>
                            <div class="input-group date" id="datepicker">
                                <input class="form-control" name="expire_date" type="date" placeholder="dd--mm--yy">
                            </div>
                    </div>

                    <div class="col">
                        <span class="input-group-text">Amount</span>
                        <input type="number" class="form-control" name="amount" placeholder="Enter a number" required type="number">
                    </div>
                
                </div>
                <br>

                <div class="d-grid gap-2 d-md-flex justify-content-md-center btn-sm">
                    <button class="btn btn-primary me-md-3" type="submit">Submit</button>
                   
                </div>
            </div>
        </form>    
</div>








@endsection