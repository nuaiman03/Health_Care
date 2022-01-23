<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    //view page
    public function index()
    {
        return view('form');
    }

    public function destroy($id){

        Prescription::destroy($id);
        return Redirect::route('prescription.all')->with('success', 'Prescription Deleted Successfully!');;

    }
}
