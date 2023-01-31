<?php

namespace App\Http\Controllers;

use App\Models\BPB_benang;
use App\Models\BenangSuppliers;
use Illuminate\Http\Request;
use DataTables;

class BPBBenangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:BPBbenang-list|BPBbenang-create|BPBbenang-edit|BPBbenang-delete', ['only' => ['index','show']]);
         $this->middleware('permission:BPBbenang-create', ['only' => ['create','store']]);
         $this->middleware('permission:BPBbenang-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:BPBbenang-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,BPB_benang $bpbbenang)
    {
        if ($request->ajax()) {
            $data = BPB_benang::select('*')->with(['bsuppliers']);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', 'BPBbenang.actions')
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $suppliers = BenangSuppliers::all(); 
        return view('BPBbenang.index',compact('suppliers','bpbbenang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = BenangSuppliers::all(); 
        return view('BPBbenang.create', compact('suppliers'));
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
            'no_bpb' => 'required',
            'id_supplier' => 'required',
            'surat_jalan' => 'required',                                   
            'harga' => 'required|numeric',
            'pembayaran' => 'required',
            'status' => 'required',
        ]);
    
       BPB_benang::create($request->all());
    
        return redirect()->route('BPBbenang.index')
                        ->with('success','Bukti Penerimaan Benang telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BPB_benang $bpbbenang)
    {
        $suppliers = BenangSuppliers::all(); 
        return view('BPBbenang.show', compact('bpbbenang','suppliers'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit(BPB_benang $bpbbenang)
    {
        $suppliers = BenangSuppliers::all(); 
        return view('BPBbenang.edit', compact('bpbbenang','suppliers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,BPB_benang $bpbbenang)
    {
        request()->validate([
            'no_bpb' => 'required',
            'id_supplier' => 'required',
            'surat_jalan' => 'required',                                   
            'harga' => 'required|numeric',
            'pembayaran' => 'required',
            'status' => 'required',
        ]);
    
       BPB_benang::update($request->all());
    
        return redirect()->route('BPBbenang.index')
                        ->with('success','Bukti Penerimaan Benang telah ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bpbbenang = BPB_benang::find($id);
        $bpbbenang->delete();
        return redirect()->route('BPBbenang.index')
                        ->with('success','Bukti Penerimaan Benang telah dihapus');
    }
}