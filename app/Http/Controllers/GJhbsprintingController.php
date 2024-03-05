<?php

namespace App\Http\Controllers;

use App\Models\KOP;
use App\Models\GJ_H_bs_printing;
use App\Models\Customer_kain;
use Illuminate\Http\Request;
use DataTables;

class GJhbsprintingController extends Controller
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
               $data = GJ_H_bs_printing::select('*')->with(['kode','kode.no_kop','kode.no_kop.customer',])->orderBy('created_at', 'desc');
               return Datatables::of($data)
                       ->addIndexColumn()
                       ->addColumn('action', 'GJ.GJbsprinting.action')
                       ->rawColumns(['action'])
                       ->make(true);
           }
           
           return view('GJ.GJhbsprinting.index');
       }   
       public function create()
    {

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
    
        GJ_bs_polos::create($request->all());
    
        return redirect()->route('GJbspolos.index')
                        ->with('success','Benang created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(GJ_bs_polos $GJ_bs_polos)
    {
        
        return view('GJbspolos.show');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(GJ_bs_polos $GJ_bs_polos)
    {

        return view('GJbspolos.edit').compact('GJ_bs_polos');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,GJ_bs_polos $GJ_bs_polos)
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
    
        GJ_bs_polos::update($request->all());
    
        return redirect()->route('GJbspolos.index')
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
        $bs_polos = GJ_H_bs_printing::find($id);
        $bs_polos->delete();
        return redirect()->route('GJhbsprinting.index')
                        ->with('success','Benang deleted successfully');
    }
}
