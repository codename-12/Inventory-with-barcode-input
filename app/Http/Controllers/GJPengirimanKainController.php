<?php

namespace App\Http\Controllers;
use App\Models\GJpenerimaan_kain;
use App\Models\GJ_stock_polos;
use App\Models\GJ_bs_polos;
use App\Models\GJ_stock_printing;
use App\Models\GJ_bs_printing;
use App\Models\DFregkain_polos;
use App\Models\DFregkain_printing;
use App\Models\GJpengiriman_kain;
use Illuminate\Http\Request;
use DataTables;

class GJPengirimanKainController extends Controller
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
               $data = GJpengiriman_kain::select('*')->orderBy('created_at', 'desc');
               return Datatables::of($data)
                       ->addIndexColumn()
                       ->addColumn('action', 'GJpengirimankain.actions')
                       ->rawColumns(['action'])
                       ->make(true);
           }
           return view('GJ.GJpengirimankain.index');
       }   
       public function create()
    {
        $stock_polos = GJ_stock_polos::select('kode_kain')->get();
        $bs_polos = GJ_bs_polos::select('kode_kain')->get();
        $stock_printing = GJ_stock_printing::select('kode_kain')->get();
        $bs_printing = GJ_bs_printing::select('kode_kain')->get();
        return view('GJ.GJpengirimankain.create' ,compact('stock_polos','bs_polos','stock_printing','bs_printing'));
    }

    public function store(Request $request)
    {
    $request->validate([
        'tanggal_kirim' => 'required|date',
        'kode_kain' => 'required',
        'no_po'=> 'required',
        
    ]);

    $pengiriman = new GJpengiriman_kain;
    $pengiriman->tanggal_kirim = $request->input('tanggal_kirim');
    $pengiriman->no_po = $request->input('no_po');
    $kode_kain = $request->input('kode_kain');
    $pengiriman->kode_kain = json_encode($kode_kain);

    // ubah variabel $kode_kain menjadi array jika tidak sudah array
    if (!is_array($kode_kain)) {
        $kode_kain = [$kode_kain];
    }
    
    $pengiriman->save();

    foreach ($kode_kain as $value) {
        $pengiriman->kode()->attach($value);
    }

    return redirect()->route('GJpengirimankain.index')
                     ->with('success', 'Data pengiriman berhasil ditambahkan.');
}
    public function edit(GJpengiriman_kain $pengiriman_kain)
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
    public function update(Request $request,GJpengiriman_kain $pengiriman_kain)
    {
        request()->validate([
            'id_customer' => 'required',
            'SP_NO' => 'required',
            'jenis_kain' => 'required',
            'kop' => 'required',
            'kode_kain' => 'required',
            'NO_PO' => 'required',
            'TOTAL' => 'required',
            'tanggal' => 'required',
            'NO_POL' => 'required',
            'keterangan'
        ]);
    
        GJpengiriman_kain::update($request->all());
    
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
        $pengiriman = GJpengiriman_kain::find($id);
        $pengiriman->delete();
        return redirect()->route('GJpengirimankain.index')
                        ->with('success','Item deleted successfully');
    }
}
