<?php

namespace App\Http\Controllers;

use App\Models\Event;

class LikedEventController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $events = Event::with('likes')->whereHas('likes', function ($query) {
            $query->where('user_id', auth()->id());
        })->get();

        return view('events.likedEvents', compact('events'));
    }
}
