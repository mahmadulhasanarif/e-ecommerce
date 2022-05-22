<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ColorController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::all();
        return view('admin.color.color', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.color.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->data = explode(',', $request->color);
        $color = New Color();
        $color->color = json_encode($this->data);
        $color->save();
        Session::flash('message', 'Color Uploaded Successfully');
        return redirect()->to('color');
    }

    public function change_status(Request $request)
    {
        {
            $color = Color::find($request->id);
            $color->status = $request->status;
            $color->save();
      
            return response()->json(['success'=>'Color status change successfully.']);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color)
    {
        $this->data['color'] = $color;
        return view('admin.color.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {
        $colors = explode(',', $request->color);
        $update = $color->update([
            'color'=>json_encode($colors)
        ]);
        if ($update) {
            Session::flash('message', 'Color Updated Successfully');
            return redirect()->to('color');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {
        $color->delete();
        Session::flash('message', 'Color Deleted Successfully');
        return redirect()->back();
    }
}
