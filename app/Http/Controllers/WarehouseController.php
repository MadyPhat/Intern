<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Warehouse;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $warehouse = Warehouse::all();

        return view('admin.warehouses.index', compact('warehouse'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.warehouses.create');
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
            'warehouse_name'=>'required'
        ]);

        $warehouse = new Warehouse([
            'warehouse_name'=> $request->get('warehouse_name'),
        ]);

        $warehouse -> save();
        return redirect ('/warehouses' )->with('success' ,'Warehouse Created');
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
        $warehouse = Warehouse::find($id);

        return view('admin.warehouses.edit');
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
            'warehouse_name'=>'required'
        ]);

        $warehouse = Warehouse::find($id);
        $warehouse->warehouse_name = $request->get('warehouse_name');

        $warehouse->save();
        return redirect ('/warehousees' )->with('success' ,'Warehouse Updated');
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
        $warehouse = Warehouse::find($id);
        $warehouse->delete();

        return redirect('/warehouses')->with('warming', 'Warehouse deleted!');
    }
}
