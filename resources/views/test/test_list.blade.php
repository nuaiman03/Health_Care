@extends('dashboard_layout')
@section('content')
<div class="container"> 
    <br><br>
    <h3>Test List</h3>
    <span id="message_error"></span>
    <hr><br>
    <div class="input-group mb-3" style="text-align: right;width:30%">
    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
        <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
    </div>
        <div class="col">
            <table id="test_table">
                <tr>
                    <th scope="col" width="30">#</th>
                    <th>Test Iteam Name</th>
                    <th>Details</th>
                </tr>
                @php
                $i = 0;
                @endphp
                @foreach ($test as $test)
                <tr>

                    <td>{{ ++$i }}</td>
                    <td>{{ $test->test_name }}</td>
                    <td>{{ $test->comment }}</td>
                    <td>
 
                        <a href="{{ url('/test/' . $test->id . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                         <form method="POST" action="{{ url('/test' . '/' . $test->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Contact" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>

                    </td>
                
                </tr>
                @endforeach
            </table>

          
            
        </div>
</div>




@endsection