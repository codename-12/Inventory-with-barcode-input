<?php

namespace App\Http\Controllers;

use App\Models\GJpenerimaan_kain;
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
        $data = GJpenerimaan_kain::select('*')->with('kode')->orderBy('created_at', 'desc');
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('qr_code', function($row) {
                    $qr_code = DNS2D::getBarcodePNG($row->kode_kain, 'QRCODE');
                    return ("<img class='qr-code' src='data:image/png;base64,".$qr_code."' alt='barcode' height='50'/>");
                })
                ->addColumn('action', 'GJpenerimaankain.actions')
                ->rawColumns(['action','qr_code'])
                ->make(true);
    }
    return view('GJ.GJpenerimaankain.index');
    }

   public function create()
   {   

       return view('GJ.GJpenerimaankain.create');
   }
   
   public function store(Request $request)
{
    // Mengambil input dari form
    $input = $request->all();

    // Mengambil data kode barang dari tabel df_regkain_polos
    $kode_kain = $input['kode_kain'];
    $regkain = DFregkain_polos::where('kode_kain', $kode_kain)->first();

    // Simpan data penerimaan kain ke dalam tabel penerimaan_kain
    $penerimaan_kain = new GJpenerimaan_kain;
    $penerimaan_kain->tanggal_masuk = $input['tanggal_masuk'];
    $penerimaan_kain->kg = $input['kg'];
    $penerimaan_kain->save();

    // Mengaitkan data penerimaan kain dengan data kode barang dari tabel df_regkain_polos
    $penerimaan_kain->kode()->attach($regkain->id);

    return redirect()->route('penerimaan_kain.index');
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
   

   public function destroy(GJpenerimaan_kain $penerimaanpolos)
   {
       $penerimaanpolos->delete();
       return redirect()->route('GJpenerimaankain.index')
                       ->with('success','Data deleted successfully');
   }
}
