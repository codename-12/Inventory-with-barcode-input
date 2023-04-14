<?php

namespace App\Http\Controllers;
use App\Models\KOP;
use App\Models\GJ_stock_printing;
use App\Models\Customer_kain;
use Illuminate\Http\Request;
use DataTables;

class GJstockprintingController extends Controller
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
                $data = GJ_stock_printing::select('*')->with(['kode','kode.no_kop','kode.no_kop.customer',])->orderBy('created_at', 'desc');
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', 'GJstockprinting.actions')
                        ->rawColumns(['action'])
                        ->make(true);
            }
            
            return view('GJ.GJstockprinting.index');
        }   
        public function create()
     {
         $customers= Customer_kain::all();
         return view('GJstockprinting.index', compact('customers'));
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
     
         GJ_stock_printing::create($request->all());
     
         return redirect()->route('GJstockprinting.index')
                         ->with('success','Benang created successfully.');
     }
 
 
     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show(GJ_stock_printing $GJ_stock_printing)
     {
         
         return view('GJstockprinting.show');
         
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit(GJ_stock_printing $GJ_stock_printing)
     {
        $GJ_stock_printing = GJ_stock_printing::all();
         return view('GJstockprinting.edit').compact('GJ_stock_printing');
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request,GJ_stock_printing $GJ_stock_printing)
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
     
         GJ_stock_printing::update($request->all());
     
         return redirect()->route('GJstockprinting.index')
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
         $GJ_stock_printing = GJ_stock_printing::find($id);
         $GJ_stock_printing->delete();
         return redirect()->route('GJstockprinting.index')
                         ->with('success','Benang deleted successfully');
     }
}
