<?php

namespace App\Http\Controllers;

use App\Models\KOP;
use App\Models\bs_polos;
use App\Models\stock_polos;
use App\Models\bs_printing;
use App\Models\stock_printing;
use App\Models\Customer_kain;
use Illuminate\Http\Request;
use DataTables;

class GJSTOCKController extends Controller
{
    function __construct()
   {
        $this->middleware('permission:GJstock-list|GJstock-create|GJstock-edit|GJstock-delete', ['only' => ['index','show']]);
        $this->middleware('permission:GJstock-create', ['only' => ['create','store']]);
        $this->middleware('permission:GJstock-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:GJstock-delete', ['only' => ['destroy']]);
   }
    public function index(Request $request){
       if ($request->ajax()) {
           if ($request->tabel == '1') {
            $data = bs_polos::select('*')->with(['kop','customer','penerimaan','pengiriman']);
               return Datatables::of($data)
                       ->addIndexColumn()
                       ->addColumn('action', 'GJstockcetak.action')
                       ->rawColumns(['action'])
                       ->make(true);
               
           } else if ($request->tabel == '2') {
            $data = stock_polos::select('*')->with(['kop','customer','penerimaan','pengiriman']);
               return Datatables::of($data)
                       ->addIndexColumn()
                       ->addColumn('action', 'GJstockpolos.action')
                       ->rawColumns(['action'])
                       ->make(true);
           } 
        }
       return view('GJstock.index');
   }   
}
