<?php

namespace App\Http\Controllers;

use App\Models\Bengkel;
use App\Models\User;
use Illuminate\Http\Request;

use \PDF;

class DashboardController1 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.index', [
            'bengkels' => Bengkel::all(),
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bengkels = Bengkel::findOrFail($id);

        return view('dashboard.detailbengkel', [
            "bengkel" => $bengkels
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function data ()
    {
        return view('dashboard.databengkel', [
            'bengkels' => Bengkel::filter()->paginate(5)->withQueryString()
        ]);
    }

    public function cetakBengkel()
    {
        $bengkels = Bengkel::all();

        $pdf = PDF::loadview('dashboard.bengkel.cetakpdf', ['bengkels' => $bengkels]);
        return $pdf->download('laporanDataBengkel.pdf');
    }

    public function cetakUser()
    {
        $users = User::all();

        $pdf = PDF::loadview('dashboard.users.cetakpdf', ['users' => $users]);
        return $pdf->download('laporanDataUser.pdf');
    }
}
