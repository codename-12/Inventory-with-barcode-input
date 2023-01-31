<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BenangSuppliers;
use App\Models\Master_benang;
use DataTables;

class MasterBenangController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:masterbenang-list|masterbenang-create|masterbenang-edit|masterbenang-delete', ['only' => ['index','show']]);
         $this->middleware('permission:masterbenang-create', ['only' => ['create','store']]);
         $this->middleware('permission:masterbenang-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:masterbenang-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

            if ($request->ajax()) {
                $data = Master_benang::select('*')->with(['bsuppliers']);
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', 'masterbenang.actions')
                        ->rawColumns(['action'])
                        ->make(true);
            }
            $suppliers = BenangSuppliers::all(); 
            return view('masterbenang.index', compact('suppliers'));
    }   
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = BenangSuppliers::all(); 
        return view('masterbenang.create', compact('suppliers'));
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
            'id_supplier' => 'required',
            'jenis_benang' => 'required',
            'tipe_benang'=> 'required',
            'LOT' => 'required',
            'BOX_KRG' => 'required|numeric',
            'KG' => 'required|numeric',
            'BALE',
            'keterangan',
        ]);
    
        Master_benang::create($request->all());
    
        return redirect()->route('masterbenang.index')
                        ->with('success','Benang created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Master_Benang  $masterbenang
     * @return \Illuminate\Http\Response
     */
    public function show(Master_benang $masterbenang)
    {
        $suppliers = BenangSuppliers::all(); 
        return view('masterbenang.show',compact('masterbenang','suppliers' ));
    }

    public function edit(Master_benang $masterbenang)
    {
        $suppliers = BenangSuppliers::all(); 
        return view('masterbenang.edit',compact('masterbenang','suppliers'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PenerimaanBenang  $masterbenang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Master_benang $masterbenang)
    {
         request()->validate([
            'id_supplier' => 'required',
            'jenis_benang' => 'required',
            'tipe_benang'=> 'required',
            'LOT' => 'required',
            'BOX_KRG' => 'required',
            'KG' => 'required',
            'BALE' => 'required',
            'keterangan',
        ]);
    
        $masterbenang->update($request->all());
    
        return redirect()->route('masterbenang.index')
                        ->with('success','Product updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Master_Benang  $masterbenang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Master_benang $masterbenang)
    {
        $masterbenang->delete();
    
        return redirect()->route('masterbenang.index')
                        ->with('success','Benang deleted successfully');
    }
}
