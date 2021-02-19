<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

use Auth;

class CartsController extends Controller
{
    public function index()
    {
        return view('frontend.pages.carts');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'product_id'=>'required'
        ],
        [
            'product_id.required'=> 'Please give a product'
        ]);

        if(Auth::check()){
            $cart=Cart::orWhere('user_id', Auth::id())
            ->Where('product_id', $request->product_id)
            ->where('order_id', Null)
            ->first();
        }else{
            $cart=Cart::orWhere('user_id', Auth::id())
            ->Where('product_id', $request->product_id)
            ->where('order_id', Null)
            ->first();
 }

        if(!is_null($cart)){
            $cart->increment('product_quantity');
        }else{
            $cart=new Cart();
        if (Auth::check()){
            $cart->user_id=Auth::id();
        }
        $cart->ip_address=$request->ip();
        $cart->product_id=$request->product_id;
        $cart->save();

        }
        
        session()->flash('success','Product has added to cart !!');
        return back();
    }


    public function update(Request $request, $id)
    {
        $cart=Cart::find($id);
        if (!is_null($cart)){
            $cart->product_quantity=$request->product_quantity;
            $cart->save();
        }else{
            return redirect()->route('carts');
        }
        session()->flash('success', 'Cart item has updated successfully !!');
        return back();
    }

    public function delete($id)
    {
        $cart = Cart::find($id);
        if(!is_null($cart)){
            $cart->delete();
        }else{
            return redirect()->route('carts');
        }

        session()->flash('success', 'Cart item has deleted !!');
        return back();

    }
}
