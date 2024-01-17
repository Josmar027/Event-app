<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEventRequest;
use App\Models\Country;
use App\Models\Event;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $events = Event::with('country')->get(); // Guardo el modelo. With para la relacion. Problema N+1
        return view('events.index', compact('events')); // Devuelvo vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $countries = Country::all();
        $tags = Tag::all();
        return view('events.create', compact('countries', 'tags')); // compact() permite usar las variables en la vista.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateEventRequest $request): RedirectResponse
    {
        if ($request->hasFile('image')) {

            $data = $request->validated(); // Almacena los datos del formRequest
            $data['image'] = Storage::putFile('events', $request->file('image')); // Sube la imagen y la guarda en la BD
            $data['user_id'] = auth()->id(); // Asigna el id del usuario al campo user_id
            $data['slug'] = Str::slug($request->title); // Idem

            $event = Event::create($data); // Asigna los datos al modelo Event y lo crea en la BD
            $event->tags()->attach($request->tags);

            return to_route('events.index'); // Redireciona al crear evento
        } else {
            return back();
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
    }
}
