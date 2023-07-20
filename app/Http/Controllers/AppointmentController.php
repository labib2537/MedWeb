<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Session;

class AppointmentController extends Controller
{
    public function reqlist()
    {
        $appoints = Appointment::all();
        return view('admin.appointment.reqlist', compact('appoints'));
    }

    public function list()
    {
        $appoints = Appointment::all();
        return view('admin.appointment.list', compact('appoints'));
    }
    public function insert(Request $req)
    {
        $appoint = new Appointment;
        $appoint->uuid = Str::uuid();
        $appoint->user_id = auth()->user()->id;
        $appoint->doctor_id = $req->doc_id;
        $appoint->patient_name = $req->patient_name;
        $appoint->doctor_name = $req->doctor_name;
        $appoint->specialist = $req->specialist;
        $appoint->phone = $req->phone;
        $appoint->gender = $req->gender;
        $appoint->city = $req->city;
        $appoint->state = $req->state;
        $appoint->zip = $req->zip;
        $appoint->date = $req->date;
        $appoint->time = $req->time;

        $startTime =  strtotime($req->start);
        $endTime = strtotime($req->end);
        $selectTime = strtotime($req->time);

        $day = date("l", strtotime($req->date));
        $practiceDays = json_decode($req->available);

        if(in_array($day, $practiceDays))
        {
            if($startTime <= $selectTime && $selectTime < $endTime)
            {
                $appoint->save();
                Session::flash('message', 'Appointment request has been sent Successfully');
                return redirect()->route('doctor_list_user');
            }
            else{
                Session::flash('error', 'Sorry, Doctor is not available in your selected time. Please check the doctor time schedule');
                return redirect()->route('doctor_list_user');
            }
        }
        else{
            Session::flash('error', 'Sorry, Doctor is not available in your selected date. Please check the doctor time schedule');
            return redirect()->route('doctor_list_user');
        }
       
        
    }
    
   
    public function setTime(Request $req)
    {
        $appoints = Appointment::find($req->id);
        if($req->status==0)
        {
            $appoints->is_active = 1;
        }
       
        $appoints->update();
        Session::flash('message', 'Patient Appointment status is updated Successfully');
        return redirect()->route('appointment_req');
    }

    public function delete(Request $req)
    {
        $appoints = Appointment::find($req->id);
        if($appoints->delete==0)
        {
            $appoints->delete = 1;
        }
       
        $appoints->update();
        Session::flash('message', 'Data has been deleted Successfully');
        return redirect()->route('appointment_req');
    }

    public function cancel(Request $req)
    {
        $appoint = Appointment::find($req->id);
    
        $appoint->delete();
        Session::flash('message', 'Appointment has been Canceled Successfully');
        return redirect()->route('appointment_show');
    }

    public function edit(Request $req)
    {
        $setTime = Appointment::find($req->id);
        return view('admin.appointment.edit', compact('setTime'));
    }

    public function update(Request $req)
    {
        $appoints = Appointment::find($req->id);
        $appoints->set_appoint_time = $req->time;
        $appoints->update();
        Session::flash('message', 'Appointment time has been updated Successfully');
        return redirect()->route('appointment_list');
    }

    public function show()
    {
        $appoints = Appointment::where('user_id', auth()->user()->id )->orderBy('date', 'desc')->get();
        return view('user.appointment.show', compact('appoints'));
        
    }

    public function getTimeSlots(Request $request)
    {
        
    }
    

    
}