<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(5);
        return view('admin.user.index', compact('users'));
    }

    public function destroy($id)
    {
        $users = User::find($id)->delete();
        
        Session::flash('message', 'Admin Deleted Successfully');
        return redirect()->back();
    }

    public function status(User $user)
    {
        if ($user->status == 1) {
            $user->update(['status'=> 0]);
        } else {
            $user->update(['status'=>1]);
        }

        Session::flash('message', 'User Status Change Successfully');
        return redirect()->back();
        
    }
}
