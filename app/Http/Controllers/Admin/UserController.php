<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $customers = User::where('utype', 'CUS')->get();
        return view('admin.customers.index', compact('customers'));
    }
    public function destroy(User $user)
    {
        $user->delete();

        return to_route('admin.customers.index')->with('success', 'User account has been deleted successfully.');
    }
}
