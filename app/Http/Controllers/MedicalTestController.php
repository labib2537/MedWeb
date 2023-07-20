<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalTest;
use Session;
class MedicalTestController extends Controller
{
    public function list()
    {
        $tests = MedicalTest::all();
        return view('admin.medical_test.list', compact('tests'));
    }
    public function listUser()
    {
        $tests = MedicalTest::all();
        return view('user.medical_test.list', compact('tests'));
    }

    public function appointAdd(Request $req)
    {
        $test = MedicalTest::find($req->id);
        return view('user.medical_test.add', compact('test'));
    }

    public function insert(Request $req)
    {
        $test = new MedicalTest();
        $test->name = $req->name;
        $test->type = $req->type;
        $test->cost = $req->cost;
        $test->place = $req->place;
        $test->time = $req->time;
        if($req->hasFile('image'))
        {
            $file = $req->file('image');
            $filename = uniqid(). $file->getClientOriginalName();
            $file->move('uploads/images/medical_tests', $filename);
            $test->image = $filename;
        }
        $test->save();
        Session::flash('message', 'New Medical Test has been Added Successfully');
        return redirect()->route('medical_test_list');        
    }

    public function edit(Request $req)
    {
        $editdata = MedicalTest::find($req->id);
        return view('admin.medical_test.edit', compact('editdata'));
    }

    public function update(Request $req)
    {
        $test = MedicalTest::find($req->id);
        $test->name = $req->name;
        $test->type = $req->type;
        $test->cost = $req->cost;
        $test->place = $req->place;
        $test->time = $req->time;
        if($req->hasFile('newimage'))
        {
            $destination = public_path('uploads/images/medical_tests/'.$req->oldimage);
            if(file_exists($destination))
            {
                unlink($destination);
            }
            $file = $req->file('newimage');
            $filename = uniqid(). $file->getClientOriginalName();
            $file->move('uploads/images/medical_tests', $filename);
            $test->image = $filename;
        }
        $test->update();
        Session::flash('message', 'Medical Test information has been updated Successfully');
        return redirect()->route('medical_test_list');        
    }

    public function delete(Request $req){
        
 
        $test = MedicalTest::find($req->id);
        
        $image_path = public_path('uploads/images/medical_tests/'.$test->image);
        if(file_exists($image_path)) {
          unlink($image_path);
        }
        $test->delete();
        Session::flash('message', 'Data has been deleted Successfully');
        return redirect()->route('medical_test_list');
    }

    public function search(Request $req){
        
 
        $search = $req->search;
        $tests = MedicalTest::where('name','like','%'.$search.'%')->orWhere('type','like','%'.$search.'%')->get();
        return view('admin.medical_test.list', compact('tests'));
    }
    public function search2(Request $req){
        
 
        $search = $req->search;
        $tests = MedicalTest::where('name','like','%'.$search.'%')->orWhere('type','like','%'.$search.'%')->get();
        return view('user.medical_test.list', compact('tests'));
    }
}
