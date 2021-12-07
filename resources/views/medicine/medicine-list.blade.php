@extends('dashboard_layout')
@section('content')
<div class="container"> 
    <br><br>
    <h3>Medicine List</h3>
    <span id="message_error"></span>
    <hr><br>
    <div class="input-group mb-3" style="text-align: right;width:30%">
    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
        <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
    </div>
        <div class="col">
            <table id="medicine_table">
                <tr>
                    <th scope="col" width="30">#</th>
                    <th>Medicine</th>
                    <th>Power</th>
                    <th>Company</th>
                    <th>Group</th>
                    <th>Amount</th>
                    <th>Expire</th>
                    <th>Created Date</th>
                    <th>Action</th>
                </tr>
                @php
                $i = 0;
                @endphp
                @foreach ($medicine as $medicine)
                <tr>

                    <td>{{ ++$i }}</td>
                    <td>{{ $medicine->medicine_name }}</td>
                    <td>{{ $medicine->medicine_power }}</td>
                    <td>{{ $medicine->company }}</td>
                    <td>{{ $medicine->group }}</td>
                    <td>{{ $medicine->amount }}</td>
                    <td>{{ $medicine->expire_date }}</td>
                    <td>{{ $medicine->created_at }}</td>
                    <td>
 
                        <a href="{{ url('/medicine/' . $medicine->id . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                         <form method="POST" action="{{ url('/medicine' . '/' . $medicine->id) }}" accept-charset="UTF-8" style="display:inline">
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