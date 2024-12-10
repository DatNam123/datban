<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactStoreRequest;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Review;
use App\Models\Slide;
use App\Models\Team;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {

        $categories = Category::all();
        $teams = Team::inRandomOrder()->get();
        $specials = Category::where('name', 'Specials')->first();
        $slides = Slide::where('terms', 1)->get();
        $posts = Post::where('is_published', '1')->orderBy('created_at', 'desc')->take(3)->get();
        $reviews = Review::where('approved', true)->latest()->get();

        return view('welcome', [
            'teams' => $teams,
            'categories' => $categories,
            'specials' => $specials,
            'slides' => $slides,
            'posts' => $posts,
            'reviews' => $reviews
        ]);
    }
    public function about()
    {
        $teams = Team::inRandomOrder()->get();
        return view('about', compact('teams'));
    }

    public function contact()
    {
        return view('contact');
    }
    public function storeContact(ContactStoreRequest $request)
    {
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        return to_route('index')->with('message', 'Thank you for contacting us.');
    }
}
