<?php

namespace App\Http\Controllers;
use App\Models\KOP;
use App\Models\DFregkain_printing;
use App\Models\Customer_kain;
use Illuminate\Http\Request;
use DNS1D;
use DNS2D;
use DataTables;
class DFregkain_printingController extends Controller
{
    function __construct()
   {
        $this->middleware('permission:DFregkain_printing-list|DFregkain_printing-create|DFregkain_printing-edit|DFregkain_printing-delete', ['only' => ['index','show']]);
        $this->middleware('permission:DFregkain_printing-create', ['only' => ['create','store']]);
        $this->middleware('permission:DFregkain_printing-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:DFregkain_printing-delete', ['only' => ['destroy']]);
   }

   public function index(Request $request)
{
    if ($request->ajax()) {
        $data = DFregkain_printing::select('*')->with(['kops', 'customer']);
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('qr_code', function($row) {
                    // $data = json_encode($row->kode_barang);
                    // $data = json_encode([
                    //     'kode_barang' => $row->kode_barang,
                    //     'tanggal' => $row->tanggal,
                    //     'customer' => $row->customer->nama_customer,
                    //     'jenis_kain' => $row->jenis_kain,
                    //     'warna' => $row->warna,
                    // ]);
                    $qr_code = DNS1D::getBarcodePNG($row->kode_barang, 'C39');
                    return ("<img class='qr-code' src='data:image/png;base64,".$qr_code."' alt='barcode' height='50'/>");
                })
                ->addColumn('action', 'DF.regkain_polos.actions')
                ->rawColumns(['action','qr_code'])
                ->make(true);
    }
    $kops = KOP::all();
    return view('DF.regkain_polos.index', compact('kops','customers'));
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
            'kode_barang' => 'required',
           'tanggal' => 'required',
           'warna' => 'required',
           'KOP' => 'required',
           'LOT'=> 'required',
           'ROL' => 'required',
           'KG' => 'required|numeric',
           'jenis_stock' => 'required',
           'keterangan',
       ]);
   
       DFregkain_printing::create($request->all());
   
       return redirect()->route('regkain_polos.index')
                       ->with('success','Benang created successfully.');
   }
   
   public function show(DFregkain_printing $penerimaanpolos)
   {
        $kops = KOP::all(); 
       return view('DF.regkain_polos.show',compact('penerimaanpolos','kop'));
   }

   public function edit(DFregkain_printing $penerimaanpolos)
   {
       
        $kops = KOP::all(); 
       return view('DF.regkain_polos.edit',compact('penerimaanpolos','kop'));
   }
   
 
   public function update(Request $request, DFregkain_printing $penerimaanpolos)
   {
        request()->validate([
            'tanggal' => 'required',
            'KOP' => 'required',
            'warna' => 'required',
            'LOT'=> 'required',
            'ROL' => 'required',
            'KG' => 'required|numeric',
            'keterangan',
       ]);
   
       $penerimaanpolos->update($request->all());
   
       return redirect()->route('regkain_polos.index')
                       ->with('success','Product updated successfully');
   }
   

   public function destroy(DFregkain_printing $penerimaanpolos)
   {
       $penerimaanpolos->delete();
       return redirect()->route('DF.regkain_polos.index')
                       ->with('success','Data deleted successfully');
   }    
}
