<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Country;
use App\Models\Event;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class EventController extends Controller
{

    public function index(): View
    {
        $events = Event::with('country')->get(); // Guardo el modelo. With para la relacion. Problema N+1
        return view('events.index', compact('events')); // Devuelvo vista
    }


    public function create(): View
    {
        $countries = Country::all();
        $tags = Tag::all();
        return view('events.create', compact('countries', 'tags')); // compact() permite usar las variables en la vista.
    }


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

    public function edit(Event $event): View
    {
        $countries = Country::all();
        $tags = Tag::all();
        return view('events.edit', compact('countries', 'tags', 'event'));
    }

    public function update(UpdateEventRequest $request, Event $event): RedirectResponse
    {
        $data = $request->validated();
        if ($request->hasFile('image')) { //Compruebo si hay imagen, la borra para almacenar la nueva
            Storage::delete($event->image);
            $data['image'] = Storage::putFile('events', $request->file('image'));
        }

        $data['slug'] = Str::slug($request->title);
        $event->update($data);
        $event->tags()->sync($request->tags);
        return to_route('events.index');
    }

    public function destroy(Event $event): RedirectResponse
    {
        Storage::delete($event->image);
        $event->tags()->detach();
        $event->delete();
        return to_route('events.index');
    }
}
