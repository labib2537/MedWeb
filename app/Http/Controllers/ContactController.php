<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;
use App\Models\Contact;
use Session;

class ContactController extends Controller
{
    public function list(){
        
        $messages = Contact::all();
        return view('admin.contact.list', compact('messages'));
    }
  
    public function insert(Request $req)
    {
        $contact = new Contact();
        $contact->uuid = Str::uuid();
        $contact->name = $req->name;
        $contact->email = $req->email;
        $contact->phone = $req->phone;
        $contact->message = $req->message;
      
       
        $contact->save();
        Session::flash('message', 'Message has been sent Successfully');
        return redirect('/#contact');
    }

    public function delete(Request $req){
        Contact::find($req->id)->delete();
        Session::flash('message', 'Contact has been deleted Successfully');
        return redirect()->route('contact_list');
    }
}
