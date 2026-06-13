<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;

class EventController extends Controller
{
    // Halaman detail event
    public function show(Event $event)
{
    $categories = Category::all();

    return view('event-detail', compact('categories', 'event'));
}

    // Halaman checkout
    public function checkout()
    {
        return view('checkout');
    }
}
