<?php

namespace App\Http\Controllers;

use App\Stuff;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class StuffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $stuffs = Stuff::all();
        return view('evaluator.stuff.index', compact('stuffs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('evaluator.stuff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'stuff_code'=>'required',
            'first_name'=>'required',
            'last_name'=>'required'

        ]);
        $stuffs = new stuff([
            'stuff_code' => $request->get('stuff_code'),
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name')
    ]);
        $stuffs->save();
        return redirect()->route('stuff.index')->with('success','Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
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
        $stuffs = Stuff::find($id);
        return view('evaluator.stuff.edit', compact('stuffs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'stuff_code'=>'required',
            'first_name'=>'required',
            'last_name'=>'required'
        ]);
        $stuffs = Stuff::find($id);
        $stuffs->stuff_code = $request->get('stuff_code');
        $stuffs->first_name =  $request->get('first_name');
        $stuffs->last_name = $request->get('last_name');
        $stuffs->save();
        return redirect()->route('stuff.index')->with('success','Data Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        $stuffs = Stuff::find($id);
        $stuffs -> delete();
        return redirect()->route('stuff.destroy')->with('success', 'Deleted Successfully!');
    }
}
