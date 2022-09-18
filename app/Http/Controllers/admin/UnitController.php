<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::latest()->paginate(5);
        return view('admin.unit.index', compact('units'));
    }

    public function create()
    {
        return view('admin.unit.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'title'=>'required',
            'description'=>'required'
        ]);
        Unit::insert([
            'name'=>$request->name,
            'title'=>$request->title,
            'description'=>$request->description,
            'created_at'=>Carbon::now()
        ]);
        Session::flash('message', 'Unit Data Uploaded Successfully');
        return redirect()->route('unit.index');
    }

    
    public function edit(Unit $unit)
    {
        $unit['units'] = $unit;
        return view('admin.unit.edit', compact('unit'));
    }

   
    public function update(Request $request, $id)
    {
        Unit::find($id)->update([
            'name'=>$request->name,
            'title'=>$request->title,
            'description'=>$request->description,
            'updated_at'=>Carbon::now()
        ]);
        Session::flash('message', 'Unit Data Updated Successfully');
        return redirect()->route('unit.index');
    }

   
    public function destroy($id)
    {
        Unit::find($id)->delete();
        Session::flash('message', 'Unit Data Deleted Successfully');
        return redirect()->back();
    }

    public function status(Unit $unit)
    {
        if ($unit->status == 1) {
            $unit->update(['status'=> 0]);
        } else {
            $unit->update(['status'=>1]);
        }

        Session::flash('message', 'Unit Status Change Successfully');
        return redirect()->back();
        
    }
}
