<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::latest()->paginate(5);
        return view('admin.color.index', compact('colors'));
    }

    public function create()
    {
        return view('admin.color.create');
    }

    public function store(Request $request)
    {
        $this->data = explode(',', $request->color);
        $color = New Color();
        $color->color = json_encode($this->data);
        $color->save();
        Session::flash('message', 'Color Uploaded Successfully');
        return redirect()->route('color.index');
    }

    public function status(Color $color)
    {
        if ($color->status == 1){
            $color->update(['status'=> 0]);
        }else{
            $color->update(['status'=>1]);
        }
        Session::flash('message', "Color Status Update successfully");
        return redirect()->back();
    }

    public function edit(Color $color)
    {
        $this->data['color'] = $color;
        return view('admin.color.edit', $this->data);
    }

    public function update(Request $request, $id)
    {
        $colors = explode(',', $request->color);
        $update = Color::find($id)->update([
            'color'=>json_encode($colors)
        ]);
        if ($update) {
            Session::flash('message', 'Color Updated Successfully');
            return redirect()->route('color.index');
        }
    }

    public function destroy($id)
    {
        Color::find($id)->delete();
        Session::flash('message', 'Color Deleted Successfully');
        return redirect()->back();
    }
}
