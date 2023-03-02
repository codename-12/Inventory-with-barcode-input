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
        <h3>Data Gudang Jadi</h3>
        <p class="text-subtitle text-muted">data ini terus ter update jika ada perubahan secara live.</p>
      </div>
    </div>
  </div>
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">DATA STOCK</h5>
      </div>
      <div class="card-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <a
              class="nav-link active"
              id="polos-tab"
              data-bs-toggle="tab"
              href="#polos"
              role="tab"
              aria-controls="polos"
              aria-selected="true"
              >POLOS</a
            >
          </li>
          <li class="nav-item" role="presentation">
            <a
              class="nav-link"
              id="bspolos-tab"
              data-bs-toggle="tab"
              href="#bspolos"
              role="tab"
              aria-controls="bspolos"
              aria-selected="false"
              >BS POLOS</a
            >
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div
            class="tab-pane fade show active"
            id="polos"
            role="tabpanel"
            aria-labelledby="polos-tab"
          >
          @include('GJ.GJstock.polos')
          </div>
          <div
            class="tab-pane fade"
            id="bspolos"
            role="tabpanel"
            aria-labelledby="bspolos-tab"
          >
          </div>
        </div>
      </div>
    </div>
    @include('GJ.GJstock.script')
</div>
@endsection