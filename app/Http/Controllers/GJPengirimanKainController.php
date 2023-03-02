<?php

namespace App\Http\Controllers;
use App\Models\GJpenerimaan_kain;
use App\Models\GJ_stock_polos;
use App\Models\GJ_bs_polos;
use App\Models\DFregkain_polos;
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
               $data = GJpengiriman_kain::select('*')->with(['kode','kode.no_kop','kode.no_kop.customer',])->orderBy('created_at', 'desc');
               return Datatables::of($data)
                       ->addIndexColumn()
                       ->addColumn('action', 'GJpengirimankain.actions')
                       ->rawColumns(['action'])
                       ->make(true);
           }
           $stock_polos = GJ_stock_polos::all();
           $bs_polos = GJ_bs_polos::all();
           return view('GJ.GJpengirimankain.index', compact('stock_polos', 'bs_polos'));
       }   
       public function create()
    {
       
    }

    public function store(Request $request)
    {
        $pengiriman = new GJpengiriman_kain;
        
        $pengiriman->tanggal_pengiriman = $request->input('tanggal_pengiriman');
        $pengiriman->nomor_po = $request->input('nomor_po');
        $kode_kain = $request->input('kode_kain');
        $pengiriman->kode_kain = json_encode($kode_kain);
        
        if (is_array($kode_kain)) {
            $pengiriman->save();
            foreach ($kode_kain as $value) {
                GJ_stock_polos::where('kode_kain', $value)->delete();
                $pengiriman->kode_kain()->attach($value);
            }
        } else {
            $pengiriman->kode_kain = $kode_kain;
            $pengiriman->save();
            GJ_stock_polos::where('kode_kain', $kode_kain)->delete();
        }
        
        return redirect()->route('GJpengirimankain.index')
                        ->with('success','Data pengiriman berhasil ditambahkan.');
    }


        // request()->validate([
        // 'SP_NO' => 'required',
        // 'kode_kain' => 'required',
        // 'NO_PO' => 'required',
        // 'TOTAL' => 'required',
        // 'tanggal' => 'required',
        // 'NO_POL' => 'required',
        // 'keterangan'
        // ]);
    
        // GJpengiriman_kain::create($request->all());
    
        // if (is_array($kode_kain)) {
        //     $pengiriman->save();
        //     foreach ($kode_kain as $value) {
        //         GJ_stock_polos::where('kode_kain', $kode_kain)->delete();
        //         GJ_bs_polos::where('kode_kain', $kode_kain)->delete();
        //         $pengiriman->kode_kain()->attach($value);
        //     }
        // } else {
        //     $pengiriman->kode_kain = $kode_kain;
        //     $pengiriman->save();
        //     GJ_stock_polos::where('kode_kain', $kode_kain)->delete();
        //     GJ_bs_polos::where('kode_kain', $kode_kain)->delete();
        // }
        // return redirect()->route('GJpengirimankain.index')
        //                 ->with('success','Data pengiriman berhasil ditambahkan.');
    

    public function edit(GJpengiriman_kain $kop)
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
    public function update(Request $request,GJpengiriman_kain $kop)
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
