@extends('dashboard_layout')
@section('content')
<div class="container">
        <br><br>
        <h3>Edit Medicine</h3>
        <span id="message_error"></span>
        <hr><br>
        <form action="{{ url('medicine/' .$medicine->id ) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$medicine->id}}" id="id" />

            <div class="col">

                <div class="row">
                    <div class="col">
                        <span class="input-group-text">Medicine Name</span>
                        <input type="text" class="form-control" name="medicine_name" placeholder="Name Here" value="{{ $medicine->medicine_name }}" aria-label="First name">
                    </div>
                    <div class="col">
                        <span class="input-group-text">Medicine Power</span>
                        <input type="text" class="form-control" name="medicine_power" placeholder="500..." value="{{ $medicine->medicine_power }}" aria-label="Last name">
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col">
                        <span class="input-group-text">Company</span>
                        <input type="text" class="form-control" name="company" placeholder="Which Company" value="{{ $medicine->company }}" aria-label="First name">
                    </div>
                    <div class="col">
                        <span class="input-group-text">Group</span>
                        <input type="text" class="form-control" name="group" placeholder="Which Group" value="{{ $medicine->group }}" aria-label="Last name">
                    </div>
                </div>

                <br>

                <div class="row"> 
                    <!-- Date input -->
                    <div class="col">
                        <span class="input-group-text">Expire date</span>
                            <div class="input-group date" id="datepicker">
                                <input class="form-control" name="expire_date" type="text" value="{{ $medicine->expire_date }}" placeholder="mm/dd/yy">
                            </div>
                    </div>

                    <div class="col">
                        <span class="input-group-text">Amount</span>
                        <input type="text" class="form-control" name="amount" placeholder="Enter a number" value="{{ $medicine->amount }}" required type="number">
                    </div>
                
                </div>

                <br>

                <div class="d-grid gap-2 d-md-flex justify-content-md-center btn-sm">
                    <button class="btn btn-primary me-md-3" type="submit">Submit</button>
                    <!-- <input type="submit" value="Save" class="btn btn-success"></br> -->
                </div>

            </div>

        </form>    

    </div>

@endsection