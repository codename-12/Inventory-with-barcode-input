<?php

namespace App\Http\Controllers;

use App\Models\GJpenerimaan_kain;
use App\Models\GJ_stock_polos;
use App\Models\GJ_bs_polos;
use App\Models\DFregkain_polos;
use Illuminate\Http\Request;
use Milon\Barcode\Facades\DNS2DFacade;
use DNS1D;
use DNS2D;
use DataTables;

class GJPenerimaankainController extends Controller
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
        $data = GJpenerimaan_kain::select('*')->with(['kode','kode.no_kop','kode.no_kop.customer',])->orderBy('created_at', 'desc');
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('qr_code', function($row) {
                    $qr_code = DNS2D::getBarcodePNG($row->kode_kain, 'QRCODE');
                    return ("<img class='qr-code' src='data:image/png;base64,".$qr_code."' alt='barcode' height='50'/>");
                })
                ->addColumn('action', 'GJ.GJpenerimaankain.actions')
                ->rawColumns(['action','qr_code'])
                ->make(true);
    }
    return view('GJ.GJpenerimaankain.index');
    }

    public function create()
    {
        $kode_kain = DFregkain_polos::select('kode_kain')->get();
        if (!$kode_kain) {
            $kode_kain = DFregkain_printing::select('kode_kain')->get();
        }
        return view('GJ.GJpenerimaankain.create' ,compact('kode_kain'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_masuk' => 'required|date',
            'kode_kain' => 'required|exists:df_regkain_polos,kode_kain|exists:df_regkain_printing,kode_kain',
            'jenis' => 'required',
        ]);
        $regkain = DFregkain_polos::where('kode_kain', $request->kode_kain)->first();
        if ($regkain) {
            $kg = $regkain ? $regkain->KG : null;

            $penerimaanKain = new GJpenerimaan_kain ([
                'tanggal_masuk' => $request->tanggal_masuk,
                'kode_kain' => $request->kode_kain,
                'kg' => $kg,
            ]);

            $penerimaanKain->save();

            if($request->input('jenis') == 'stock'){
                $stock_polos = new GJ_stock_polos([
                'tanggal_masuk' => $request->tanggal_masuk,
                'kode_kain' => $request->kode_kain,
                'kg' => $kg,
                ]);
                $stock_polos->save();
                }
            elseif($request->input('jenis') == 'bs'){
                $bs_polos = new GJ_bs_polos([
                'tanggal_masuk' => $request->tanggal_masuk,
                'kode_kain' => $request->kode_kain,
                'kg' => $kg,
                ]);
                $bs_polos->save();
                }
            return redirect()->route('GJpenerimaankain.create')->with('success', 'Penerimaan kain berhasil ditambahkan');

        }elseif (!$regkain) {
            $regkain = DFregkain_printing::where('kode_kain', $request->kode_kain)->first();
            $kg = $regkain ? $regkain->KG : null;

            $penerimaanKain = new GJpenerimaan_kain ([
                'tanggal_masuk' => $request->tanggal_masuk,
                'kode_kain' => $request->kode_kain,
                'kg' => $kg,
            ]);

            $penerimaanKain->save();

            if($request->input('jenis') == 'stock'){
                $stock_printing = new GJ_stock_printing([
                'tanggal_masuk' => $request->tanggal_masuk,
                'kode_kain' => $request->kode_kain,
                'kg' => $kg,
                ]);
                $stock_printing->save();
                }
            elseif($request->input('jenis') == 'bs'){
                $bs_printing = new GJ_bs_printing([
                'tanggal_masuk' => $request->tanggal_masuk,
                'kode_kain' => $request->kode_kain,
                'kg' => $kg,
                ]);
                $bs_printing->save();
                }
            return redirect()->route('GJpenerimaankain.create')->with('success', 'Penerimaan kain berhasil ditambahkan');
        }
}

   public function show(GJpenerimaan_kain $penerimaanpolos)
   {
        $kops = KOP::all(); 
       return view('GJ.GJpenerimaankain.show',compact('penerimaanpolos','kop'));
   }

   public function edit(GJpenerimaan_kain $penerimaanpolos)
   {
       
        $kops = KOP::all(); 
       return view('GJ.GJpenerimaankain.edit',compact('penerimaanpolos','kop'));
   }
   
 
   public function update(Request $request, GJpenerimaan_kain $penerimaanpolos)
   {
        request()->validate([
        'tanggal_masuk' => 'required',
        'kode_kain'     => 'required',
        'KG'            => 'required|numeric',
        'keterangan',
       ]);
   
       $penerimaanpolos->update($request->all());
   
       return redirect()->route('GJpenerimaankain.index')
                       ->with('success','Product updated successfully');
   }
   

   public function destroy($id)
   {
        $penerimaanpolos = GJpenerimaan_kain::find($id);
       $penerimaanpolos->delete();
       return redirect()->route('GJpenerimaankain.index')
                       ->with('success','Data deleted successfully');
   }
}
