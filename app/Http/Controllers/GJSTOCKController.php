<?php

namespace App\Http\Controllers;

use App\Models\GJpenerimaan_kain;
use App\Models\GJ_stock_polos;
use App\Models\GJ_bs_polos;
use App\Models\DFregkain_polos;
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
            $data = GJ_stock_polos::select('*')->with(['kode','kode.no_kop','kode.no_kop.customer',])->orderBy('created_at', 'desc');
               return Datatables::of($data)
                       ->addIndexColumn()
                       ->make(true);
               
           } else if ($request->tabel == '2') {
            $data = GJ_bs_polos::select('*')->with(['kode','kode.no_kop','kode.no_kop.customer',])->orderBy('created_at', 'desc');
               return Datatables::of($data)
                       ->addIndexColumn()
                       ->make(true);
           } 
        }
       return view('GJ.GJstock.index');
   }   
}
