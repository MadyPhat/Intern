<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Box;

class BoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $case = Box::all();

        return view('admin.cases.index', compact('case'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.cases.create');
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
            'case_name'=>'required'
        ]);

        $case = new Box([
            'case_name'=> $request->get('case_name')
        ]);

        $case -> save();
        return redirect ('/cases' )->with('success' ,'Case Created');
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
        $case = Box::find($id);

        return view('admin.cases.edit', compact('case'));
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
            'case_name'=>'required'
        ]);

        $case = Box::find($id);
        $case->case_name = $request->get('case_name');

        $case->save();
        return redirect('/cases' )->with('success' ,'Case Updated');
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
        $case = Box::find($id);
        $case->delete();

        return redirect('/cases')->with('warming', 'Case deleted!');
    }
}
