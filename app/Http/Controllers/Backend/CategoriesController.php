<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Image;
use File;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories=Category::orderBy('id','desc')->get();
        return view('backend.pages.categories.index', compact('categories'));
    }

    public function create()
    {
        $main_categories=Category::orderBy('name','desc')->where('parent_id', NULL)->get();
        return view('backend.pages.categories.create', compact('main_categories'));
    }

    public function store( Request $request)
    {
         $this->validate($request,[
            'name'=>'required',
            'image'=>'nullable|image',

        ],
        [
            'name.required'=>'Please provide a category name',
            'image.image'=>'Please provide a valid image with .jpg, .png, .gif, .jpeg extension',
        ]);

        $category=new Category();
        $category->name=$request->name;
        $category->description=$request->description;
        $category->parent_id=$request->parent_id;

        //if (count($request->image)>0){
                           
                $image = $request->file('image');
                $img=time().'.'.$image->getClientOriginalExtension();
                $location=public_path('images/categories/'.$img);
                Image::make($image)->save($location);
                $category->image=$img;
                   
            //}

        $category->save();
        
        session()->flash('success', 'A new category has added successfully!!');
        return redirect()->route('admin.categories');
    }

    public function edit($id)
    {
        $main_categories=Category::orderBy('name','desc')->where('parent_id', NULL)->get();
        $category=Category::find($id);
        if(!is_null($category)){
            return view('backend.pages.categories.edit', compact('category','main_categories'));
        }else{
            return redirect()->route('admin.categories');
        }

    }

    public function update(Request $request, $id)
    {
         $this->validate($request,[
            'name'=>'required',
            'image'=>'nullable|image',

        ],
        [
            'name.required'=>'Please provide a category name',
            'image.image'=>'Please provide a valid image with .jpg, .png, .gif, .jpeg extension',
        ]);

        $category=Category::find($id);
        $category->name=$request->name;
        $category->description=$request->description;
        $category->parent_id=$request->parent_id;

    if (($request->image)>0){

            if(File::exists('images/categories/.$category->image')){
                File::delete('images/categories/.$category->image');
            }
                           
                $image = $request->file('image');
                $img=time().'.'.$image->getClientOriginalExtension();
                $location=public_path('images/categories/'.$img);
                Image::make($image)->save($location);
                $category->image=$img;
                   
            }
            
            
        $category->save();
        
        session()->flash('success', 'A new category has updated successfully!!');
        return redirect()->route('admin.categories');
    }

    public function delete($id)
    {
        $category=Category::find($id);
        if(!is_null($category))
        {
            //if it is parent categoy, then delete all its sub category
            if($category->parent_id==NULL){
                //delete sub categories
                $sub_categories=Category::orderBy('name','desc')->where('parent_id',$category->id)->get();
                foreach($sub_categories as $sub){
                    //delete category image
                    if(File::exists('images/categories/.$sub->image')){
                        File::delete('images/categories/.$sub->image');
                    }
                    $sub->delete();
                }
            }
            //delete image
            if(File::exists('images/categories/.$sub->image')){
                File::delete('images/categories/.$sub->image');
        }
        $category->delete();
   }  
   session()->flash('success', 'product has delete successfully !!');
   return back();
  }
} 

