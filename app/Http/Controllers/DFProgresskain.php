<?php

namespace App\Http\Controllers;

use App\Models\DF_flow_cotton;
use App\Models\DF_flow_peknitting;
use App\Models\DF_flow_polywoven;
use App\Models\DF_flow_tc;
use Illuminate\Http\Request;
use DataTables;

class DFProgresskain extends Controller
{
    function __construct()
   {
        $this->middleware('permission:DFprogress-list|DFprogress-create|DFprogress-edit|DFprogress-delete', ['only' => ['index','show']]);
        $this->middleware('permission:DFprogress-create', ['only' => ['create','store']]);
        $this->middleware('permission:DFprogress-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:DFprogress-delete', ['only' => ['destroy']]);
   }
   public function index(Request $request)
        {
          $data = DF_flow_cotton::all();
          return view('df_flowpolywoven.index', compact('data'));
        }   
        public function create()
     {
        
     }

     public function store(Request $request)
     {
          
     }


     public function show($id)
    {
     $data = DF_flow_cotton::first(); // Ambil data pertama dari tabel flow

     $totalField = 7; // Jumlah field boolean dalam tabel flow
     $percent = 100 / $totalField;
     $width = ($data->sc  + $data->peroxine_killer + $data->celup  + $data->netral  + $data->shaving  + $data->fixing  + $data->rf) * $percent;
     
     return view('df_flowpolywoven.index', compact('data', 'width', 'percent', 'totalField'));
}
 

     public function edit()
     {

     }
 

     public function update(Request $request, $id)
{
    $data = DF_flow_cotton::findOrFail($id);

    $data->sc = $request->input('sc');
    $data->peroxine_killer = $request->input('peroxine_killer');
    $data->celup = $request->input('celup');
    $data->netral = $request->input('netral');
    $data->shaving = $request->input('shaving');
    $data->fixing = $request->input('fixing');
    $data->rf = $request->input('rf');

    $data->save();

    return redirect()->route('df_flowpolywoven.index')->with('success', 'Data berhasil diubah!');
}

     public function destroy($id)
     {

     }
}
