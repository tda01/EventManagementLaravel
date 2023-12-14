<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $partners = Partner::orderBy('name', 'ASC')->paginate(10);
        $value = ($request->input('page', 1) - 1) * 10;
        return view('partners.list', compact('partners'))->with('i', $value);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("partners.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required',
            'phoneNumber' => 'required',
            'email' => 'required',
            'web' => 'required',
            'img' => 'required']);

        Partner::create($request->all());
        return redirect()->route('partners.index')->with('success', 'Partner
added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $partner = Partner::find($id);
        return view('partners.show', compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $partner = Partner::find($id);
        return view('partners.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, ['name' => 'required',
            'phoneNumber' => 'required',
            'email' => 'required',
            'web' => 'required',
            'img' => 'required']);

        Partner::find($id)->update($request->all());
        return redirect()->route('partners.index')->with('success', 'Partner
edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Partner::find($id)->delete();
        return redirect()->route('partners.index')->with('success', 'Partner
removed successfully!');
    }
}
