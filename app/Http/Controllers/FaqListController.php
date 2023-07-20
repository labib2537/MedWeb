<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\FaqList;
use Session;

class FaqListController extends Controller
{
  
    public function list(Request $req)
    {
        $faqs = FaqList::all();
        return view('admin.faq_list.list', compact('faqs'));
    }
    public function show(Request $req)
    {
        $faqs = FaqList::all();
        return view('user.faq_list.show', compact('faqs'));
    }
    public function insert(Request $req)
    {
        $faqs = new FaqList;
        $faqs->uuid = chr(rand(65, 90)) . Str::random(31);
        $faqs->question = $req->qus;
        $faqs->answer = $req->ans;
        $faqs->date = $req->date;
       
        $faqs->save();
        Session::flash('message', 'FAQ has been added Successfully');
        return redirect()->route('faq_list_list');
    }

    public function delete(Request $req){
        
 
        FaqList::find($req->id)->delete();
        
        Session::flash('message', 'FAQ has been deleted Successfully');
        return redirect()->route('faq_list_list');
    }

    public function edit(Request $req)
    {
        $editData = FaqList::find($req->id); 
        return view('admin.faq_list.edit', compact('editData'));
    }

    public function update(Request $req)
    {
        
        $faqs = FaqList::find($req->id);
        $faqs->uuid = $req->uuid;
        $faqs->question = $req->qus;
        $faqs->answer = $req->ans;
        $faqs->date = $req->date;
       
        $faqs->update();
        Session::flash('message', 'FAQ information is updated Successfully');
        return redirect()->route('faq_list_list');
    }

}
