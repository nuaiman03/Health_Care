<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
   
    public function index()
    {
        $medicine = Medicine::latest()->paginate(5);
        return view('medicine.medicine-list',with(compact('medicine')));
        
    }


    public function create()
    {
        return view('medicine.add-new-medicine');
    }

    

    public function store(Request $request)
    {   
      $success=   Medicine::create($request->all());
        if($success){

            return redirect()->route('medicine.index')
            ->with('success','Medicine created successfully');
        }else{
            exit;
        }
    }

   


    public function show(Medicine $medicine)
    {
        $medicine = Medicine::latest()->paginate(5);
        $myname = "fahim";
        return view('medicine.medicine-list',with(compact('medicine')));
        // return view('medicine.show',compact('medicine'));
    }

   


    public function edit($id)
    {
        $medicine = Medicine::find($id);
        return view('medicine.edit-medicine')->with('medicine', $medicine);
    }

  


    public function update(Request $request, Medicine $medicine)
    {
        $medicine->update($request->all());

        return redirect()->route('medicine.index')
            ->with('success','Medicine updated successfully');
    }

   


    public function destroy(Medicine $medicine)
    {
        $medicine->delete();

        return redirect()->route('medicine.index')
            ->with('success','Medicine delete successfully');
    }
}
