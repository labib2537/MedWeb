<?php

namespace App\Http\Controllers;
use App\Http\Requests\DoctorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Doctor;
use Carbon\Carbon;
use Session;

class DoctorController extends Controller
{
    public function list(){
        
        $doctors = Doctor::all();
        return view('admin.doctor.list', compact('doctors'));
    }
    public function show(Request $req)
    {
        $doctor = Doctor::find($req->id);
        return view('admin.doctor.show', compact('doctor'));
    }

    public function add(Request $req)
    {
        $doctor = Doctor::find($req->id);
        return view('user.appointment.add', compact('doctor'));
    }

    public function list2(){
        
        $doctors = Doctor::all();
        return view('user.doctor.list', compact('doctors'));
    }
    public function show2(Request $req)
    {
        $doctor = Doctor::find($req->id);
        return view('user.doctor.show', compact('doctor'));
    }

    public function insert(DoctorRequest $req)
    {
        $doctordb = new Doctor;
        $doctordb->uuid = Str::uuid();
        $doctordb->name = $req->name;
        $doctordb->specialist = $req->specialist;
        $doctordb->email = $req->email;
        $doctordb->Experiences_Summary = $req->Experiences_Summary;
        $doctordb->start_time = $req->start_time;
        $doctordb->end_time = $req->end_time;
        $doctordb->practice_days = $req->input('practice_days', []);
        if($req->hasFile('image')){
            $file = $req->file('image');
            $filename = uniqid(). $file->getClientOriginalName();
            $file->move('uploads/images/doctors', $filename);
            $doctordb->image = $filename;
        }
        $doctordb->save();
        Session::flash('message', 'Doctor has been added Successfully');
        return redirect()->route('doctor_list');
    }

    public function edit(Request $req)
    {
        $editData = Doctor::find($req->id); 
        return view('admin.doctor.edit', compact('editData'));
    }

    public function update(Request $req)
    {
        
        $doctordb = Doctor::find($req->id);
        $doctordb->uuid = $req->uuid;
        $doctordb->name = $req->name;
        $doctordb->specialist = $req->specialist;
        $doctordb->email = $req->email;
        $doctordb->Experiences_Summary = $req->Experiences_Summary;
        $doctordb->start_time = $req->start_time;
        $doctordb->end_time = $req->end_time;
        $doctordb->practice_days = $req->input('practice_days', []);
        if($req->hasFile('newimage')){
            $destination = 'uploads/images/doctors/'.$req->oldimage;
            if(file_exists($destination))
            {
                unlink($destination);
            }
            $file = $req->file('newimage');
            $filename = uniqid(). $file->getClientOriginalName();
            $file->move('uploads/images/doctors', $filename);
            $doctordb->image = $filename;
        }
        $doctordb->update();
        Session::flash('message', 'Doctor information has been updated Successfully');
        return redirect()->route('doctor_list');
    }

    public function delete(Request $req){
        
 
        Doctor::find($req->id)->delete();
        
        $image_path = public_path('uploads/images/doctors/'.$req->image);
        if(file_exists($image_path)) {
          unlink($image_path);
        }
        Session::flash('message', 'Data has been deleted Successfully');
        return redirect()->route('doctor_list');
    }

    public function search(Request $req){
        
 
        $search = $req->search;
        $doctors = Doctor::where('name','like','%'.$search.'%')->orWhere('specialist','like','%'.$search.'%')->get();
        return view('admin.doctor.list', compact('doctors'));
    }

    public function search2(Request $req){
        
 
        $search = $req->search;
        $doctors = Doctor::where('name','like','%'.$search.'%')->orWhere('specialist','like','%'.$search.'%')->get();
        return view('user.doctor.list', compact('doctors'));
    }


    


     

     



       
    
}