<?php

namespace App\Http\Controllers;

use App\Models\BenangSuppliers;
use App\Models\PengirimanBenang;
use App\Models\Rajut_Benang;
use App\Models\Master_benang;
use Illuminate\Http\Request;
use DataTables;

class PengirimanBenangController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:obenang-list|obenang-create|obenang-edit|obenang-delete', ['only' => ['index','show']]);
         $this->middleware('permission:obenang-create', ['only' => ['create','store']]);
         $this->middleware('permission:obenang-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:obenang-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = PengirimanBenang::select('*')->with(['bsuppliers','rajut']);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', 'obenang.actions')
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('obenang.index');
    }   
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = BenangSuppliers::all(); 
        $rajuts = Rajut_benang::all();
        $masterbenangs = Master_benang::all();
        return view('obenang.create', compact('suppliers','rajuts','masterbenangs'));
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
            'tanggal' => 'required',
            'id_rajut' => 'required',
            'SJ' => 'required',
            'tipe_benang'=> 'required',
            'id_supplier' => 'required',
            'jenis_benang' => 'required',
            'LOT' => 'required',
            'BOX_KRG' => 'required|numeric',
            'KG' => 'required|numeric',
            'BALE' => 'required|numeric',
            'keterangan',
        ]);
    
        PengirimanBenang::create($request->all());
    
        return redirect()->route('obenang.index')
                        ->with('success','Benang telah ditambahkan.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\PengirimanBenang  $obenang
     * @return \Illuminate\Http\Response
     */
    public function show(PengirimanBenang $obenang)
    {
        $suppliers = BenangSuppliers::all();
        $rajuts = Rajut_benang::all();
        return view('obenang.show',compact('obenang','suppliers','rajuts' ));
    }

    public function edit(PengirimanBenang $obenang)
    {
        $suppliers = BenangSuppliers::all();
        $rajuts = Rajut_benang::all();
        $masterbenangs = Master_benang::all();
        return view('obenang.edit',compact('obenang','suppliers','rajuts','masterbenangs'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PenerimaanBenang  $benang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PengirimanBenang $obenang)
    {
         request()->validate([
            'tanggal' => 'required',
            'id_rajut' => 'required',
            'SJ' => 'required',
            'tipe_benang'=> 'required',
            'id_supplier' => 'required',
            'jenis_benang' => 'required',
            'LOT' => 'required',
            'BOX_KRG' => 'required|numeric',
            'KG' => 'required|numeric',
            'BALE' => 'required|numeric',
            'keterangan',
        ]);
    
        $obenang->update($request->all());
    
        return redirect()->route('obenang.index')
                        ->with('success','Product updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(PengirimanBenang $obenang)
    {
        $obenang->delete();
        return redirect()->route('obenang.index')
                        ->with('success','Benang deleted successfully');
    }
}
