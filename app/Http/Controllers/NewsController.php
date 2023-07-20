<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Session;

class NewsController extends Controller
{
    public function list(){
        $news = News::all();
        return view('admin.news.list', compact('news'));
    }
    public function insert(Request $req)
    {
        $news = new News;
        $news->uuid = chr(rand(65, 90)) . Str::random(31);
        $news->name = $req->title;
        $news->heading = $req->head;
        $news->paragraph = $req->content;
        $news->post_time = $req->date;
        if($req->hasFile('src')){
            $file = $req->file('src');
            $filename = uniqid(). $file->getClientOriginalName();
            $file->move('uploads/images/news', $filename);
            $news->src = $filename;
            $news->alt = $filename;
        }
        $news->save();
        Session::flash('message', 'News has been added Successfully');
        return redirect()->route('news_list');
    }


    public function delete(Request $req){
        $news = News::find($req->id);
        $image_path = public_path('uploads/images/news/'.$news->src);
        if(file_exists($image_path)) {
          unlink($image_path);
        }
        $news->delete();
        Session::flash('message', 'News has been deleted Successfully');
        return redirect()->route('news_list');
    }

    public function show(Request $req)
    {
        $anews = News::find($req->id);
        return view('admin.news.show', compact('anews'));
    }
    public function edit(Request $req)
    {
        $edit = News::find($req->id);
        return view('admin.news.edit', compact('edit'));
    }
    public function update(Request $req)
    {
        
        $news = News::find($req->id);
        $news->uuid = $req->uuid;
        $news->name = $req->title;
        $news->heading = $req->head;
        $news->paragraph = $req->content;
        $news->post_time = $req->date;
        if($req->hasFile('newimage')){
            $destination = public_path('uploads/images/news/'.$req->oldimage);
            if(file_exists($destination))
            {
                unlink($destination);
            }
            $file = $req->file('newimage');
            $filename = uniqid(). $file->getClientOriginalName();
            $file->move('uploads/images/news', $filename);
            $news->src = $filename;
            $news->alt = $filename;
        }
        $news->update();
        Session::flash('message', 'News information has been updated Successfully');
        return redirect()->route('news_list');
    }

   

    public function updateStatus(Request $req)
    {
        
        $news = News::find($req->id);
        if($req->status==1)
        {
            $news->is_active = 0;
            $news->change_status_at = Carbon::now();
        }
        else{
            $news->is_active = 1;
            $news->change_status_at = Carbon::now();
        }
        
        $news->update();
        Session::flash('message', 'News Status is updated Successfully');
        return redirect()->route('news_list');
    }
}
