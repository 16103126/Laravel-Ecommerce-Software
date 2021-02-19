<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\Request;
use App\Models\Division;


class DivisionsController extends Controller
{
    public function index()
    {
        $divisions=Division::orderBy('priority', 'asc')->get();
        return view('backend.pages.divisions.index', compact('divisions'));
    }

    public function create()
    {
        return view('backend.pages.divisions.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'priority'=>'required'
        ],
        [
            'name.requried'=> 'Please provide a division name',
            'priority.requried'=> 'Please provide a division priority',  
        ]
    );

    $division=new Division();
    $division->name=$request->name;
    $division->priority=$request->priority;
    $division->save();

    session()->flash('success', 'A new division has added successfully !!');
    return redirect()->route('admin.divisions');

    }

    public function edit($id)
    {
        $division=Division::find($id);
        if(!is_null($division)){
            return view('backend.pages.divisions.edit', compact('division'));
        }else{
            return redirect()->route('admin.divisions');
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=>'required',
            'priority'=>'required'
        ],
        [
            'name.requried'=> 'Please provide a division name',
            'priority.requried'=> 'Please provide a division priority',  
        ]
    );

    $division=new Division();
    $division->name=$request->name;
    $division->priority=$request->priority;
    $division->save();

    session()->flash('success', 'A new division has updated successfully !!');
    return redirect()->route('admin.divisions');

    }

    public function delete($id)
    {
        $division=Division::find($id);
        if(!is_null($division)){
            $districts=District::where('division_id', $division->id)->get();
            foreach($districts as $district ){
                $district->delete();
            }
            $division->delete();
        }
        session()->flash('success', 'Division has deleted successfully !!');
        return back();
    }
    
    
}
