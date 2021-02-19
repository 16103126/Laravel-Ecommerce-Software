<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VarificationController extends Controller
{
    public function verify($token)
    {
        $users=User::where('remember_token', $token)->first();
        if(!is_null($users)){
            $users->status=1;
            $users->remember_token=Null;
            $users->save();
            session()->flash('Success', 'You registered successfully !! Login Now');
            return redirect('login');
        }else{
            session()->flash('errors', ' Sorry !! Your token is not matched !!');
            return redirect('/'); 
        }
    }
}
