<?php

namespace App\Http\Controllers;

use App\Models\Bengkel;
use App\Models\BengkelPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        return view('dashboard.bengkel.create1', [
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
            'longitude' => 'required',
            'image' => 'required|image|file|max:2048'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('bengkel-images');
        }
        
        $validatedData['user_id'] = auth()->user()->id;

        Bengkel::create($validatedData);

        return redirect('/bengkels/create')->with('success', 'New data bengkel has been created!');
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
            'longitude' => 'required',
            'image' => 'required|image|file|max:2048'
        ]);

        if ($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('bengkel-images');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Bengkel::where('id', $id)
            ->update($validatedData);

        return redirect('/databengkel')->with('success', 'Data bengkel has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if($request->image) {
            Storage::delete($request->image);
        }

        Bengkel::destroy($id);

        return redirect('/databengkel')->with('success', 'Data bengkel has been deleted!');
    }

    public function data()
    {
        return view('databengkel', [
            'bengkels' => Bengkel::filter()->paginate(10)->withQueryString(),
            'title' => 'Data Bengkel'
        ]);
    }
}
