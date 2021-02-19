<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use Auth;
use Illuminate\Http\Request;

class CheckoutsController extends Controller
{
    public function index()
    {
        $payments=Payment::orderBy('priority','asc')->get();
        return view('frontend.pages.checkouts', compact('payments'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'phone_no'=>'required',
            'shipping_address'=>'required',
            'payment_method_id'=>'required'
        ]);

        if ($request->payment_method_id != 'cash_id')
        {
            if($request->transaction_id==NULL || empty ($request->transaction_id))
            {
            session()->flash('sticky-error', 'Please give transaction id for your payment');
            return back();
            }
        }

        $order=new Order();
        $order->name=$request->name;
        $order->message=$request->message;
        $order->phone_no=$request->phone_no;
        $order->shipping_address=$request->shipping_address;
        $order->email=$request->email;
        $order->transaction_id=$request->transaction_id;
        $order->ip_address= request()->ip();
    
        if(Auth::check()){
            $order->user_id=Auth::id();
        }

        $order->payment_id=Payment::where('short_name', $request->payment_method_id)->first()->id;
        $order->save();

        foreach (Cart::totalCarts() as $cart)
        {
            $cart->order_id=$order->id;
            $cart->save();
        }
        session()->flash('success','Your order is taken successfully !! Please wait for admin conformation');
        return redirect()->route('index');

    }

}
