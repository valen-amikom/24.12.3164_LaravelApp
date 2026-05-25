<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use App\Models\Partner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // CATEGORY
        $categories = Category::all();

        // EVENT QUERY
        $query = Event::with('category')
            ->where('date', '>=', now())
            ->orderBy('date', 'asc');

        // FILTER CATEGORY
        if ($request->has('category') && $request->category != '') {

            $query->whereHas('category', function ($q) use ($request) {

                $q->where('slug', $request->category);

            });

        }

        // EVENTS
        $events = $query->get();

        // PARTNERS
        $partners = Partner::latest()->get();

        // RETURN VIEW
        return view('welcome', compact(
            'events',
            'categories',
            'partners'
        ));
    }
}