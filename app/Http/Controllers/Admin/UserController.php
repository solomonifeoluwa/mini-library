<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        $borrowings = $user->borrowings()->with('book')->get();
        return view('admin.users.show', compact('user', 'borrowings'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }
}
