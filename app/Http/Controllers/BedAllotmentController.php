<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BedAllotment;
use Carbon\Carbon;
use Session;

class BedAllotmentController extends Controller
{
    public function list()
    {
        // $beds = BedAllotment::all();
        $beds = BedAllotment::orderBy('cabin_number', 'asc')->get();
        return view('admin.bed_allotment.list', compact('beds'));
    }

    public function listView()
    {
        // $beds = BedAllotment::all();
        $beds = BedAllotment::orderBy('cabin_number', 'asc')->get();
        return view('admin.bed_allotment.listView', compact('beds'));
    }

    public function insert(Request $req)
    {
         $bed = new BedAllotment;
         $bed->cabin_number = $req->number;
         $bed->cabin_type = $req->type;
        
         $bed->save();
         Session::flash('message', 'Cabin has been added Successfully');
         return redirect()->route('bed_list');
    }

    public function delete(Request $req)
    {
        $bed = BedAllotment::find($req->id);
        $bed->delete();
        Session::flash('message', 'Cabin has been Deleted Successfully');
         return redirect()->route('bed_listView');
    }

    public function edit(Request $req)
    {
        $bed = BedAllotment::find($req->id);
        // $beds = BedAllotment::orderBy('cabin_number', 'asc')->get();
        return view('admin.bed_allotment.edit', compact('bed'));
    }

    public function update(Request $req)
    {
         $bed = BedAllotment::find($req->id);
         $bed->cabin_number = $req->number;
         $bed->cabin_type = $req->type;
        
         $bed->update();
         Session::flash('message', 'Cabin has been updated Successfully');
         return redirect()->route('bed_listView');
    }

    // public function bedBook(Request $req)
    // {
    //      $bed = BedAllotment::find($req->id);
    //      if($req->status==0)
    //      {
    //         $bed->is_active = 1;
    //         $bed->change_status_at = Carbon::now();
    //      }
        
    //      $bed->update();
    //      Session::flash('message', 'Cabin has been booked Successfully');
    //      return redirect()->route('bed_listView');
    // }

}
