<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lot;

class LotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lot = Lot::all();

        return view('admin.lots.index', compact('lot'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.lots.create');
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
        $request -> validate([
            'lot_number'=>'required'
        ]);

        $lot = new Lot([
            'lot_number'=> $request->get('lot_number'),
        ]);

        $lot -> save();
        return redirect ('/lots' )->with('success' ,'Lot Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $lot = Lot::find($id);

        return view('admin.lots.edit', compact('lot'));
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
        $request -> validate([
            'lot_number'=>'required'
        ]);

        $lot = Lot::find($id);
        $lot->lot_number = $request->get('lot_number');

        $lot->save();
        return redirect ('/lots' )->with('success' ,'Lot Updated');
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
        $lot = Lot::find($id);
        $lot->delete();

        return redirect('/lots')->with('warming', 'Lot deleted!');
    }
}
