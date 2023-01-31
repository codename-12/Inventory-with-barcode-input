<?php

namespace App\Http\Controllers;

use App\Models\KOP;
use App\Models\pengiriman_kain;
use App\Models\Customer_kain;
use App\Models\bs_polos;
use App\Models\bs_printing;
use App\Models\stock_polos;
use App\Models\stock_printing;
use Illuminate\Http\Request;
use DataTables;

class PengirimanKainController extends Controller
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
               $data = pengiriman_kain::select('*')->with(['kop', 'customer','kode_barang']);
               return Datatables::of($data)
                       ->addIndexColumn()
                       ->addColumn('action', 'GJpengirimankain.actions')
                       ->rawColumns(['action'])
                       ->make(true);
           }
           $customers = Customer_kain::all();
           $stock_polos = stock_polos::all();
           $bs_polos = bs_polos::all();
           $stock_printing = stock_printing::all();
           $bs_printing = bs_printing::all();
           $kops = KOP::all();
           return view('GJpengirimankain.index', compact('customers','stock_polos', 'stock_printing', 'bs_polos', 'bs_printing', 'kops'));
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
        'id_customer' => 'required',
        'SP_NO' => 'required',
        'jenis_kain' => 'required',
        'kop' => 'required',
        'kode_barang' => 'required',
        'NO_PO' => 'required',
        'TOTAL' => 'required',
        'tanggal' => 'required',
        'NO_POL' => 'required',
        'keterangan'
        ]);
    
        pengiriman_kain::create($request->all());
    
        return redirect()->route('GJpengirimankain.index')
                        ->with('success','Benang created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(pengiriman_kain $kop)
    {

        return view('GJpengirimankain.edit').compact('kop');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,pengiriman_kain $kop)
    {
        request()->validate([
            'id_customer' => 'required',
            'SP_NO' => 'required',
            'jenis_kain' => 'required',
            'kop' => 'required',
            'kode_barang' => 'required',
            'NO_PO' => 'required',
            'TOTAL' => 'required',
            'tanggal' => 'required',
            'NO_POL' => 'required',
            'keterangan'
        ]);
    
        pengiriman_kain::update($request->all());
    
        return redirect()->route('GJpengirimankain.index')
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
        $pengiriman = pengiriman_kain::find($id);
        $pengiriman->delete();
        return redirect()->route('GJpengirimankain.index')
                        ->with('success','Item deleted successfully');
    }
}
