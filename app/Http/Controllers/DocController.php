<?php

namespace App\Http\Controllers;

use App\Customers;
use App\documents;
use http\Client\Curl\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use League\CommonMark\Block\Element\Document;
use function GuzzleHttp\Promise\all;

class DocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
//        $documents = DB::table('documents')
//            ->join('customers','documents.customer_id', 'customers.id')
//            ->select([
//                'id' => 'documents.id',
//                'customer_first_name' => 'customers.first_name',
//                'property' => 'documents.property',
//                'customer_last_name' => 'customers.last_name'
//            ])
//            ->get();
        $documents = documents::all();
//        return $documents;
        return view('evaluator.documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $customers = Customers::all();
        return view('evaluator.documents.create', compact('customers'));
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
            'customer_name'=>'required',
            'property_price'=>'required',

        ]);
        $documents = Documents::create($request->all());
        return redirect()->route('document.index')->with('success','Data Added');
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
        $documents = Documents::find($id);
        return view('evaluator.documents.edit',compact('documents','id'));
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
            'customer_name'=>'required',
            'property_price'=>'required',

        ]);
        $documents = Documents::find($id);
        $documents->customer_name = $request->get('customer_name');
        $documents->property_price = $request->get('property_price');

        $documents->save();
        return redirect()->route('document.index')->with('success','Data Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $documents = Documents::find($id);
        $documents -> delete();
        return redirect()->route('document.index')->with('success', 'Data Deleted');
    }


//    public function createLot(Request $request)
//    {
////        dd($request->all());
//        $lot = $request->lot;
//
//        for($i=1; $i<=$lot; $i++) {
//            $input = [
//                'first_name' => 'test'.$i,
//                'last_name' => 'test____'.$i,
//                'phone_number' => '000000111-'.$i,
//                'address' => 'address-'.$i,
//            ];
//            Customers::create($input);
//        }
//
//        return response(
//            ([
//                'status' => true,
//                'message' => 'customer created',
//            ])
//        );
//
//    }
}
