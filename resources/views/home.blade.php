@extends('layouts.mazer')

@section('content')
<div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>HOME </h3>
          <p class="text-subtitle text-muted">
            Grafik Data TRIDAYAMAS SINAR PUSAKA
          </p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav
            aria-label="breadcrumb"
            class="breadcrumb-header float-start float-lg-end"
          >
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ route('home') }}">Dashboard</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Apexcharts
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h4>Produksi</h4>
            </div>
            <div class="card-body">
              <div class="chart-container">
            </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">  
            <div class="card-header">
              <h4>Penjualan</h4>
            </div>
            <div class="card-body">
              <div id="bar"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
@section('script')
<script src="{{ asset('assets/extensions/dayjs/dayjs.min.js') }}"></script>
<script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/ui-apexchart.js') }}"></script>
<script src="assets/js/pages/dashboard.js"></script>
@endsection