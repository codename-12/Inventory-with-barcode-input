<?php

namespace App\Http\Controllers;

use App\Models\KOPP;
use App\Models\Customer_kain;
use Illuminate\Http\Request;
use DataTables;

class KOPPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:KOPP-list|KOPP-create|KOPP-edit|KOPP-delete', ['only' => ['index','show']]);
         $this->middleware('permission:KOPP-create', ['only' => ['create','store']]);
         $this->middleware('permission:KOPP-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:KOPP-delete', ['only' => ['destroy']]);
    }
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

            if ($request->ajax()) {
                $data = KOPP::select('*')->with(['customer']);
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', 'DF.KOPP.actions')
                        ->rawColumns(['action'])
                        ->make(true);
            }
            $customers= Customer_kain::all();
            return view('DF.KOPP.index', compact('customers'));
    }
    public function create()
    {
        $customers= Customer_kain::all();
        return view('DF.KOPP.index', compact('customers'));
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
            'NO_KOPP' => 'required',
            'NO_SSP-SJ' => 'required',
            'id_customer' => 'required',
            'tanggal' => 'required',
            'design' => 'required',
            'warna' => 'required',
            'lebar' => 'required',
            'ROL' => 'required',
            'KG'=> 'required',
            'LOT' => 'required',
        ]);
    
        KOPP::create($request->all());
    
        return redirect()->route('KOPP.index')
                        ->with('success','Benang created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(KOPP $KOPP)
    {
        
        return view('DF.KOPP.show');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(KOPP $KOPP)
    {

        return view('DF.KOPP.edit').compact('KOPP');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KOPP $KOPP)
    {
        request()->validate([
            'NO_KOPP' => 'required',
            'NO_SSP-SJ' => 'required',
            'id_customer' => 'required',
            'tanggal' => 'required',
            'design' => 'required',
            'warna' => 'required',
            'lebar' => 'required',
            'ROL' => 'required',
            'KG'=> 'required',
            'LOT' => 'required',
        ]);
    
        KOPP::update($request->all());
    
        return redirect()->route('KOPP.index')
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
        $KOPP = KOPP::find($id);
        $KOPP->delete();
        return redirect()->route('KOPP.index')
                        ->with('success','Benang deleted successfully');
    }
    
}
