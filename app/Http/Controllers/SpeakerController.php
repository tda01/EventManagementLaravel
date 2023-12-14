<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speaker;

class SpeakerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $speakers = Speaker::orderBy('firstName', 'ASC')->paginate(10);
        $value = ($request->input('page', 1) - 1) * 10;
        return view('speakers.list', compact('speakers'))->with('i', $value);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("speakers.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, ['firstName' => 'required',
            'lastName' => 'required',
            'description' => 'required',
            'occupation' => 'required',
            'email' => 'required',
            'img' => 'required']);

        Speaker::create($request->all());
        return redirect()->route('speakers.index')->with('success', 'Speaker
added successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $speaker = Speaker::find($id);
        return view('speakers.show', compact('speaker'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $speaker = Speaker::find($id);
        return view('speakers.edit', compact('speaker'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, ['firstName' => 'required',
            'lastName' => 'required',
            'description' => 'required',
            'occupation' => 'required',
            'email' => 'required',
            'img' => 'required']);

        Speaker::find($id)->update($request->all());
        return redirect()->route('speakers.index')->with('success', 'Speaker
edited successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Speaker::find($id)->delete();
        return redirect()->route('speakers.index')->with('success','Speaker
removed successfully');
    }
}
