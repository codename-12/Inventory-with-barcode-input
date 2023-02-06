<?php

namespace App\Http\Controllers;

use App\Models\KOP;
use App\Models\Customer_kain;
use Illuminate\Http\Request;
use DataTables;

class KOPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:KOP-list|KOP-create|KOP-edit|KOP-delete', ['only' => ['index','show']]);
         $this->middleware('permission:KOP-create', ['only' => ['create','store']]);
         $this->middleware('permission:KOP-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:KOP-delete', ['only' => ['destroy']]);
    }
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

            if ($request->ajax()) {
                $data = KOP::select('*')->with(['customer']);
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', 'DF.KOP.actions')
                        ->rawColumns(['action'])
                        ->make(true);
            }
            $customers= Customer_kain::all();
            return view('DF.KOP.index', compact('customers'));
    }
    public function create()
    {
        $customers= Customer_kain::all();
        return view('DF.KOP.index', compact('customers'));
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
            'NO_KOP' => 'required',
            'NO_SSP-SJ' => 'required',
            'id_customer' => 'required',
            'tanggal' => 'required',
            'lebar' => 'required',
            'ROL' => 'required',
            'KG'=> 'required',
            'LOT' => 'required',
        ]);
    
        KOP::create($request->all());
    
        return redirect()->route('KOP.index')
                        ->with('success','Benang created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(KOP $kop)
    {
        
        return view('DF.KOP.show');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(KOP $kop)
    {

        return view('DF.KOP.edit').compact('kop');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KOP $kop)
    {
        request()->validate([
            'NO_KOP' => 'required',
            'NO_SSP-SJ' => 'required',
            'id_customer' => 'required',
            'tanggal' => 'required',
            'lebar' => 'required',
            'ROL' => 'required',
            'KG'=> 'required',
            'LOT' => 'required',
        ]);
    
        KOP::update($request->all());
    
        return redirect()->route('KOP.index')
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
        $kop = KOP::find($id);
        $kop->delete();
        return redirect()->route('KOP.index')
                        ->with('success','Benang deleted successfully');
    }
    
}
