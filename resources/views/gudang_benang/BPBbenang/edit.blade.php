@extends('layouts.mazer')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('BPBbenang.index') }}"> Back</a>
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
        <form action="{{ route('masterbenang.update',$masterbenang->id) }}" method="POST" class="form-horizontal">
            @csrf
            @method('PUT')
          <div class="card-body"  >
            <h4 class="card-title">Data Benang</h4>
            <div class="form-group row">
              <label class="col-md-3 mt-3">Nama Supplier</label>
              <div class="col-md-9">
                <select
                  class="select2 form-select shadow-none"
                  style="width: 100%; height: 36px"
                  id="id_supplier" name="id_supplier"
                >
                    <option value="{{ $masterbenang->id_supplier }}">"{{ $masterbenang->id_supplier->$suppliers->nama_supplier}}</option>
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
                <input
                  type="text"
                  class="form-control"
                  name="jenis_benang"
                  value="{{ $masterbenang->jenis_benang }}"
                  placeholder="CD-12 / PUE 12"
                />
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3">Tipe Benang</label>
              <div class="col-md-9">
                <div class="form-check">
                  <input
                    type="radio"
                    class="form-check-input"
                    name="tipe_benang"
                    value="COTTON"
                    {{ $masterbenang->tipe_benang == 'COTTON' ? 'checked' : ''}}
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
                    {{ $masterbenang->tipe_benang == 'POLYESTER' ? 'checked' : ''}}
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
                <input
                  type="text"
                  class="form-control"
                  name="LOT"
                  value="{{ $masterbenang->LOT }}"
                  placeholder="contoh 72223e"
                />
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
                  value="{{ $masterbenang->BOX_KRG }}"
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
                  type="text"
                  class="form-control"
                  name="KG"
                  value="{{ $masterbenang->KG }}"
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
                  type="text"
                  class="form-control"
                  name="BALE"
                  value="{{ $masterbenang->BALE }}"
                  placeholder="Contoh 212.3"
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
                <textarea class="form-control" name="keterangan">{{ $masterbenang->keterangan }}</textarea>
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