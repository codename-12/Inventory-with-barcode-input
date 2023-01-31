<?php

namespace App\Http\Controllers;
use App\Models\KOP;
use App\Models\stock_printing;
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
                $data = stock_printing::select('*')->with(['kop', 'customer', 'penerimaan', 'pengiriman']);
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', 'GJbsprinting.actions')
                        ->rawColumns(['action'])
                        ->make(true);
            }
            
            return view('GJstockprinting.index');
        }   
        public function create()
     {
         $customers= Customer_kain::all();
         return view('GJbsprinting.index', compact('customers'));
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
     
         stock_printing::create($request->all());
     
         return redirect()->route('GJbsprinting.index')
                         ->with('success','Benang created successfully.');
     }
 
 
     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show(stock_printing $stock_printing)
     {
         
         return view('GJbsprinting.show');
         
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit(stock_printing $stock_printing)
     {
        $stock_printing = stock_printing::all();
         return view('GJbsprinting.edit').compact('stock_printing');
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request,stock_printing $stock_printing)
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
     
         stock_printing::update($request->all());
     
         return redirect()->route('GJbsprinting.index')
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
         $stock_printing = stock_printing::find($id);
         $stock_printing->delete();
         return redirect()->route('GJbsprinting.index')
                         ->with('success','Benang deleted successfully');
     }
}
