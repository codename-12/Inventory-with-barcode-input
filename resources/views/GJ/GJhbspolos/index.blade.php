@extends('layouts.mazer')


@section('content')
<!--alert-->
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
<!--end alert-->

<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Riwayat Pengiriman BS Kain Polos</h3>
        <p class="text-subtitle text-muted">data ini terus ter update jika ada perubahan secara live.</p>
      </div>
    </div>
  </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Cari berdasarkan kondisi</h4>
      </div>
      <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered data-table">
          <thead>
          <tr>
              <th>No</th>
              <th>Customer</th>
              <th>Jenis Kain</th>
              <th>Warna</th>  
              <th>KOP</th>
              <th>LOT</th>
              <th>ROL</th>
              <th>KG</th>
              <th>tanggal masuk</th>
              <th>tanggal masuk</th>
              <th>keterangan</th>
              <th width="200px">Action</th> 
          </tr>
      </thead>
      </table>
      </div>
      <script type="text/javascript">
      $(function () {
        var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        scrollX: true,
        ajax: "{{ route('GJhbspolos.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'kode.no_kop.customer.nama_customer', name: 'kode.no_kop.customer.nama_customer'},
            {data: 'kode.no_kop.jenis_kain', name: 'kode.no_kop.jenis_kain'},
            {data: 'kode.warna', name: 'kode.warna'},
            {data: 'kode.no_kop.NO_KOP', name: 'kode.no_kop.NO_KOP'},
            {data: 'kode.LOT', name: 'kode.LOT'},
            {data: 'kode.ROL', name: 'kode.ROL'},
            {data: 'kg', name: 'kg'},
            {data: 'tanggal_masuk', name: 'tanggal_masuk'},
            {data: 'tanggal_kirim', name: 'tanggal_kirim'},
            {data: 'kode.keterangan', name: 'kode.keterangan'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "createdRow": function(row, data, dataIndex) {
            var date = new Date(data.tanggal_masuk); // Ambil data tanggal dari kolom "tanggal_masuk"
            var today = new Date(); // Tanggal hari ini
            var oneMonthAgo = new Date(today.getFullYear(), today.getMonth() - 1, today.getDate()); // Tanggal satu bulan yang lalu
            
            if (date < oneMonthAgo) {
                $(row).addClass('overdue'); // Tambahkan kelas "overdue" ke baris
            }
        }
       });
    });
        </script>
  
      </div>
    </div>
</div>
@endsection