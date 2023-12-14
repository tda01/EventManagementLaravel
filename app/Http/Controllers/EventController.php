<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Speaker;
use App\Models\Partner;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $events = Event::with('speakers', 'partners', 'contact')->paginate(10);
        $value = ($request->input('page', 1)-1) * 10;
        return view('events.list', compact('events'))->with('i', $value);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $speakers = Speaker::all();
        $partners = Partner::all();

        return view("events.create", compact('speakers', 'partners'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $eventData = $request->validate(['title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'img' => 'required']);

        $contactData = $request->validate(['firstName' => 'required',
            'lastName' => 'required',
            'phoneNumber' => 'required',
            'email' => 'required']);

        $speakersData = $request->validate(['speaker.*' => 'required']);
        $partnersData = $request->validate(['partner.*' => 'required']);

        $event = Event::create([
            'title' => $eventData['title'],
            'description' => $eventData['description'],
            'location' => $eventData['location'],
            'img' => $eventData['img'],
            ]);

        $eventID = $event->id;

        Contact::create([
            'firstName' => $contactData['firstName'],
            'lastName' => $contactData['lastName'],
            'phoneNumber' => $contactData['phoneNumber'],
            'email' => $contactData['email'],
            'eventID' => $eventID,
        ]);

        if (isset($speakersData['speaker'])) {
            foreach ($speakersData['speaker'] as $speakerID) {
                DB::table('event_speaker')->insert([
                    'eventID' => $eventID,
                    'speakerID' => $speakerID,
                ]);
            }
        }

        if (isset($partnersData['partner'])) {
            foreach ($partnersData['partner'] as $partnerID) {
                DB::table('event_partner')->insert([
                    'eventID' => $eventID,
                    'partnerID' => $partnerID,
                ]);
            }
        }


        return redirect()->route('events.index')->with('success', 'Event
added successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
