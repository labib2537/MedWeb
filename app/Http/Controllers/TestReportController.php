<?php

namespace App\Http\Controllers;
use App\Http\Requests\TestReportRequest;
use Illuminate\Http\Request;
use App\Models\MedicalTestAppointment;
use App\Models\TestReport;
use Illuminate\Support\Str;
use Session;

class TestReportController extends Controller
{
    public function list(){
        
        $reports = MedicalTestAppointment::all();
        return view('admin.Test_Report.list', compact('reports'));
    }

    public function listUser(){
        
        $reports = MedicalTestAppointment::where('user_id', auth()->user()->id )->orderBy('date', 'desc')->get();
        return view('user.test_report.list', compact('reports'));
    }
    public function show(Request $req)
    {
        $report = MedicalTestAppointment::find($req->id);
        return view('admin.Test_Report.show', compact('report'));
    }

    public function showUser(Request $req)
    {
        $report = MedicalTestAppointment::find($req->id);
        return view('user.test_report.show', compact('report'));
    }

    public function upload(Request $req)
    {
        $report = MedicalTestAppointment::find($req->id); 
        return view('admin.Test_Report.add', compact('report'));
    }
    public function insert(Request $req)
    {
        $report = MedicalTestAppointment::find($req->id);
      
        
        if($req->hasFile('pdf')){
            $file = $req->file('pdf');
            $filename = uniqid().'_'. $file->getClientOriginalName();
            $file->move('uploads/reports', $filename);
            $report->report_file = $filename;
        }
       
        $report->save();
        Session::flash('message', 'Test Report has been added Successfully');
        return redirect()->route('testReport_list');
    }

    public function edit(Request $req)
    {
        $editData = MedicalTestAppointment::find($req->id); 
        return view('admin.Test_Report.edit', compact('editData'));
    }

    public function update(Request $req)
    {
        $report = MedicalTestAppointment::find($req->id);

        // echo $report->report_file;
        // echo $req->newpdf;
        // die();
       
        if($req->hasFile('newpdf')){
            // $destination = 'uploads/reports/'.$req->oldpdf;
            $destination = public_path('uploads/reports/'.$req->oldpdf);
            if(file_exists($destination))
            {
                unlink($destination);
            }
            $file = $req->file('newpdf');
            $filename = uniqid().'_'. $file->getClientOriginalName();
            $file->move('uploads/reports', $filename);
            $report->report_file = $filename;
        }
        $report->update();
        Session::flash('message', 'Test Report has been updated Successfully');
        return redirect()->route('testReport_list');
    }

   

    public function delete(Request $req){
        
        $report = MedicalTestAppointment::find($req->id);
        if($report->report_file==null){
            $report->delete();
        }else{
            $path = public_path('uploads/reports/'.$report->report_file);
        
            if(file_exists($path)) {
              unlink($path);
            }
            $report->delete();
        }
       
       
        Session::flash('message', 'Test Report has been deleted Successfully');
        return redirect()->route('testReport_list');
    }
}