<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

use Auth;

class CartsController extends Controller
{
   

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
            ->first();
        }else{
            $cart=Cart::orWhere('user_id', Auth::id())
            ->Where('product_id', $request->product_id)
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
        return json_encode(['status'=> 'success', 'message'=>'Item added to cart', 'totalItems' =>Cart::totalItems()]);
    }
    


}
