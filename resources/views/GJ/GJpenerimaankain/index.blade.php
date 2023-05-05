@extends('layouts.mazer')

@section('content')
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

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Form Penerimaan Kain</h3>
                    <p class="text-subtitle text-muted">data ini terus ter update jika ada perubahan secara live.</p>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                {{-- <a data-bs-toggle="modal"
        data-bs-target="#input" class="btn btn-success rounded-pill"
          >Tambah Data</a> --}}
                <a href="{{ route('GJpenerimaankain.create') }}" class="btn btn-success rounded-pill">Tambah Data</a>
                <br />
                <br />
                <h4 class="card-title">Cari berdasarkan kondisi</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>QR CODE</th>
                                <th>tanggal masuk</th>
                                <th>Customer</th>
                                <th>Jenis Kain</th>
                                <th>Warna</th>
                                <th>KOP</th>
                                <th>LOT</th>
                                <th>ROL</th>
                                <th>KG</th>
                                <th>keterangan</th>
                                <th width="200px">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <script type="text/javascript">
                    $(function() {
                        var table = $('.data-table').DataTable({
                            processing: true,
                            serverSide: true,
                            scrollX: true,
                            ajax: "{{ route('GJpenerimaankain.index') }}",
                            columns: [{
                                    data: 'id',
                                    name: 'id'
                                },
                                {
                                    data: 'qr_code',
                                    name: 'qr_code'
                                },
                                {
                                    data: 'tanggal_masuk',
                                    name: 'tanggal_masuk'
                                },
                                {
                                    data: function(row) {
                                        return row.kain_polos ? row.kain_polos.no_kop.customer.nama_customer :
                                            row.kain_printing.no_kop.customer.nama_customer;
                                    },
                                    name: 'kain_polos.no_kop.customer.nama_customer'
                                },
                                {
                                    data: function(row) {
                                        return row.kain_polos ? row.kain_polos.no_kop.jenis_kain : row
                                            .kain_printing.no_kop.jenis_kain;
                                    },
                                    name: 'kain_polos.no_kop.jenis_kain'
                                },
                                {
                                    data: function(row) {
                                        return row.kain_polos ? row.kain_polos.warna : row.kain_printing.warna;
                                    },
                                    name: 'kain_polos.warna'
                                },
                                {
                                    data: function(row) {
                                        return row.kain_polos ? row.kain_polos.no_kop.NO_KOP : row.kain_printing
                                            .no_kop.NO_KOP;
                                    },
                                    name: 'kain_polos.no_kop.NO_KOP'
                                },
                                {
                                    data: function(row) {
                                        return row.kain_polos ? row.kain_polos.LOT : row.kain_printing.LOT;
                                    },
                                    name: 'kain_polos.LOT'
                                },
                                {
                                    data: function(row) {
                                        return row.kain_polos ? row.kain_polos.ROL : row.kain_printing.ROL;
                                    },
                                    name: 'kain_polos.ROL'
                                },
                                {
                                    data: 'kg',
                                    name: 'kg'
                                },
                                {
                                    data: function(row) {
                                        return row.kain_polos ? row.kain_polos.keterangan : row.kain_printing
                                            .keterangan;
                                    },
                                    name: 'kain_polos.keterangan'
                                },
                                {
                                    data: 'action',
                                    name: 'action',
                                    orderable: false,
                                    searchable: false
                                },
                            ]

                        });

                    });
                </script>
            </div>
        </div>
    </div>

    {{-- FORM  --}}

@endsection
@section('script')
@endsection
