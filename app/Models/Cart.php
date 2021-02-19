<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Cart extends Model
{
    public $fillable=[
        'user_id',
        'product_id',
        'order_id',
        'ip_address',
        'product_quantity',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Total item in the cart model
     * @return integer total cart
     */

    public static function totalCarts()
    {
        if(Auth::check())
        {
            $carts=Cart::Where('user_id', Auth::id())
            ->Where('order_id', NULL)
            ->get();
        }else{
            $carts=Cart::Where('ip_address', request()->ip())->Where('order_id', NULL)->get();
        }
        
        return $carts;
    }

    /**
     * Total item in the cart 
     * @return integer total item
     */

    public static function totalItems()
    {
        if(Auth::check())
        {
            $carts=Cart::Where('user_id', Auth::id())
            ->Where('order_id', NULL)
            ->get();
        }else{
            $carts=Cart::Where('ip_address', request()->ip())->Where('order_id', NULL)->get();
        }
        $total_item=0;
        foreach($carts as $cart){
            $total_item+=$cart->product_quantity;
        }
        return $total_item;
    }
 

}
