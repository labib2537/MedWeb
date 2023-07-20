<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Session;

class PatientController extends Controller
{
    //fetch data
    public function list(){
        
        $patients = Patient::all();
        return view('admin.patient.list', compact('patients'));
    }
    //insert data
    public function insert(Request $req)
    {
        $patient = new Patient;
        $patient->uuid = Str::uuid();
        $patient->patient_name = $req->name;
        $patient->age = $req->age;
        $patient->address = $req->address;
        $patient->phone = $req->phone;
        $patient->date = $req->date;
        $patient->room = $req->room;
        $patient->bill = '';
        $patient->paid_bill = '';
        $patient->due_bill = '';
        $patient->status = 'Admitted';
        $patient->status_color = 'badge-success';
       
        $patient->save();
        Session::flash('message', 'Patient has been added Successfully');
        return redirect()->route('patient_list');
    }
    //edit data
    public function edit(Request $req)
    {
        $editData = Patient::find($req->id); 
        return view('admin.patient.edit', compact('editData'));
    }
    //update data
    public function update(Request $req)
    {
        $patient = Patient::find($req->id);
        $patient->uuid = $req->uuid;
        $patient->patient_name = $req->name;
        $patient->age = $req->age;
        $patient->address = $req->address;
        $patient->phone = $req->phone;
        $patient->date = $req->date;
        $patient->room = $req->room;
        $patient->bill =  eval("return $req->bill;");
        $patient->paid_bill = eval("return $req->paid;");
        $patient->due_bill = strval(intval(eval("return $req->bill;")) - intval(eval("return $req->paid;")));
        $patient->status = $req->status;
        $patient->status_color = $req->color;
       
        $patient->update();
        Session::flash('message', 'Patient information has been updated Successfully');
        return redirect()->route('patient_list');
    }
    //update status badge
    public function updateStatus(Request $req)
    {
        $patient = Patient::find($req->id);
        if($patient->status=='Admitted' && $patient->status_color=='badge-success')
        {
            $patient->status_color = 'badge-secondary';
            $patient->status = 'Discharged';
        }
        $patient->update();
        Session::flash('message', 'Patient status is updated Successfully');
        return redirect()->route('patient_list');
    }
    //delete data
    public function delete(Request $req){
        Patient::find($req->id)->delete();
        Session::flash('message', 'patient has been deleted Successfully');
        return redirect()->route('patient_list');
    }
}
