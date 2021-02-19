<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $user=Auth::user();
        return view('frontend.pages.users.dashboard', compact('user'));
    }

    public function userprofile()
    {
        $divisions=Division::orderBy('priority','asc')->get();
        $districts=District::orderBy('name','asc')->get();
        $user=Auth::user();
        return view('frontend.pages.users.profile', compact('user', 'divisions', 'districts'));

    }

    public function profileupdate(Request $request)
    {
        $user=Auth::user();
        $this->validate($request, [
            'first_name' => ['required', 'string', 'max:30'],
            'last_name' => ['nullable', 'string', 'max:30'],
            'email' => ['required', 'alpha_dash', 'email', 'max:255', 'unique:users', 'username', $user->id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'email', $user->id],
            'division_id' => ['required', 'numeric'],
            'district_id' => ['required', 'numeric'],
            'phone_no' => ['required', 'max:255', 'unique:users', 'phone_no', $user->id],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'street_address'=>['required','max:100'],
        ]);
        
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->username=$request->username;
        $user->email=$request->email;
        $user->division_id=$request->division_id;
        $user->district_id=$request->district_id;
        $user->phone_no=$request->phone_no;
        $user->street_address=$request->street_address;
        $user->shipping_address=$request->shipping_address;
        $user->ip_address=$request->ip();
        if($request->password !=NULL || $request->password !=""){
            $user->password=Hash::make($request->password);
        }
        $user->save();
        session()->flash('success', 'User Profile has update successfuly !!');
        return back();

    }
}
