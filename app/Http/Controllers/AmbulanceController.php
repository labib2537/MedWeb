<?php

namespace App\Http\Controllers;
use App\Models\Ambulance;
use Illuminate\Http\Request;
use Session;

class AmbulanceController extends Controller
{
    public function list()
    {
        $ambulances = Ambulance::all();
        return view('admin.ambulance.list', compact('ambulances'));
    }

    public function insert(Request $req)
    {
        $ambulance = new Ambulance;
        $ambulance->driver_name = $req->name;
        $ambulance->ambulance_number = $req->number;
        $ambulance->location = $req->location;
        $ambulance->phone = $req->phone;
        $ambulance->save();
        Session::flash('message', 'Ambulance has been added successfully');
        return redirect()->route('ambulance_list');
    }

    public function delete(Request $req)
    {
        $ambulance = Ambulance::find($req->id);
        $ambulance->delete();
        Session::flash('message', 'Ambulance has been deleted successfully');
        return redirect()->route('ambulance_list');
    }

    public function edit(Request $req)
    {
        $ambu = Ambulance::find($req->id);
        return view('admin.ambulance.edit', compact('ambu'));
    }

    
    public function update(Request $req)
    {
        $ambulance = Ambulance::find($req->id);
        $ambulance->driver_name = $req->name;
        $ambulance->ambulance_number = $req->number;
        $ambulance->location = $req->location;
        $ambulance->phone = $req->phone;
        $ambulance->update();
        Session::flash('message', 'Ambulance has been updated successfully');
        return redirect()->route('ambulance_list');
    }

    public function updateStatus(Request $req)
    {
        $ambulance = Ambulance::find($req->id);
        if($req->status==1)
        {
            $ambulance->is_active = 0;
        }else{
            $ambulance->is_active = 1;
        }
        $ambulance->update();
        Session::flash('message', 'Ambulance status has been updated successfully');
        return redirect()->route('ambulance_list');
    }
}
