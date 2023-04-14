<?php

namespace App\Http\Controllers;
use App\Models\KOP;
use App\Models\DFregkain_polos;
use App\Models\Customer_kain;
use Illuminate\Http\Request;
use DNS1D;
use DNS2D;
use PDF;
use DataTables;

class DFregkain_polosController extends Controller
{
    function __construct()
   {
        $this->middleware('permission:DFregkain_polos-list|DFregkain_polos-create|DFregkain_polos-edit|DFregkain_polos-delete', ['only' => ['index','show']]);
        $this->middleware('permission:DFregkain_polos-create', ['only' => ['create','store']]);
        $this->middleware('permission:DFregkain_polos-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:DFregkain_polos-delete', ['only' => ['destroy']]);
   }

   public function index(Request $request)
{
    if ($request->ajax()) {
        $data = DFregkain_polos::select('*')->with(['no_kop','no_kop.customer']);
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('qr_code', function($row) {
                    $qr_code = DNS2D::getBarcodePNG($row->kode_kain, 'QRCODE');
                    return ("<img class='qr-code' src='data:image/png;base64,".$qr_code."' alt='barcode' height='50'/>");
                })
                ->addColumn('action', 'DF.regkain_polos.actions')
                ->rawColumns(['action','qr_code'])
                ->make(true);
    }
    $kops = KOP::all();
    return view('DF.regkain_polos.index', compact('kops'));
}

   public function create()
   {
       $kops = KOP::all(); 
       $random = Str::random(6);
       return view('DF.regkain_polos.index', compact('kops','random'));
   }
   
   public function store(Request $request)
   {
       request()->validate([
           'kode_kain' => 'required',
           'tanggal'     => 'required',
           'warna'       => 'required',
           'kop'         => 'required',
           'LOT'         => 'required',
           'ROL'         => 'required',
           'KG'          => 'required|numeric',
           'keterangan',
       ]);
   
       DFregkain_polos::create($request->all());
   
       return redirect()->route('regkain_polos.index')
                       ->with('success','Benang created successfully.');
   }
   
   public function show(DFregkain_polos $regkainpolos)
   {
        $kops = KOP::all(); 
       return view('DF.regkain_polos.show',compact('regkainpolos','kop'));
   }

   public function edit(DFregkain_polos $regkainpolos)
   {
       
        $kops = KOP::all(); 
       return view('DF.regkain_polos.edit',compact('regkainpolos','kop'));
   }
   
 
   public function update(Request $request, DFregkain_polos $regkainpolos)
   {
        request()->validate([
            'tanggal' => 'required',
            'kop' => 'required',
            'warna' => 'required',
            'LOT'=> 'required',
            'ROL' => 'required',
            'KG' => 'required|decimal',
            'keterangan',
       ]);
   
       $regkainpolos->update($request->all());
   
       return redirect()->route('regkain_polos.index')
                       ->with('success','Product updated successfully');
   }
   

   public function destroy($kode_kain)
   {     
        $regkainpolos = DFregkain_polos::where('kode_kain', $kode_kain)->first();
        $regkainpolos ->delete();
        return redirect()->route('regkain_polos.index')
                       ->with('success','Data deleted successfully');
   }


   public function print($kode_kain)
    {
        $regkain_polos = DFregkain_polos::where('kode_kain', $kode_kain)->with(['no_kop','no_kop.customer'])->first();
        $pdf = PDF::loadView('DF.regkain_polos.print', compact('regkain_polos'))->setPaper('a6', 'landscape');
        return $pdf->download('QR.pdf');
    }

}
