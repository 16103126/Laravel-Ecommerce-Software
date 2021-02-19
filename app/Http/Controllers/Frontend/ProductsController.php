<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $products=Product::orderBy('id','desc')->paginate(9);
        return view('frontend.Pages.product.index')->with('products', $products); 
    }

    /**public function show($slug)
    {
        $product=Product::where('slug','$slug')->first();
        if(!is_null($product)){
            return view('frontend.pages.product.show', compact('product'));
        }else{
            session()->flash('errors','sorry!! There is no product by this URL..');
            return redirect()->route('products');
        }
        
    }**/

    public function show($id)
    {
        //$product=Product::where('slug','$slug')->first();
        $product=Product::find($id);
       
        //$product=Product::orderBy('id','desc')->first();
        if(!is_null($product)){
            return view('frontend.pages.product.show', compact('product'));
            //return view('frontend.Pages.product.show', compact('product')); 
        }else{
            session()->flash('errors','sorry!! There is no product by this URL..');
            return redirect()->route('products');
        }

         
    } 


}
