@extends('layouts.mazer')

@section('content')
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Penerimaan Kain</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('GJpenerimaankain.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="tanggal_masuk">Tanggal Masuk</label>
                            <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror"
                                id="tanggal_masuk" name="tanggal_masuk"
                                value="{{ date('Y-m-d') }}">
                            @error('tanggal_masuk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <label>Jenis Stock: </label>
                        <div class="form-check form-check-success">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="jenis"
                              id="jenis"
                              value="stock"
                              checked
                            />
                            <label class="form-check-label" for="jenis">
                              STOCK
                            </label>
                          </div>
                          <div class="form-check form-check-danger">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="jenis"
                              id="jenis"
                              value="bs"
                            />
                            <label class="form-check-label" for="jenis">
                              BS
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="kode_kain">Kode Kain</label>
                            <input type="text" class="form-control @error('kode_kain') is-invalid @enderror"
                                id="kode_kain" name="kode_kain" autofocus>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
