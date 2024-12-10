<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::orderByDesc('created_at')->paginate(10);
        return view('admin.reviews.index', compact('reviews'));
    }
    public function approve(Review $review)
    {
        $review->update(['approved' => true]);
        return redirect()->back()->with('success', 'Successful review approval');
    }
    public function notApprove(Review $review)
    {
        $review->update(['approved' => false]);
        return redirect()->back()->with('success', 'Successful review notapproval');
    }
}
