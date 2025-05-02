<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::withCount(['borrowings' => function ($query) {
            $query->whereMonth('borrowed_at', now()->month);
        }])->get();

        return view('admin.dashboard', compact('users'));
    }
}
