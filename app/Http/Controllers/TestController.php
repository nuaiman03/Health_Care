<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
   
    public function index()
    {
        $test = Test::latest()->paginate(5);
        return view('test.test_list',with(compact('test')));
        
    }


    public function create()
    {
        return view('test.add_new_test');
    }

    

    public function store(Request $request)
    {
        $success=   Test::create($request->all());
        if($success){
            return redirect()->route('test.index')
            ->with('success','Test created successfully');
        }else{
            exit;
        }
    }

   


    public function show(Test $test)
    {
        $test = Test::latest()->paginate(5);
        return view('test.test_list',with(compact('test')));
    }

   


    public function edit($id)
    {
        $test = Test::find($id);
        return view('test.edit_test')->with('test', $test);
    }

  


    public function update(Request $request, Test $test)
    {
        $test->update($request->all());

        return redirect()->route('test.index')
            ->with('success','Test updated successfully');
    }

   


    public function destroy(Test $test)
    {
        $test->delete();

        return redirect()->route('test.index')
            ->with('success','Test delete successfully');
    }
}
