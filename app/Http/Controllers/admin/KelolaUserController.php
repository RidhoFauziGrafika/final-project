<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class KelolaUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin/user/index', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('admin/kelola-user')->with('success', 'User Successfully Deleted');
    }
}
