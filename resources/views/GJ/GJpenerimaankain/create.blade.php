@extends('layouts.mazer')


@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
<form action="{{ route('GJpenerimaankain.store') }}" method="POST">
  @csrf
  <div class="form-group">
      <label for="tanggal_masuk">Tanggal Masuk</label>
      <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="{{ date('Y-m-d') }}" readonly>
  </div>
  <div class="form-group">
      <label for="kode_kain">Kode Kain</label>
      <input type="text" class="form-control" id="kode_kain" name="kode_kain">
  </div>
  <div class="form-group">
      <label for="kg">Berat (kg)</label>
      <input type="text"  class="form-control" id="kg" name="kg" readonly>
  </div>
  <div class="form-group">
      <label for="keterangan">Keterangan</label>
      <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection