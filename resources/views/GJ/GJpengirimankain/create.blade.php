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
                <div class="card-header">Tambah Pengiriman Kain</div>
                <div class="card-body">
                    <form action="{{ route('GJpengirimankain.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="tanggal_masuk">Tanggal Kirim</label>
                            <input type="date" class="form-control @error('tanggal_kirim') is-invalid @enderror"
                                id="tanggal_kirim" name="tanggal_kirim"
                                value="{{ old('tanggal_kirim') ?? date('Y-m-d') }}">
                            @error('tanggal_kirim')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <label>NO PO : </label>
                        <div class="form-group">
                          <input
                           type="text"
                           placeholder="12/213/13"
                           class="form-control"
                           name="no_po"
                           data-parsley-required="true"
                           data-parsley-error-message="NOMOR PO Harus diisi."
                         />
                       </div>
                        <div class="form-group">
                            <label for="kode_kain">Kode Kain:</label>
                            <select class="choices form-select multiple-remove" id="kode_kain" name="kode_kain[]" multiple required>
                                <optgroup label="POLOS">
                                    @foreach ($stock_polos as $polos)
                                      <option value="{{ $polos->kode_kain }}">{{ $polos->kode_kain }}</option>
                                    @endforeach
                                  </optgroup>
                                  <optgroup label="BS POLOS">
                                    @foreach ($bs_polos as $bs)
                                      <option value="{{ $bs->kode_kain }}">{{ $bs->kode_kain }}</option>
                                    @endforeach
                                  </optgroup>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
