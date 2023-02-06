<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name', 'Tridayamas') }}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta
      name="keywords"
      content="tridayamas,app tridayamas, APP TRIDAYAMAS"
    />
    <meta
      name="description"
      content="App for Inventory of industry Tridayamas SinarPusaka Made by codename-12 Ryan Hidayat"
    />
    <!-- FORM -->
    <link
      rel="stylesheet"
      href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css') }}"
    />

    <!-- DATATABLE -->
    <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery/dist/jquery.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <link
      rel="stylesheet"
      href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}"
    />
    <link rel="stylesheet" href="{{ asset('assets/css/pages/datatables.css') }}" />
    <link
    rel="stylesheet"
    href="{{ asset('assets/extensions/@fortawesome/fontawesome-free/css/all.min.css') }}"
  />
    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main/app-dark.css') }}" />


    <link
      rel="shortcut icon"
      href="assets/images/logo/favicon.svg"
      type="image/x-icon"
    />
    <link
      rel="shortcut icon"
      href="assets/images/logo/favicon.png"
      type="image/png"
    />
  </head>

  <body>
    <script src="{{ asset('assets/js/initTheme.js') }}"></script>
    <div id="app">
     @include('layouts.partials.sidebar')
      <div id="main" class="layout-navbar navbar-fixed">
        @include('layouts.partials.navbar')
        <div id="main-content">
          @yield('bread')
          @yield('content')
          <footer>
            <div class="footer clearfix mb-0 text-muted footer-fixed">
              <div class="float-start">
                <p>2022 &copy; TRIDAYAMAS SINARPUSAKA</p>
              </div>
              <div class="float-end">
                <p>
                  Crafted with
                  <span class="text-danger"
                    ><i class="bi bi-emoji-smile-fill icon-mid"></i
                  ></span>
                  by <a href="https://github.com/codename-12">codename-12</a>
                </p>
              </div>
            </div>
          </footer>
          @yield('modal')
        </div>
      </div>
    </div>
    <!-- FORM JS -->
    <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/parsleyjs/parsley.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/parsley.js') }}"></script>
    <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-element-select.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <!-- POP UP JS-->
    <script src="../assets/libs/toastr/build/toastr.min.js"></script>
    <script src="assets/extensions/sweetalert2/sweetalert2.min.js"></script>

    <!-- DATATABLES-->
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script src="{{ asset('assets/js/pages/datatables.js') }}"></script>

    <!-- Custom Page Script--> 
    @yield('script')
    
  </body>
</html>

