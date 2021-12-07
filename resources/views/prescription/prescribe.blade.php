@extends('dashboard_layout')
@section('content')
 
<form method="post" >
   <div class="row">
      <div class="col">
  
   </div>
   <div class="row justify-content-center">
      <div class="col-md-4">
         <div class="card shadow mb-4">
            <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
 
         </div>
      </div>
      <div class="col-md-8">
         <div class="card shadow mb-4">
            <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary"> </h6>
            </div>
            <div class="card-body">
               <fieldset class="todos_labels">
                  <div class="repeatable"></div>
                  <div class="form-group">
                     <a type="button" class="btn btn-success add text-white" align="center"><i class='fa fa-plus'></i> asdasddfs</a>
                  </div>
               </fieldset>
            </div>
         </div>
         <div class="card shadow mb-4">
            <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">asdfasf</h6>
            </div>
            <div class="card-body">
               <fieldset class="test_labels">
                  <div class="repeatable"></div>
                  <div class="form-group">
                     <a type="button" class="btn btn-success add text-white" align="center"><i class='fa fa-plus'></i> test</a>
                  </div>
               </fieldset>
            </div>
         </div>
      </div>
   </div>
</form>
  
 
@endsection

