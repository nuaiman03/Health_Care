@extends('dashboard_layout')

@section('content')
<div class="container"> 
<br>
    <h3>Medicine List</h3>
    <hr>
<form method="post" action="{{ route('prescription.store') }}">
<div>
         <div class="card shadow mb-7">
               <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Drugs form</h6>
               </div>
               
               <div class="card-body">

                  <!-- Row 1 -->
                  <div class="row">
                     <div class="col-md-2">
                        <div class="form-group-custom">
                           <input type="text" class="form-control" name="type[]" id="task_{?}" placeholder="Type" class="ui-autocomplete-input" autocomplete="off">
                           <label class="control-label"></label><i class="bar"></i>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <select class="selectpicker"  data-live-search="true">                           
                           <option value="">Select Drug...</option>
                           @foreach($drugs as $drug)
                                 <option value="{{ $drug->id }}">{{ $drug->trade_name }}</option>
                           @endforeach
                           
                        </select>
                     </div>

                     <div class="col-md-4">
                        <div class="form-group-custom">
                           <input type="text" id="strength" name="strength[]"  class="form-control" placeholder="Mg/Ml">
                        </div>
                     </div>


                     <!-- Row 2 -->
                     <div class="col-md-6">
                        <div class="form-group-custom">
                           <input type="text" id="dose" name="dose[]" class="form-control" placeholder="{{ __('sentence.Dose') }}">
                           <label class="control-label"></label><i class="bar"></i>
                        </div>
                     </div>

                     <div class="col-md-6">
                        <div class="form-group-custom">
                           <input type="text" id="duration" name="duration[]" class="form-control" placeholder="{{ __('sentence.Duration') }}">
                        </div>
                     </div>

                     <!-- Row 3 -->
                     <div class="col-md-6">
                        <div class="form-group-custom">
                           <input type="text" id="drug_advice" name="drug_advice[]" class="form-control" placeholder="Advice_Comment">
                        </div>
                     </div>
                  
                  </div>
               </div>
                  
         </div>
      </div>
   <div class="repeatable-container"></div>
   <div class="row">
      <div class="col">
         @if ($errors->any())
         <div class="alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
         @endif
         @if (session('success'))
         <div class="alert alert-success">
            {{ session('success') }}
         </div>
         @endif
      </div>
   </div>
   <div class="row justify-content-center">
     
      
      

      <fieldset class="people2">
         <div class="form-group">
            <a type="button" class="btn btn-success add text-white" align="center"><i class='fa fa-plus'></i>&nbsp; Add Drug</a>
         </div>
      </fieldset>

         
            
        
         <div class="card shadow mb-4">
            <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">{{ __('sentence.Tests list') }}</h6>
            </div>
            <div class="card-body">
               <fieldset class="test_labels">
                  <div class="repeatable"></div>
                  <div class="form-group">
                     <a type="button" class="btn btn-success add text-white" align="center"><i class='fa fa-plus'></i> {{ __('sentence.Add Test') }}</a>
                  </div>
               </fieldset>
            </div>
         </div>
      </div>
   </div>
</form>
</div>

@endsection

@section('footer')

<script type="text/template" id="people2">
   <div class="field-group">
      <section>

         <!-- Row 1 -->
         

         <div class="card shadow mb-4">
            <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">Drugs form</h6>
            </div>
            <div class="card-body">
            <div class="row">
            <div class="col-md-2">
                  <div class="form-group-custom">
                     <input type="text" class="form-control" name="type[]" id="task_{?}" placeholder="Type" class="ui-autocomplete-input" autocomplete="off">
                     <label class="control-label"></label><i class="bar"></i>
                  </div>
            </div>
            <div class="col-md-6">
            <select class="selectpicker"  data-live-search="true">                           
                           <option value="">Select Drug...</option>
                           @foreach($drugs as $drug)
                                 <option value="{{ $drug->id }}">{{ $drug->trade_name }}</option>
                           @endforeach
                           
                        </select>
                     </div>
            <div class="col-md-4">
                  <div class="form-group-custom">
                     <input type="text" id="strength" name="strength[]"  class="form-control" placeholder="Mg/Ml">
                  </div>
            </div>
      

         <!-- Row 2 -->
             <div class="col-md-6">
               <div class="form-group-custom">
                  <input type="text" id="dose" name="dose[]" class="form-control" placeholder="{{ __('sentence.Dose') }}">
                  <label class="control-label"></label><i class="bar"></i>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group-custom">
                  <input type="text" id="duration" name="duration[]" class="form-control" placeholder="{{ __('sentence.Duration') }}">
               </div>
            </div>
 
         <!-- Row 3 -->
             <div class="col-md-6">
               <div class="form-group-custom">
                  <input type="text" id="drug_advice" name="drug_advice[]" class="form-control" placeholder="Advice_Comment">
               </div>
            </div>
            <div class="col-md-6">
               <div class="col-md-3">
                  <a type="button" class="btn btn-danger btn-sm text-white span-2 delete"><i class="fa fa-times-circle"></i>&nbsp Remove</a>
               </div>
            </div>
            </div>
            </div>
            
         </div>


         
      </section>
   </div>

</script>
 

@endsection