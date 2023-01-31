

<?php $__env->startSection('content'); ?>

    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>
    <div class="page-heading">
        <div class="page-title">
          <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
              <h3>Data Rajut</h3>
              <p class="text-subtitle text-muted">data ini terus ter update jika ada perubahan secara live.</p>
            </div>
          </div>
        </div>
      
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Cari berdasarkan kondisi</h4>
          </div>
          <div class="card-body">
          <button
      type="button"
      class="btn btn-outline-success"
      data-bs-toggle="modal"
      data-bs-target="#input">
      Tambah Data
    </button>
    <br/>
    <br/>
    <div class="container">
    <table class="table table-striped data-table">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Rajut</th>
            <th>Saldo</th>
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
              ajax: "<?php echo e(route('rajut.index')); ?>",
              columns: [
                  {data: 'id', name: 'id'},
                  {data: 'nama_rajut', name: 'nama_rajut'},
                  {data: 'saldo', name: 'saldo'},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          });
          
        });
      </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
  <!-- MODALS input FORM -->
<div
class="modal fade text-left"
  id="input"
  tabindex="-1"
  role="dialog"
  aria-labelledby="myModalLabel33"
  aria-hidden="true"
         >
   <div
     class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
     role="document"
   >
     <div class="modal-content">
       <div class="modal-header bg-primary">
         <h4 class="modal-title" id="myModalLabel33">
           Divisi Rajut
         </h4>
         <button
           type="button"
           class="close"
           data-bs-dismiss="modal"
           aria-label="Close"
         >
       <i data-feather="x"></i>
       </button>
     </div>
     <form action="<?php echo e(route('rajut.store')); ?>" method="POST" class="form-horizontal" data-parsley-validate>
       <?php echo csrf_field(); ?>
     <div class="modal-body"  >
       <div class="form-group row">
         <label
           for="lname"
           class="col-sm-3 text-end control-label col-form-label"
           >Nama Rajut</label
         >
         <div class="col-sm-7">
           <input
             type="text"
             class="form-control"
             name="nama_rajut"
             placeholder="CD-12 / PUE 12"
           />
         </div>
       </div>
       <div class="form-group row">
         <label
           for="lname"
           class="col-sm-3 text-end control-label col-form-label"
           >Saldo</label
         >
         <div class="col-sm-7">
           <input
             type="text"
             class="form-control"
             name="saldo"
             placeholder="0000000"
           />
         </div>
       </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-light-secondary"
                data-bs-dismiss="modal"
              >
          <i class="bx bx-x d-block d-sm-none"></i>
          <span class="d-none d-sm-block">Batal</span>
        </button>
        <button
          type="submit"
          class="btn btn-primary ml-1"
          >
            <i
              class="bx bx-check d-block d-sm-none"
            ></i>
            <span class="d-none d-sm-block">Tambah</span>
          </button>
        </div>
    </form>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mazer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\TriCoba\resources\views/rajut/index.blade.php ENDPATH**/ ?>