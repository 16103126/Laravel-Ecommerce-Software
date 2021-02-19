<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Image;
use File;

class SlidersController extends Controller
{
    public function index()
    {
        $sliders=Slider::orderBy('priority', 'asc')->get();
        return view('backend.pages.sliders.index', compact('sliders'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'image'=>'required|image',
            'button_link'=>'nullable|url',
            'priority'=>'required'
        ],
        [
            'title.requried'=> 'Please provide a slider title',
            'image.required'=>'Please provide a slider image',
            'image.image'=>'Please provide a valid slider image',
            'button_link.url'=>'Please provide a slider url',
            'priority.requried'=> 'Please provide a slider priority',  
        ]
    );

    $slider=new Slider();
    $slider->title=$request->title;

    if($request->image > 0){
        $image = $request->file('image');
        $img=time().'.'.$image->getClientOriginalExtension();
        $location=public_path('images/sliders/'.$img);
        Image::make($image)->save($location);
        $slider->image=$img;

    }


    $slider->button_text=$request->button_text;
    $slider->button_link=$request->button_link;
    $slider->priority=$request->priority;
    $slider->save();

    session()->flash('success', 'A new slider has added successfully !!');
    return redirect()->route('admin.sliders');

    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=>'required',
            'image'=>'nullable|image',
            'button_link'=>'nullable|url',
            'priority'=>'required'
        ],
        [
            'title.requried'=> 'Please provide a slider title',
            'image.image'=>'Please provide a valid slider image',
            'button_link.url'=>'Please provide a slider url',
            'priority.requried'=> 'Please provide a slider priority',   
        ]
    );

    $slider=Slider::find($id);
    $slider->title=$request->title;

     //if (count($request->image)>0){

        if(File::exists('images/sliders/.$slider->image')){
            File::delete('images/sliders/.$slider->image');
        }
                       
            $image = $request->file('image');
            $img=time().'.'.$image->getClientOriginalExtension();
            $location=public_path('images/sliders/'.$img);
            Image::make($image)->save($location);
            $slider->image=$img;
               
        //}

    $slider->button_text=$request->button_text;
    $slider->button_link=$request->button_link;
    $slider->priority=$request->priority;
    $slider->save();

    session()->flash('success', 'A Slider has updated successfully !!');
    return redirect()->route('admin.sliders');

    }

    public function delete($id)
    {
        $slider=Slider::find($id);
        if(!is_null($slider)){
                    
            //delete image
            if(File::exists('images/sliders/.$sub->image')){
                File::delete('images/sliders/.$sub->image');
        }
        $slider->delete();
    }
   session()->flash('success', 'slider has delete successfully !!');
   return back();
  }
    
}
