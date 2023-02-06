<?php

namespace App\Http\Controllers;

use App\Models\Customer_kain;
use Illuminate\Http\Request;
use DataTables;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:customerkain-list|customerkain-create|customerkain-edit|customerkain-delete', ['only' => ['index','show']]);
         $this->middleware('permission:customerkain-create', ['only' => ['create','store']]);
         $this->middleware('permission:customerkain-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:customerkain-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Customer_kain::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', 'DF.customerkain.actions')
                    ->rawColumns(['action'])
                    ->make(true);
        } 
        return view('DF.customerkain.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('DF.customerkain.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'nama_customer' => 'required',
            'keterangan',
        ]);
    
        Customer_kain::create($request->all());
    
        return redirect()->route('customerkain.index')
                        ->with('success','Supplier telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer_kain $customer)
    {
        
        return view('DF.customerkain.show');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer_kain $customer)
    {

        return view('DF.customerkain.edit').compact('customer');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Customer_kain $customer)
    {
        request()->validate([
            'nama_customer' => 'required',
            'keterangan',
        ]);
    
        Customer_kain::update($request->all());
    
        return redirect()->route('DF.customerkain.index')
                        ->with('success','Invoice telah dibuat.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer_kain::find($id);
        $customer->delete();
        return redirect()->route('DF.customerkain.index')
                        ->with('success','Benang deleted successfully');
    }
}
