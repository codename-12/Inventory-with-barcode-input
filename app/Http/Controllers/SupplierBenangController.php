<?php

namespace App\Http\Controllers;
use App\Models\BenangSuppliers;
use Illuminate\Http\Request;
use DataTables;

class SupplierBenangController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:supbenang-list|supbenang-create|supbenang-edit|supbenang-delete', ['only' => ['index','show']]);
         $this->middleware('permission:supbenang-create', ['only' => ['create','store']]);
         $this->middleware('permission:supbenang-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:supbenang-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = BenangSuppliers::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', 'supbenang.actions')
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('gudang_benang.supbenang.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gudang_benang.supbenang.create');
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
            'nama_supplier' => 'required',                                   
            'saldo' => 'required|numeric',
            'hutang' => 'required|numeric',
            'keterangan',

        ]);
    
        BenangSuppliers::create($request->all());
    
        return redirect()->route('supbenang.index')
                        ->with('success','Supplier telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BenangSuppliers $supbenang)
    {
        return view('gudang_benang.supbenang.show',compact('supbenang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BenangSuppliers $supbenang)
    {
        return view('gudang_benang.supbenang.edit',compact('supbenang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,BenangSuppliers $supbenang)
    {
        request()->validate([
            'nama_supplier' => 'required',                                   
            'saldo' => 'required|numeric',
            'hutang' => 'required|numeric',
            'keterangan',
        ]);
    
        $supbenang->update($request->all());
    
        return redirect()->route('supbenang.index')
                        ->with('success','Supplier telah diUpdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BenangSuppliers $supbenang)
    {
        $supbenang->delete();
    
        return redirect()->route('masterbenang.index')
                        ->with('success','Benang deleted successfully');
    }
}
