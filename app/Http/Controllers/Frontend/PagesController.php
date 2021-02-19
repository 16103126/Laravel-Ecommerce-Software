<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Slider;

class PagesController extends Controller
{
    public function index()
    {
        $sliders=Slider::orderBy('priority','asc')->get();
        $products=Product::orderBy('id','desc')->paginate(9);
        return view('frontend.Pages.index', compact('products', 'sliders')); 
    }

    public function contact()
    {
        return view('frontend.Pages.contact'); 
    }

    public function search(Request $request)
    {
        $search=$request->search;
        $products=Product::orWhere('title','like','%'.$search.'%')
        ->orWhere('description','like','%'.$search.'%')
        ->orWhere('slug','like','%'.$search.'%')
        ->orWhere('price','like','%'.$search.'%')
        ->orWhere('quantity','like','%'.$search.'%')
        ->orWhere('id','desc')
        ->paginate(9);
        return view('frontend.pages.product.search', compact('search','products'));
    }
    
}
