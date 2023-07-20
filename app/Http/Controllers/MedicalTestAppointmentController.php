<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalTestAppointment;
use Session;

class MedicalTestAppointmentController extends Controller
{

    public function list()
    {
        $Medappoints = MedicalTestAppointment::all();
        return view('admin.medical_test.appointList', compact('Medappoints'));
    }


    public function insert(Request $req)
    {
        $medicalAppoint = new MedicalTestAppointment();
        $medicalAppoint->user_id = auth()->user()->id;
        $medicalAppoint->patient_name = $req->patient_name;
        $medicalAppoint->test_name = $req->test_name;
        $medicalAppoint->type = $req->type;
        $medicalAppoint->cost = $req->cost;
        $medicalAppoint->phone = $req->phone;
        $medicalAppoint->gender = $req->gender;
        $medicalAppoint->city = $req->city;
        $medicalAppoint->state = $req->state;
        $medicalAppoint->zip = $req->zip;
        $medicalAppoint->date = $req->date;
     
        $medicalAppoint->save();
        Session::flash('message', "Your medical test appointment has been sent successfully");
        return redirect()->route('medical_appointment_show');
    }
    public function show()
    {
        $appoints = MedicalTestAppointment::where('user_id', auth()->user()->id )->orderBy('date', 'desc')->get();
        return view('user.medical_test.show', compact('appoints'));
        
    }
    

    public function cancel(Request $req)
    {
        $appoint = MedicalTestAppointment::find($req->id);
    
        $appoint->delete();
        Session::flash('message', 'Medical Appointment has been Canceled Successfully');
        return redirect()->route('medical_appointment_show');
    }
}
