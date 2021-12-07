<?php

namespace App\Http\Controllers;
use App\Models\Medicine;

use App\Models\Prescribe;
use Illuminate\Http\Request;

class PrescribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicine = Medicine::get();
        return view('prescription.prescribe',with(compact('medicine')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
            $drugs = Drug::all();
            $patients = User::where('role','patient')->get();
            $tests = Test::all();
            return view('prescription.create',['drugs' => $drugs, 'patients' => $patients, 'tests' => $tests]);
        }
    
    public function store(Request $request){
    
                 $validatedData = $request->validate([
                    'patient_id' => ['required','exists:users,id'],
                    'type.*' => 'required',
                    'strength.*' => 'required',
                    'dose.*' => 'required',
                    'duration.*' => 'required',
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
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prescribe  $prescribe
     * @return \Illuminate\Http\Response
     */
    public function show(Prescribe $prescribe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prescribe  $prescribe
     * @return \Illuminate\Http\Response
     */
    public function edit(Prescribe $prescribe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prescribe  $prescribe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prescribe $prescribe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prescribe  $prescribe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prescribe $prescribe)
    {
        //
    }
}
