<?php

namespace App\Http\Controllers;

use App\Models\Bengkel;
use Illuminate\Http\Request;

class BengkelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('caribengkel', [
            "title" => "Cari Bengkel",
            "bengkels" => Bengkel::all()
        ]);
    }

    public function browse()
    {
        return view('browse', [
            "title" => "Lokasi Bengkel"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.bengkel.create', [
            "title" => "Create Bengkel"
        ]);    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:5',
            'address' => 'required|min:5',
            'description' => 'required|min:10',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Bengkel::create($validatedData);

        return redirect('/bengkels')->with('success', 'New data bengkel has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $bengkel = Bengkel::findOrFail($id);

        return view('route', [
            "title" => "Direction",
            "bengkels" => $bengkel
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bengkel = Bengkel::findOrFail($id);

        return view('dashboard.bengkel.edit', [
            "bengkels" => $bengkel,
            "title" => "Update"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:5',
            'address' => 'required|min:5',
            'description' => 'required|min:10',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Bengkel::where('id', $id)
            ->update($validatedData);

        return redirect('/bengkels')->with('success', 'Data bengkel has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bengkel::destroy($id);

        return redirect('/bengkels')->with('success', 'Data bengkel has been deleted!');
    }
}
