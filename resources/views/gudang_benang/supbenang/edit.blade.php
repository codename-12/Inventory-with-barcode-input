@extends('layouts.mazer')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Supplier</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('supbenang.index') }}"> Back</a>
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
        <form action="{{ route('supbenang.update',$supbenang->id) }}" method="POST" class="form-horizontal">
            @csrf
            @method('PUT')
            <div class="card-body"  >
              <h4 class="card-title">Data Supplier</h4>
              <div class="form-group row">
                <label
                  for="lname"
                  class="col-sm-3 text-end control-label col-form-label"
                  >Nama Supplier</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    name="nama_supplier"
                    value="{{ $supbenang->nama_supplier }}"
                    placeholder="CD-12 / PUE 12"
                  />
                </div>
              </div>
              <div class="form-group row">
                <label
                  for="cono1"
                  class="col-sm-3 text-end control-label col-form-label"
                  >Saldo Total</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    name="saldo"
                    value="{{ $supbenang->saldo }}"
                    placeholder="Contoh 21.09"
                  />
                </div>
              </div>
              <div class="form-group row">
                <label
                  for="cono1"
                  class="col-sm-3 text-end control-label col-form-label"
                  >Hutang</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    name="hutang"
                    value="{{ $supbenang->hutang }}"
                    placeholder="Contoh 21.092"
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
                  <textarea class="form-control" name="keterangan">{{ $supbenang->keterangan }}</textarea>
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