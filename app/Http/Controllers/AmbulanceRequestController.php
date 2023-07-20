<?php

namespace App\Http\Controllers;
use App\Models\AmbulanceRequest;
use Illuminate\Http\Request;
use Session;

class AmbulanceRequestController extends Controller
{
    public function list()
    {
        $requests = AmbulanceRequest::all();
        return view('admin.ambulance.reqlist', compact('requests'));
    }
    public function insert(Request $req)
    {
        $reqAmbu = new AmbulanceRequest;
        $reqAmbu->user_id = auth()->user()->id;
        $reqAmbu->name = $req->name;
        $reqAmbu->address = $req->address;
        $reqAmbu->phone = $req->phone;
        $reqAmbu->message = $req->message;
        $reqAmbu->save();
        Session::flash('message', 'Ambulance Request has been sent Successfully');
        return redirect()->route('ambulance_show_user');
    }

    public function show()
    {
        $requests = AmbulanceRequest::where('user_id', auth()->user()->id )->get();;
        return view('user.ambulance.show', compact('requests'));
        
    }

    public function accept(Request $req)
    {
        $reqAmbu = AmbulanceRequest::find($req->id);
        
        if($req->status==0)
        {
            $reqAmbu->is_active=1;
        }
        $reqAmbu->update();
        Session::flash('message', 'Ambulance Request has been accepted Successfully');
        return redirect()->route('ambulance_req');
    }
    public function reject(Request $req)
    {
        $reqAmbu = AmbulanceRequest::find($req->id);
        if($req->status==0)
        {
            $reqAmbu->is_reject=1;
        }
        $reqAmbu->update();
        Session::flash('message', 'Ambulance Request has been rejected Successfully');
        return redirect()->route('ambulance_req');
    }

    public function cancel(Request $req)
    {
        $request = AmbulanceRequest::find($req->id);
        $request->delete();
        Session::flash('message', 'Ambulance Request has been deleted Successfully');
        return redirect()->route('ambulance_show_user');
    }
}
