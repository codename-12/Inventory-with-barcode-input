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
                                value="{{ old('tanggal_masuk') ?? date('Y-m-d') }}">
                            @error('tanggal_masuk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kode_kain">Kode Kain</label>
                            <input type="text" class="form-control @error('kode_kain') is-invalid @enderror"
                                id="kode_kain" name="kode_kain" value="{{ old('kode_kain') }}">
                            @error('kode_kain')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                            <label for="kg">Kg</label>
                            <input type="text" class="form-control" id="kg" name="kg"
                                value="{{ $df_regkain_polos->KG ?? '' }}" readonly>
                        </div> --}}
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <script>
    $(document).ready(function() {
        $('#kode_kain').on('change', function() {
            var kode_kain = $(this).val();

            // kirim permintaan ke server menggunakan AJAX
            $.ajax({
                url: "{{ url('/GJpenerimaankain/get_kg_by_kode_kain') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    kode_kain: kode_kain
                },
                success: function(data) {
                    // isi nilai input kg dengan data yang diterima dari server
                    $('#kg').val(data.kg);
                },
                error: function() {
                    alert('Terjadi kesalahan saat memproses permintaan.');
                }
            });
        });
    });
</script> --}}

@endsection
