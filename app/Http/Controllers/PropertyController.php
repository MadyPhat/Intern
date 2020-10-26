<?php

namespace App\Http\Controllers;

use App\Property;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $properties = Property::all();
        return view('evaluator.property.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('evaluator.property.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'property_name'=>'required',
            'type'=>'required',
            'price'=>'required'

        ]);
        $properties = new Property([
            'property_name' => $request->get('property_name'),
            'type' => $request->get('type'),
            'price' => $request->get('price')
        ]);
        $properties->save();
        return redirect()->route('property.index')->with('success','Data Added');}

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $properties = property::find($id);
        return view('evaluator.property.edit', compact('properties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'property_name'=>'required',
            'type'=>'required',
            'price'=>'required'
        ]);
        $properties = Property::find($id);
        $properties->property_name = $request->get('property_name');
        $properties->type =  $request->get('type');
        $properties->price = $request->get('price');
        $properties->save();
        return redirect()->route('property.index')->with('success','Data Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        $properties = Property::find($id);
        $properties -> delete();
        return redirect('/property')->with('success', 'Deleted Successfully!');
    }
}
