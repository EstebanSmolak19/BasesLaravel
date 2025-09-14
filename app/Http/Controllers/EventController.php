<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use App\Models\Type;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();

        return view('index', [
            'events' => $events
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();

        return view('create', [
            'types' => $types
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        $validated = $request->validated();
        Event::create($validated);
        return redirect()->route('app.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::with('Type')->findOrFail($id);

        return view('show', [
            'event' => $event
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::with('Type')->findOrFail($id);
        $types = Type::all();

        return view('edit', [
            "event" => $event,
            'types' => $types
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, string $id)
    {
        $validated = $request->validated(); //Vérifie les entrées utilisateurs.
        $event = Event::with('Type')->findOrFail($id);
        $event->update($validated);

        return redirect()->route('app.index')->with('success', 'Événement mis à jour avec succès');;
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id); //Si pas trouvé, renvoie une exception.
        $event->delete();

        return redirect()->route('app.index')->with('success', 'Événement supprimé avec succès');
    }
}
