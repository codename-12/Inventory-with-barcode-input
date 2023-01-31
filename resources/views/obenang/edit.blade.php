@extends('layouts.mazer')  


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Pengiriman</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('obenang.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-md-4">
          <div class="card">
              <form action="{{ route('obenang.update',$obenang->id) }}" method="POST" class="form-horizontal">
            @csrf
            @method('PUT')
      <div class="card-body"  >
        <h4 class="card-title">Data Pengeluaran Benang</h4>
        
            <div class="form-group row">
                <label class="col-sm-3 text-end control-label col-form-label">Nama Rajut</label>
                <div class="col-md-9">
                  <select
                    class="select2 form-select shadow-none"
                    style="width: 100%; height: 36px"
                    id="id_rajut" name="id_rajut"
                  >
                    @foreach ($rajuts as $rajut)
                       <option value="{{ $rajut->id}}">{{ $rajut->nama_rajut }}</option>
                    @endforeach
                 </select>
                </div>
              </div>
            <div class="form-group row">
            <label class="col-sm-3 text-end control-label col-form-label">Tanggal Pengiriman</label>
                  <div class="col-md-9">
                    <input
                      type="Date"
                      class="form-control"
                      id="datepicker"
                      name="tanggal"
                      value="{{ $obenang->tanggal }}"
                      placeholder="mm/dd/yyyy"
                    />
                </div>
            </div>
            <div class="form-group row">
                <label
                  for="lname"
                  class="col-sm-3 text-end control-label col-form-label"
                  >Surat Jalan</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    name="SJ"
                    value="{{ $obenang->SJ }}"
                    placeholder=" "
                  />
                </div>
              </div>
            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Nama Supplier</label>
              <div class="col-md-9">
                <select
                  class="choices form-select shadow-none"
                  style="width: 100%; height: 36px"
                  id="id_supplier" name="id_supplier"
                >
                  @foreach ($suppliers as $supplier)
                     <option value="{{ $supplier->id}}">{{ $supplier->nama_supplier }}</option>
                  @endforeach
               </select>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label
                for="lname"
                class="col-sm-3 text-end control-label col-form-label"
                >jenis Benang</label
              >
              <div class="col-sm-9">
                <select class="choices form-select shadow-none"
                  style="width: 100%; height: 36px"
                  id="jenis_benang" name="jenis_benang">
                    @foreach ($masterbenangs as $jenisbenang)
                     <option value="{{ $jenisbenang->jenis_benang}}">{{ $jenisbenang->jenis_benang }}</option>
                  @endforeach
                    
                  </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Tipe Benang</label>
              <div class="col-md-9">
                <div class="form-check">
                  <input
                    type="radio"
                    class="form-check-input"
                    name="tipe_benang"
                    value="COTTON"
                    required
                  />
                  <label
                    class="form-check-label mb-0"
                    for="COTTON"
                    >COTTON</label
                  >
                </div>
                <div class="form-check">
                  <input
                    type="radio"
                    class="form-check-input"
                    name="tipe_benang"
                    value="POLYESTER"
                    required
                  />
                  <label
                    class="form-check-label mb-0"
                    for="POLYESTER"
                    >POLYESTER</label
                  >
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label
                for="email1"
                class="col-sm-3 text-end control-label col-form-label"
                >LOT</label
              >
              <div class="col-sm-9">
                <select class="choices form-select shadow-none"
                style="width: 100%; height: 36px"
                id="LOT" name="LOT">
                  @foreach ($masterbenangs as $LOT)
                   <option value="{{ $LOT->LOT }}">{{ $LOT->LOT }}</option>
                @endforeach
                  
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label
                for="cono1"
                class="col-sm-3 text-end control-label col-form-label"
                >BOX / KRG</label
              >
              <div class="col-sm-9">
                <input
                  type="text"
                  class="form-control"
                  name="BOX_KRG"
                  value="{{ $obenang->BOX_KRG }}"
                  placeholder="Contoh 21.09"
                />
              </div>
            </div>
            <div class="form-group row">
              <label
                for="cono1"
                class="col-sm-3 text-end control-label col-form-label"
                >KG</label
              >
              <div class="col-sm-9">
                <input
                  type="decimal"
                  class="form-control"
                  name="KG"
                  id="KG"
                  value="{{ $obenang->KG }}"
                  placeholder="Contoh 21.09"

                />
              </div>
            </div>
            <div class="form-group row">
              <label
                for="cono1"
                class="col-sm-3 text-end control-label col-form-label"
                >BALE</label
              >
              <div class="col-sm-9">
                <input
                  type="number"
                  class="form-control"
                  name="BALE"
                  id="BALE"
                    value="{{ $obenang->BALE }}"
                />
              </div>
            </div>
            <div class="form-group row">
              <label
                for="cono1"
                class="col-sm-3 text-end control-label col-form-label"
                >Keterangan</label
              >
              <div class="col-sm-9">
                <textarea class="form-control" name="keterangan">{{ $obenang->keterangan }}</textarea>
              </div>
            </div>
          </div>
          <div class="border-top">
            <div class="card-body">
              <button type="submit" class="btn btn-primary">
                Submit
              </button>
            </div>
          </div>
        </form>

      </div>
    </div>
    </div>

@endsection