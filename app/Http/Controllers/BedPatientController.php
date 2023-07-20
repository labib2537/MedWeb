<?php

namespace App\Http\Controllers;
use App\Models\BedAllotment;
use App\Models\BedPatient;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class BedPatientController extends Controller
{
    public function list()
    {
        $beds = BedPatient::with('cabin')->orderBy('created_at', 'asc')->get();
        return view('admin.bed_patient.list', compact('beds'));
    }
    public function viewForm(Request $req)
    {
        $bed = BedAllotment::find($req->id);
        return view('admin.bed_patient.add', compact('bed'));
    }
    public function insert(Request $req)
    {
        $patient = new BedPatient;
        $patient->patient_name = $req->name;
        $patient->cabin_id = $req->bed_id;
        $patient->age = $req->age;
        $patient->phone = $req->phone;
        $patient->address = $req->add;
        $patient->date = $req->date;
        $patient->room = $req->room;
        $patient->save();

        $bed = BedAllotment::find($req->bed_id);
        $bed->is_active = 1;
        $bed->change_status_at = Carbon::now();
        $bed->save();

        Session::flash('message', 'Cabin has been booked Successfully');
        return redirect()->route('bed_patient_list');
    }

    public function discharged(Request $req)
    {
        $patient = BedPatient::find($req->p_id);
        if($patient->is_discharged==0)
        {
            $patient->is_discharged = 1;
        }
       
        
        $patient->save();

        $bed = BedAllotment::find($req->id);
        if($req->status==1)
        {
            $bed->is_active = 0;
            $bed->change_status_at = Carbon::now();
        }
      
        $bed->update();

        Session::flash('message', 'Patient has been discharged Successfully');
        return redirect()->route('bed_patient_list');
    }

    public function edit(Request $req)
    {
        $edit = BedPatient::find($req->id);
        return view('admin.bed_patient.edit', compact('edit'));
    }

    public function update(Request $req)
    {
        $patient = BedPatient::find($req->id);
        $patient->patient_name = $req->name;
        $patient->age = $req->age;
        $patient->phone = $req->phone;
        $patient->address = $req->add;
        $patient->date = $req->date;
        $patient->update();

        Session::flash('message', 'Cabin information has been updated Successfully');
        return redirect()->route('bed_patient_list');
    }
}
