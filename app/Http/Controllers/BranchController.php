<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Bank;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $branch = Branch::all();

        return view('admin.branches.index', compact('branch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = Bank::all();
        return view('admin.branches.create', compact('data'));
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
        $this -> validate($request,[
            'branch_name'=>'required',
            'branch_location'=>'required',
            'bank_id'=>'required'
        ]);
        $branch = Branch::create($request->all());
        return redirect()->route('branches.index')->with('success','Branch Added');
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
        $branch = Branch::find($id);
        $data = Bank::all();
        return view('admin.branches.edit', compact('branch','id','data'));
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
        $this -> validate($request,[
            'branch_name'=>'required',
            'branch_location'=>'required',
            'bank_id'=>'required'
        ]);

        $branch = Branch::find($id);
        $branch->branch_name = $request->get('branch_name');
        $branch->branch_location = $request->get('branch_location');
        $branch->bank_id = $request->get('bank_id');

        $branch->save();
        return redirect ('/branches' )->with('success' ,'Branch Updated');
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
        $branch = Branch::find($id);
        $branch->delete();

        return redirect('/branches')->with('warming', 'Branch deleted!');
    }
}
