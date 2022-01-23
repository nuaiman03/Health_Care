@extends('dashboard_layout')
@section('content')
<div class="container">
        <br><br>
        <h3>Edit Test</h3>
        <span id="message_error"></span>
        <hr><br>
        <form action="{{ url('test/' .$test->id ) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$test->id}}" id="id" />

            <div class="col">

                <div class="row">
                    <div class="col">
                        <span class="input-group-text bg-dark text-light">Test Iteam Name</span>
                        <input type="text" class="form-control" name="test_name" placeholder="Name Here..." value="{{ $test->test_name }}" aria-label="First name">
                    </div>
                    <div class="col">
                        <span class="input-group-text bg-dark text-light">Details</span>
                        <input type="text" class="form-control" name="comment" placeholder="......" value="{{ $test->comment }}" aria-label="Last name">
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