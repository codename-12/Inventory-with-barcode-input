<script type="text/javascript">
  $(document).ready(function() {
    var tabel1 = $('#tabel1').DataTable({
        processing: true,
        serverSide: true,
        scrollX: true,
        ajax: {
            url: "<?php echo e(route('GJstock.index')); ?>",
            data: { tabel: 2 }
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'customer.nama_customer', name: 'customer.nama_customer'},
            {data: 'jenis_kain', name: 'jenis_kain'},
            {data: 'warna', name: 'warna'},
            {data: 'kop.NO_KOP', name: 'kop.NO_KOP'},
            {data: 'LOT', name: 'LOT'},
            {data: 'ROL', name: 'ROL'},
            {data: 'penerimaan.tanggal', name: 'penerimaan.tanggal'},
            {data: 'pengiriman.tanggal', name: 'pengiriman.tanggal', defaultContent: ""},
            {data: 'keterangan', name: 'keterangan'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    var tabel2 = $('#tabel2').DataTable({
        processing: true,
        serverSide: true,
        scrollX: true,
        ajax: {
            url: "<?php echo e(route('GJstock.index')); ?>",
            data: { tabel: 1 }
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'customer.nama_customer', name: 'customer.nama_customer'},
            {data: 'jenis_kain', name: 'jenis_kain'},
            {data: 'warna', name: 'warna'},
            {data: 'kop.NO_KOP', name: 'kop.NO_KOP'},
            {data: 'LOT', name: 'LOT'},
            {data: 'ROL', name: 'ROL'},
            {data: 'penerimaan.tanggal', name: 'penerimaan.tanggal'},
            {data: 'pengiriman.tanggal', name: 'pengiriman.tanggal', defaultContent: ""},
            {data: 'keterangan', name: 'keterangan'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
});
  </script><?php /**PATH C:\laragon\www\TriCoba\resources\views/GJstock/script.blade.php ENDPATH**/ ?>