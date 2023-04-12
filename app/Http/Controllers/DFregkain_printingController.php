<?php

namespace App\Http\Controllers;
use App\Models\KOPP;
use App\Models\DFregkain_printing;
use App\Models\Customer_kain;
use Illuminate\Http\Request;
use DNS1D;
use DNS2D;
use PDF;
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
        $data = DFregkain_printing::select('*')->with('no_kop');
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
                    $qr_code = DNS2D::getBarcodePNG($row->kode_kain, 'QRCODE');
                    return ("<img class='qr-code' src='data:image/png;base64,".$qr_code."' alt='barcode' height='50'/>");
                })
                ->addColumn('action', 'DF.regkain_printing.actions')
                ->rawColumns(['action','qr_code'])
                ->make(true);
    }
    $kops = KOPP::all();
    return view('DF.regkain_printing.index', compact('kops'));
}

   public function create()
   {
       $kops   = KOPP::all();
       $random = Str::random(6);
       return view('DF.regkain_printing.index', compact('kops','random'));
   }
   
   public function store(Request $request)
   {
       request()->validate([
           'kode_kain'   => 'required',
           'tanggal'     => 'required',
           'warna'       => 'required',
           'kop'         => 'required',
           'LOT'         => 'required',
           'ROL'         => 'required',
           'KG'          => 'required|numeric',
           'keterangan',
       ]);
   
       DFregkain_printing::create($request->all());
   
       return redirect()->route('regkain_printing.index')
                       ->with('success','Benang created successfully.');
   }
   
   public function show(DFregkain_printing $regkainprinting)
   {
        $kops = KOPP::all(); 
       return view('DF.regkain_printing.show',compact('regkain_printing ','kop'));
   }

   public function edit(DFregkain_printing $regkain_printing )
   {
       
        $kops = KOPP::all(); 
       return view('DF.regkain_printing.edit',compact('regkain_printing ','kop'));
   }
   
 
   public function update(Request $request, DFregkain_printing $regkain_printing )
   {
        request()->validate([
        'kode_kain'   => 'required',
        'tanggal'     => 'required',
        'warna'       => 'required',
        'kop'         => 'required',
        'LOT'         => 'required',
        'ROL'         => 'required',
        'KG'          => 'required|numeric',
        'keterangan',
       ]);
   
       $regkain_printing ->update($request->all());
   
       return redirect()->route('regkain_printing.index')
                       ->with('success','Product updated successfully');
   }
   

   public function destroy($kode_kain)
   {     
        $regkain_printing = DFregkain_printing::where('kode_kain', $kode_kain)->first();
        $regkain_printing ->delete();
        return redirect()->route('regkain_printing.index')
                       ->with('success','Data deleted successfully');
   }
   public function generatePDF($kode_kain)
    {
        $regkain_printing = DFregkain_printing::where('kode_kain', $kode_kain)->with(['no_kop','no_kop.customer'])->first();
        $pdf = PDF::loadView('DF.regkain_printing.print', compact('regkain_printing'))->setPaper('a6', 'landscape');
        return $pdf->download('QR.pdf');
    }
}
