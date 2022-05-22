<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['units'] = Unit::all();
        return view('admin.unit.unit', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['unit'] = new Unit();
        return view('admin.unit.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->data = $request->all();
        Unit::create($this->data);
        Session::flash('message', 'Unit Data Uploaded Successfully');
        return redirect()->to('unit');
    }

    public function show(Unit $unit)
    {
        $this->data['unit'] = $unit;
        return view('admin.unit.show', $this->data);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        $this->data['unit'] = $unit;
        return view('admin.unit.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        $this->data = $request->all();

        $unit->name = $this->data['name'];
        $unit->title = $this->data['title'];
        $unit->slug = $this->data['slug'];
        $unit->description = $this->data['description'];
        $unit->save();
        Session::flash('message', 'Unit Data Updated Successfully');
        return redirect()->to('unit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();
        Session::flash('message', 'Unit Data Deleted Successfully');
        return redirect()->back();
    }
}
