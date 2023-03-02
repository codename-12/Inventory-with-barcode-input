<script type="text/javascript">
  $(document).ready(function() {
    var tabel1 = $('#tabel1').DataTable({
        processing: true,
        serverSide: true,
        scrollX: true,
        ajax: {
            url: "{{ route('GJstock.index') }}",
            type: 'POST',
            data: {table: 'table1', '_token': '{{ csrf_token() }}'}
        },
        columns: [
        {data: 'id', name: 'id'},
        {data: 'qr_code', name: 'qr_code'},
        {data: 'tanggal_masuk', name: 'tanggal_masuk'},
        {data: 'kode.no_kop.customer.nama_customer', name: 'kode.no_kop.customer.nama_customer'},
        {data: 'kode.no_kop.jenis_kain', name: 'kode.no_kop.jenis_kain'},
        {data: 'kode.warna', name: 'kode.warna'},
        {data: 'kode.no_kop.NO_KOP', name: 'kode.no_kop.NO_KOP'},
        {data: 'kode.LOT', name: 'kode.LOT'},
        {data: 'kode.ROL', name: 'kode.ROL'},
        {data: 'kg', name: 'kg'},
        {data: 'kode.keterangan', name: 'kode.keterangan'},
        {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    var tabel2 = $('#tabel2').DataTable({
        processing: true,
        serverSide: true,
        scrollX: true,
        ajax: {
            url: "{{ route('GJstock.index') }}",
            data: {table: 'table2', '_token': '{{ csrf_token() }}'}
        },
        columns: [
        {data: 'id', name: 'id'},
        {data: 'qr_code', name: 'qr_code'},
        {data: 'tanggal_masuk', name: 'tanggal_masuk'},
        {data: 'kode.no_kop.customer.nama_customer', name: 'kode.no_kop.customer.nama_customer'},
        {data: 'kode.no_kop.jenis_kain', name: 'kode.no_kop.jenis_kain'},
        {data: 'kode.warna', name: 'kode.warna'},
        {data: 'kode.no_kop.NO_KOP', name: 'kode.no_kop.NO_KOP'},
        {data: 'kode.LOT', name: 'kode.LOT'},
        {data: 'kode.ROL', name: 'kode.ROL'},
        {data: 'kg', name: 'kg'},
        {data: 'kode.keterangan', name: 'kode.keterangan'},
        {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
});
  </script>