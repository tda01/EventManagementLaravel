<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\TicketType;



class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tickets = TicketType::with('event')->paginate(10);
        $value = ($request->input('page', 1) - 1) * 10;
        return view('tickets.list', compact('tickets'))->with('i', $value);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $events = Event::all();
        return view("tickets.create", compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, ['eventID' => 'required',
            'description' => 'required',
            'price' => 'required',
         ]);

        TicketType::create($request->all());
        return redirect()->route('tickets.index')->with('success', 'Ticket
added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ticket = TicketType::find($id);
        return view('tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ticket = TicketType::find($id);
        $events = Event::all();
        return view("tickets.edit", compact('ticket', 'events'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, ['eventID' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        TicketType::find($id)->update($request->all());
        return redirect()->route('tickets.index')->with('success', 'Ticket
edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        TicketType::find($id)->delete();
        return redirect()->route('tickets.index')->with('success', 'Ticket
removed successfully!');
    }
}
