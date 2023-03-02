<?php

namespace App\Http\Controllers;

use App\Models\BenangSuppliers;
use App\Models\BPB_benang;
use App\Models\Master_benang;
use App\Models\PenerimaanBenang;
use Illuminate\Http\Request;
use DataTables;

class BenangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:benang-list|benang-create|benang-edit|benang-delete', ['only' => ['index','show']]);
         $this->middleware('permission:benang-create', ['only' => ['create','store']]);
         $this->middleware('permission:benang-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:benang-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
        {
            if ($request->ajax()) {
                $data = PenerimaanBenang::select('*')->with(['bsuppliers','bpbs'])->orderBy('created_at', 'desc');
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', 'benang.actions')
                        ->rawColumns(['action'])
                        ->make(true);
            }
            $suppliers = BenangSuppliers::all();
            $masterbenangs = Master_benang::all();
            $bpbs = BPB_benang::all(); 
            return view('gudang_benang.benang.index', compact('suppliers','bpbs','masterbenangs'));
        }   

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = BenangSuppliers::all();
        $masterbenangs = Master_benang::all();
        $bpbs = BPB_benang::all(); 
        return view('gudang_benang.benang.index', compact('suppliers','bpbs','masterbenangs'));
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
            'id_supplier' => 'required',
            'BPB' => 'required',
            'SJ' => 'required',
            'jenis_benang' => 'required',
            'tipe_benang'=> 'required',
            'LOT' => 'required',
            'BOX_KRG' => 'required|numeric',
            'KG' => 'required|numeric',
            'BALE' => 'required|numeric',
            'keterangan',
        ]);
    
        PenerimaanBenang::create($request->all());
    
        return redirect()->route('benang.index')
                        ->with('success','Benang created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\PenerimaanBenang  $benang
     * @return \Illuminate\Http\Response
     */
    public function show(PenerimaanBenang $benang)
    {
        $suppliers = BenangSuppliers::all();
        $bpbs = BPB_benang::all();  
        return view('benang.show',compact('benang','suppliers','bpbs' ));
    }

    public function edit(PenerimaanBenang $benang, $id)
    {
        
        $suppliers = BenangSuppliers::all();
        $bpbs = BPB_benang::all();  
        return view('benang.edit',compact('benang','suppliers','bpbs'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PenerimaanBenang  $benang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PenerimaanBenang $benang)
    {
         request()->validate([
            'tanggal' => 'required',
            'id_supplier' => 'required',
            'BPB' => 'required',
            'SJ' => 'required',
            'jenis_benang' => 'required',
            'tipe_benang'=> 'required',
            'LOT' => 'required',
            'BOX_KRG' => 'required',
            'KG' => 'required',
            'BALE' => 'required',
            'keterangan',
        ]);
    $benang = PenerimaanBenang::find($id);
    $benang->tanggal = $request->get('tanggal');
    $benang->id_supplier = $request->get('id_supplier');
    $benang->BPB = $request->get('BPB');
    $benang->SJ = $request->get('SJ');
    $benang->jenis_benang = $request->get('jenis_benang');
    $benang->tipe_benang = $request->get('tipe_benang');
    $benang->LOT = $request->get('LOT');
    $benang->BOX_KRG = $request->get('BOX_KRG');
    $benang->KG = $request->get('KG');
    $benang->BALE = $request->get('BALE');
    $benang->keterangan = $request->get('keterangan');
    $benang->update($request->all());
    
    return redirect()->route('benang.index')
                    ->with('success','Product updated successfully');
}
    

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PenerimaanBenang  $benang
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenerimaanBenang $benang)
    {
        $benang->delete();
    
        return redirect()->route('benang.index')
                        ->with('success','Benang deleted successfully');
    }
    
}
    