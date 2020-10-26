<?php

namespace App\Http\Controllers;

use App\Customers;
use App\Province;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $customers = Customers::all();
        return view('evaluator.Customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
//        dd("hello");
        $data=Province::all();
        return view('evaluator.Customer.create', compact('data'));
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
           'first_name'=>'required',
           'last_name'=>'required',
           'phone_number'=>'required',
           'address'=>'required'
        ]);
        $customers = Customers::create($request->all());
        return redirect()->route('customer.index')->with('success','Data Added');
    }

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
        $data=Province::all();
        $customers = Customers::find($id);
        return view('evaluator.Customer.edit',compact('customers','id','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'first_name'=>'required',
            'last_name'=>'required',
            'phone_number'=>'required',
            'address'=>'required',
            'province_id'=>'required'
        ]);
        $customers = Customers::find($id);
        $customers->first_name = $request->get('first_name');
        $customers->last_name = $request->get('last_name');
        $customers->phone_number = $request->get('phone_number');
        $customers->address = $request->get('address');
        $customers->province_id= $request->get('province_id');
        $customers->save();
        return redirect()->route('customer.index')->with('success','Data Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $customers = Customers::find($id);
        $customers -> delete();
        return redirect()->route('customer.index')->with('success', 'Data Deleted');
    }
}
