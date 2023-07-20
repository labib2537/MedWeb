<?php
namespace App\Http\Controllers;

use App\Http\Requests\SliderRequest;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Session;

class SliderController extends Controller
{
    public function list(){
        $sliders = Slider::all();
        return view('admin.slider.list', compact('sliders'));
    }
    public function insert(SliderRequest $req)
    {
        $slider = new Slider;
        $slider->uuid = Str::uuid();
        $slider->name = $req->name;
        $slider->heading = $req->heading;
        $slider->paragraph = $req->paragraph;
        if($req->hasFile('src')){
            $file = $req->file('src');
            $filename = uniqid(). $file->getClientOriginalName();
            $file->move('uploads/images/sliders', $filename);
            $slider->src = $filename;
            $slider->alt = $filename;
        }
        $slider->save();
        Session::flash('message', 'Slider has been added Successfully');
        return redirect()->route('slider_list');
    }
    public function delete(Request $req){
        $slider = Slider::find($req->id);
        $slider->delete();
        Session::flash('message', 'Slider has been Moved to Trash Successfully');
        return redirect()->route('slider_list');
    }
    public function permanent_delete(Request $req){
        $slider = Slider::withTrashed()->find($req->id);
        $image_path = public_path('uploads/images/sliders/'.$slider->src);
        if(file_exists($image_path)) {
          unlink($image_path);
        }
        Slider::withTrashed()
        ->where('id',$req->id)
        ->forceDelete();
        Session::flash('message', 'Slider has been deleted permanently Successfully');
        return redirect()->route('slider_list');
    }
    public function show(Request $req)
    {
        $slider = Slider::find($req->id);
        return view('admin.slider.show', compact('slider'));
    }
    public function edit(Request $req)
    {
        $slide = Slider::find($req->id);
        return view('admin.slider.edit', compact('slide'));
    }
    public function update(Request $req)
    {
        
        $slider = Slider::find($req->id);
        $slider->uuid = $req->uuid;
        $slider->name = $req->name;
        $slider->heading = $req->heading;
        $slider->paragraph = $req->paragraph;
        if($req->hasFile('newimage')){
            $destination = public_path('uploads/images/sliders/'.$req->oldimage);
            if(file_exists($destination))
            {
                unlink($destination);
            }
            $file = $req->file('newimage');
            $filename = uniqid(). $file->getClientOriginalName();
            $file->move('uploads/images/sliders', $filename);
            $slider->src = $filename;
            $slider->alt = $filename;
        }
        $slider->update();
        Session::flash('message', 'Slider information has been updated Successfully');
        return redirect()->route('slider_list');
    }

    public function updateStatus(Request $req)
    {
        $slider = Slider::find($req->id);
        if($req->status==1)
        {
            $slider->is_active = 0;
            $slider->change_status_at = Carbon::now();
        }
        else{
            $slider->is_active = 1;
            $slider->change_status_at = Carbon::now();
        }
        $slider->update();
        Session::flash('message', 'Slider Status is updated Successfully');
        return redirect()->route('slider_list');
    }
    public function trash(Request $req)
    {
        $sliders = Slider::onlyTrashed()->get();
        // dd('hello');
        return view('admin.slider.trash', compact('sliders'));
    }
    public function restore(Request $req)
    {
        Slider::withTrashed()
        ->where('id',$req->id)
        ->restore();
        Session::flash('message', 'Slider Restored Successfully');
        return redirect()->route('slider_list');
    }
}