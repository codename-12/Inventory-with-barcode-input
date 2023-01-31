<?php

namespace App\Http\Controllers;
use App\Models\Rajut_Benang;
use Illuminate\Http\Request;
use DataTables;

class RajutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:rajut-list|rajut-create|rajut-edit|rajut-delete', ['only' => ['index','show']]);
         $this->middleware('permission:rajut-create', ['only' => ['create','store']]);
         $this->middleware('permission:rajut-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:rajut-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Rajut_Benang::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', 'rajut.actions')
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('rajut.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rajut.create');
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
            'nama_rajut' => 'required',                                   
            'saldo' => 'required|numeric',

        ]);
    
        Rajut_Benang::create($request->all());
    
        return redirect()->route('rajut.index')
                        ->with('success','Supplier telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Rajut_Benang $rajut)
    {
        return view('rajut.show',compact('rajut'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Rajut_Benang $rajut)
    {
        return view('rajut.edit',compact('rajut'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Rajut_Benang $rajut)
    {
        request()->validate([
            'nama_rajut' => 'required',                                   
            'saldo' => 'required|numeric',

        ]);
    
        Rajut_Benang::update($request->all());
    
        return redirect()->route('rajut.index')
                        ->with('success','Supplier telah diUpdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rajut_Benang $rajut)
    {
        $rajut->delete();
    
        return redirect()->route('rajut.index')
                        ->with('success','Benang deleted successfully');
    }
}
