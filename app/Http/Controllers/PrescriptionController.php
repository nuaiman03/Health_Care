<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Drug;
use App\Student_info;
use App\User;
use App\Patient;
use App\Prescription;
use App\Prescription_drug;
use App\Prescription_test;
use App\Test;
use App\Models\Prescription_info;
use Redirect;
use PDF;
use Illuminate\Support\Facades\DB;

class PrescriptionController extends Controller{
    

    public function submitData(Request $req){
        // return $req->all();
        $prescription_info= new Prescription_info;
        $prescription_info->std_id=$req->studentid;
        $prescription_info->name=$req->name;
        $prescription_info->age=$req->age;
        $prescription_info->faculty=$req->faculty;
        $prescription_info->medicine_name= implode(",",$req->medicine_name);
        $prescription_info->feeding_rules= implode(",",$req->feeding_rules);
        $prescription_info->feed_days= implode(",",$req->feed_days);
        $prescription_info->time= implode(",",$req->trade_name);
        $prescription_info->test=$req->test;
       
        $prescription_info->save();
        return back()->with('success','Data added success fully');

    }

    public function create(){
    	$drugs = Drug::all();
        $patients = User::where('role','patient')->get();
        $tests = Test::all();
    	return view('prescription.create',['drugs' => $drugs, 'patients' => $patients, 'tests' => $tests]);
    }
    
    public function get_student_history(Request $request){
        $id = $request->id; 
        $student_infos = DB::table('student_infos')->where('id',$id)->get(); // it will get the entire table
        $prescription_infos = DB::table('prescription_infos')->where('std_id',$id)->get(); // it will get the entire table
        $data = array();
        $data['student_infos'] = $student_infos;
        $data['prescription_infos'] = $prescription_infos;
        return json_encode($data);
    }

    public function patients_info(){
    	$drugs = Drug::all();
        $patients = User::where('role','patient')->get();
        $tests = Test::all();
    	return view('patients_info',['drugs' => $drugs, 'patients' => $patients, 'tests' => $tests]);
    }
    
    public function store(Request $request){


	    	 $validatedData = $request->validate([
                'medicine_name.*' => 'required',
	        	'feeding_rules.*' => 'required',
                'feed_days.*' => 'required',
	        	'trade_name.*' => 'required',
	    	]);

            

    	$prescription = new Prescription;

        $prescription->user_id = $request->patient_id;
        $prescription->reference = 'p'.rand(10000,99999);

        $prescription->save();

     
    if(isset($request->type)):
  	   	$i = count($request->type);

  	   	for ($x = 0; $x < $i; $x++) {
		  
		  echo $request->trade_name[$x];

		  

            $add_drug = new Prescription_drug;

            $add_drug->type = $request->type[$x];
            $add_drug->strength = $request->strength[$x];
            $add_drug->dose = $request->dose[$x];
            $add_drug->duration = $request->duration[$x];
            $add_drug->drug_advice = $request->drug_advice[$x];
            $add_drug->prescription_id = $prescription->id;
            $add_drug->drug_id = $request->trade_name[$x];

            $add_drug->save();
        }
    endif;

    if(isset($request->test_name)):

        $y = count($request->test_name);

        for ($x = 0; $x < $y; $x++) {

            $add_test = new Prescription_test;

            $add_test->test_id = $request->test_name[$x];
            $add_test->prescription_id = $prescription->id;
            $add_test->description = $request->description[$x];

            $add_test->save();

		}

    endif;

		return Redirect::route('prescription.all')->with('success', 'Prescription Created Successfully!');;



    }

    public function all(){
    	$prescriptions = Prescription::all();
    	return view('prescription.all',['prescriptions' => $prescriptions]);
    }

    public function view($id){

    	$prescription = Prescription::findOrfail($id);
        $prescription_drugs = Prescription_drug::where('prescription_id' ,$id)->get();
        $prescription_tests = Prescription_test::where('prescription_id' ,$id)->get();
    	
    	return view('prescription.view',['prescription' => $prescription, 'prescription_drugs' => $prescription_drugs, 'prescription_tests' => $prescription_tests]);
    }

    public function pdf($id){
    	
    	$prescription = Prescription::find($id);
    	$prescription_drugs = Prescription_drug::where('prescription_id' ,$id)->get();
    	
    	 view()->share(['prescription' => $prescription, 'prescription_drugs' => $prescription_drugs]);
      $pdf = PDF::loadView('prescription.pdf_view', ['prescription' => $prescription, 'prescription_drugs' => $prescription_drugs]);

      // download PDF file with download method
      return $pdf->download($prescription->User->name.'_pdf.pdf');
    }


    public function destroy($id){

        Prescription::destroy($id);
        return Redirect::route('prescription.all')->with('success', 'Prescription Deleted Successfully!');;

    }
}
