<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        $categories = Category::all();
        return view('menus.index', [
            'categories' => $categories,
            'menus' => $menus,
        ]);
    }
    public function search(Request $request)
    {
        $categories = Category::all();

        $query = $request->input('query');
        $menus = Menu::where('name', 'LIKE', "%$query%")->orderBy('id', 'desc')->get();
        return view('menus.index', compact('menus', 'categories'));
    }
    public function show(Menu $menu)
    {
        $other_menus = Menu::where('id', '<>', $menu->id)->inRandomOrder()->take(4)->get();

        return view('menus.show', compact('menu', 'other_menus'));
    }
}
