<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

use Image;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
     
    public function index()
    {
        $products=Product::orderBy('id','desc')->get();
        return view('backend.pages.product.index')->with('products', $products);
    }

    public function create()
    {
        return view ('backend.pages.product.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:250',
            'price'=> 'required|numeric',
            'quantity'=> 'required|numeric',
            'description'=>'required',
            'category_id'=> 'required|numeric',
            'brand_id'=> 'required|numeric'
        ]);

        $product=new Product();
        $product->title=$request->title;
        $product->description=$request->description;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->slug= str::slug('$product->title');
        $product->category_id=$request->category_id;
        $product->brand_id=$request->brand_id;
        $product->admin_id=1;
        $product->save();

        //ProductImage model insert image
       

        if (count($request->product_image)>0)
    {
        //if($request->hasFile('product_image'))
        //{
            foreach($request->product_image as $image)
            {
               //insert that image
            //$image = $request->file('product_image');
            $img=time().'.'.$image->getClientOriginalExtension();
            $location=public_path('images/products/'.$img);
            Image::make($image)->save($location);

            $product_image=new ProductImage;
            $product_image->product_id=$product->id;
            $product_image->image=$img;
            $product_image->save();
            }
            
        }

    //}

    return redirect()->route('admin.product.create');
       
    }

    public function edit($id)
    {
        $product= Product::find($id);  
        return view('backend.pages.product.edit')->with('product', $product);
    
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:250',
            'price'=> 'required|numeric',
            'quantity'=> 'required|numeric',
            'description'=>'required',
            'category_id'=> 'required|numeric',
            'brand_id'=> 'required|numeric'
        ]);

        $product=Product::find($id);
        $product->title=$request->title;
        $product->description=$request->description;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->category_id=$request->category_id;
        $product->brand_id=$request->brand_id;
        $product->save();
        session()->flash('success', 'Product has update successfully!!');
        return redirect()->route('admin.products');
            
    }

    public function delete($id)
    {
        $product=Product::find($id);
        if(!is_null($product)){
            $product->delete();
        }
        session()->flash('success', 'Product has deleted successfully!!');
        
        return back();
    }

}
