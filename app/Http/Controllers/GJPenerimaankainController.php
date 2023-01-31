<?php

namespace App\Http\Controllers;

use App\Models\KOP;
use App\Models\penerimaan_kain;
use App\Models\Customer_kain;
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
        $data = penerimaan_kain::select('*')->with(['kops', 'customer']);
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
                ->addColumn('action', 'GJpenerimaankain.actions')
                ->rawColumns(['action','qr_code'])
                ->make(true);
    }
    $customers = Customer_kain::all();
    $kops = KOP::all();
    return view('GJpenerimaankain.index', compact('kops','customers'));
}

   public function create()
   {
       $kops = KOP::all(); 
       $random = Str::random(6);
       return view('GJpenerimaankain.index', compact('kops','random'));
   }
   
   public function store(Request $request)
   {
       request()->validate([
            'kode_barang' => 'required',
           'tanggal' => 'required',
           'id_customer' => 'required',
           'jenis_kain' => 'required',
           'warna' => 'required',
           'KOP' => 'required',
           'LOT'=> 'required',
           'ROL' => 'required',
           'KG' => 'required|numeric',
           'jenis_stock' => 'required',
           'keterangan',
       ]);
   
       penerimaan_kain::create($request->all());
   
       return redirect()->route('GJpenerimaankain.index')
                       ->with('success','Benang created successfully.');
   }
   
   public function show(penerimaan_kain $penerimaanpolos)
   {
        $kops = KOP::all(); 
       return view('GJpenerimaankain.show',compact('penerimaanpolos','kop'));
   }

   public function edit(penerimaan_kain $penerimaanpolos)
   {
       
        $kops = KOP::all(); 
       return view('GJpenerimaankain.edit',compact('penerimaanpolos','kop'));
   }
   
 
   public function update(Request $request, penerimaan_kain $penerimaanpolos)
   {
        request()->validate([
            'tanggal' => 'required',
            'id_customer' => 'required',
            'jenis_kain' => 'required',
            'warna' => 'required',
            'KOP' => 'required',
            'LOT'=> 'required',
            'ROL' => 'required',
            'KG' => 'required|numeric',
            'jenis_stock' => 'required',
            'keterangan',
       ]);
   
       $penerimaanpolos->update($request->all());
   
       return redirect()->route('GJpenerimaankain.index')
                       ->with('success','Product updated successfully');
   }
   

   public function destroy(penerimaan_kain $penerimaanpolos)
   {
       $penerimaanpolos->delete();
       return redirect()->route('GJpenerimaankain.index')
                       ->with('success','Data deleted successfully');
   }
}
