<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Reservation;
use App\Models\Review;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        $menus = Menu::all();
        // $reservations_today = Reservation::whereDate('res_date', Carbon::today())
        //     ->where('status', 'confirmed')
        //     ->get();
        $reservations_confirmed = Reservation::where('status', 'confirmed')->latest()->get();

        $reservations_pending = Reservation::where('status', 'pending')->latest()->get();
        $posts = Post::where('is_published', '1')->get();
        $rencent_posts = Post::where('created_at', '>=', Carbon::now()->subDay(7))->get();
        // dd(Carbon::now());
        $reviews = Review::where('approved', false)->where('created_at', '>=', Carbon::today())->get();
        $customersaccounts = User::where('utype', 'CUS')->get();
        // dd($customersaccounts);
        // dd($reviews);
        return view('admin.index', [
            'menus' => $menus,
            'reservations_confirmed' => $reservations_confirmed,

            'reservations_pending' => $reservations_pending,
            'posts' => $posts,
            'rencent_posts' => $rencent_posts,
            'reviews' => $reviews,
            'customersaccounts' => $customersaccounts
        ]);
    }
}
