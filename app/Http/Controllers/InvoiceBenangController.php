<?php

namespace App\Http\Controllers;

use App\Models\BPB_benang;
use App\Models\InvoiceBenang;
use Illuminate\Http\Request;
use DataTables;

class InvoiceBenangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:invoicebenang-list|invoicebenang-create|invoicebenang-edit|invoicebenang-delete', ['only' => ['index','show']]);
         $this->middleware('permission:invoicebenang-create', ['only' => ['create','store']]);
         $this->middleware('permission:invoicebenang-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:invoicebenang-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = InvoiceBenang::select('*')->with(['bpb']);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', 'invoicebenang.actions')
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $bpbs = BPB_benang::all(); 
        return view('invoicebenang.index', compact('bpbs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bpbs = BPB_benang::all(); 
        return view('invoicebenang.index', compact('bpbs'));
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
            'BPB' => 'required',
            'total_pembayaran' => 'required|numeric',
        ]);
    
       InvoiceBenang::create($request->all());
    
        return redirect()->route('invoicebenang.index')
                        ->with('success','Supplier telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(InvoiceBenang $invoice)
    {
        $bpbs = BPB_Benang::all(); 
        return view('invoicebenang.show', compact('invoice','bpbs'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(InvoiceBenang $invoice)
    {
        $bpbs = BPB_Benang::all(); 
        return view('invoicebenang.edit', compact('invoice','bpbs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,InvoiceBenang $invoice)
    {
        request()->validate([
            'tanggal' => 'required',
            'BPB' => 'required',
            'total_pembayaran' => 'required|numeric',
        ]);
    
        InvoiceBenang::update($request->all());
    
        return redirect()->route('invoicebenang.index')
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
        $invoice = InvoiceBenang::find($id);
        $invoice->delete();
        return redirect()->route('invoicebenang.index')
                        ->with('success','Benang deleted successfully');
    }
}
