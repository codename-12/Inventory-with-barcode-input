<?php

namespace App\Http\Controllers;

use App\Models\KOP;
use App\Models\GJ_H_stock_printing;
use App\Models\Customer_kain;
use Illuminate\Http\Request;
use DataTables;

class GJhstockprintingController extends Controller
{
    function __construct()
   {
        $this->middleware('permission:GJstock-list|GJstock-create|GJstock-edit|GJstock-delete', ['only' => ['index','show']]);
        $this->middleware('permission:GJstock-create', ['only' => ['create','store']]);
        $this->middleware('permission:GJstock-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:GJstock-delete', ['only' => ['destroy']]);
   }
   
   public function index(Request $request)
       {
           if ($request->ajax()) {
               $data = GJ_H_stock_printing::select('*')->with(['kode','kode.no_kop','kode.no_kop.customer',])->orderBy('created_at', 'desc');
               return Datatables::of($data)
                       ->addColumn('action', 'GJ.GJhstockprinting.action')
                       ->rawColumns(['action'])
                       ->make(true);
           }
           return view('GJ.GJhstockprinting.index');
       }   
       
       public function create()
    {

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
        'id_customer'=> 'required',
        'jenis_kain' => 'required',
        'warna' => 'required',
        'KOP' => 'required',
        'LOT' => 'required',
        'ROL' => 'required',
        'id_penerimaan' => 'required',
        'id_pengiriman',
        'keterangan',
        ]);
    
        stock_polos::create($request->all());
    
        return redirect()->route('GJstockpolos.index')
                        ->with('success','Stock telah ditambahkan.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(stock_polos $kop)
    {
        
        return view('GJstockpolos.show');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(stock_polos $kop)
    {

        return view('GJstockpolos.edit').compact('kop');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,stock_polos $kop)
    {
        request()->validate([
        'id_customer' => 'required',
        'jenis_kain' => 'required',
        'warna' => 'required',
        'KOP' => 'required',
        'LOT' => 'required',
        'ROL' => 'required',
        'id_penerimaan' => 'required',
        'id_pengiriman',
        'keterangan',
        ]);
    
        stock_polos::update($request->all());
    
        return redirect()->route('GJstockpolos.index')
                        ->with('success','stock telah di update.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stockpolos = GJ_H_stock_polos::find($id);
        $stockpolos->delete();
        return redirect()->route('GJhstockprinting.index')
                        ->with('success','Item deleted successfully');
    }
}
