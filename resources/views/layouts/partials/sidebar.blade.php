<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
      <div class="sidebar-header position-relative">
        <div class="d-flex justify-content-between align-items-center">
          <div class="logo">
            <a href="{{ route('home') }}">
              <img src="{{ asset('assets/images/logo/tridayalogo.svg') }}" alt="Logo" srcset=""/>
          </a>
          </div>
          <div class="theme-toggle d-flex gap-2 align-items-center mt-2">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink"
              aria-hidden="true"
              role="img"
              class="iconify iconify--system-uicons" 
              width="20"
              height="20"
              preserveAspectRatio="xMidYMid meet"
              viewBox="0 0 21 21"
            >
              <g
                fill="none"
                fill-rule="evenodd"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <path
                  d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                  opacity=".3"
                ></path>
                <g transform="translate(-210 -1)">
                  <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                  <circle cx="220.5" cy="11.5" r="4"></circle>
                  <path
                    d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"
                  ></path>
                </g>
              </g>
            </svg>
            <div class="form-check form-switch fs-6">
              <input
                class="form-check-input me-0"
                type="checkbox"
                id="toggle-dark"
                style="cursor: pointer"
              />
              <label class="form-check-label"></label>
            </div>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink"
              aria-hidden="true"
              role="img"
              class="iconify iconify--mdi"
              width="20"
              height="20"
              preserveAspectRatio="xMidYMid meet"
              viewBox="0 0 24 24"
            >
              <path
                fill="currentColor"
                d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z"
              ></path>
            </svg>
          </div>
          <div class="sidebar-toggler x">
            <a href="#" class="sidebar-hide d-xl-none d-block"
              ><i class="bi bi-x bi-middle"></i
            ></a>
          </div>
        </div>
      </div>
      <div class="sidebar-menu">
        <ul class="menu">
          <li class="sidebar-title">Menu</li>

          <li class="sidebar-item">
            <a href="{{ route('home') }}" class="sidebar-link">
              <i class="bi bi-grid-fill"></i>
              <span>Dashboard</span>
            </a>
          </li>
          @role('Admin')
          <li class="sidebar-item has-sub">
            <a href="#" class="sidebar-link">
              <i class="bi bi-shield-shaded"></i>
              <span>USER MANAGE</span>
            </a>
            <ul class="submenu">
              <li>
                <a href="{{ route('users.index') }}" class="sidebar-link">
                  <i class="bi bi-person-vcard"></i>
                  <span class="hide-menu"> User List </span></a>
              </li>
              <li>
                <a href="{{ route('roles.index') }}" class="sidebar-link">
                  <i class="bi bi-shield-fill-exclamation"></i>
                        <span class="hide-menu"> Role List </span></a>
              </li>
            </ul>
          </li>
          @endrole
          <li class="sidebar-item has-sub">
            <a href="#" class="sidebar-link">
              <i class="bi bi-box-seam"></i>
              <span>DIVISI BENANG</span>
            </a>
            <ul class="submenu">
              <li>
                <a href="{{ route('masterbenang.index') }}" class="sidebar-link">
                  <i class="bi bi-boxes"></i>
                  <span>Stok Benang</span></a>
              </li>
              <li>
                <a href="{{ route('benang.index') }}" class="sidebar-link">
                  <i class="bi bi-box-arrow-in-down"></i>
                  <span>Penerimaan Benang</span></a>
              </li>
              <li>
                <a href="{{ route('obenang.index') }}" class="sidebar-link">
                  <i class="bi bi-box-arrow-up"></i>
                  <span>Pengeluaran Benang</span></a>
              </li>
              <li>
                <a href="{{ route('supbenang.index') }}" class="sidebar-link">
                  <i class="bi bi-truck"></i>
                  <span>Supplier benang</span></a>
              </li>
              <li>
                <a href="{{ route('BPBbenang.index') }}" class="sidebar-link">
                  <i class="bi bi-receipt"></i>
                  <span>Bukti Penerimaan Benang</span></a>
              </li>
              <li>
                <a href="{{ route('invoicebenang.index') }}" class="sidebar-link">
                  <i class="bi bi-cash-coin"></i>
                  <span>invoice</span></a>
              </li>
              <li>
                <a href="{{ route('BPBbenang.index') }}" class="sidebar-link">
                  <i class="bi bi-recycle"></i>
                  <span>Retur Benang</span></a>
              </li>
            </ul>
          </li>
          <li class="sidebar-item has-sub">
            <a href="#" class="sidebar-link">
              <i class="bi bi-stack"></i>
              <span>DIVISI DF</span>
            </a>
            <ul class="submenu">
              <li>
                <a href="{{ route('customerkain.index') }}" class="sidebar-link">
                  <i class="bi bi-dropbox"></i>
                  <span>Customer</span></a>
              </li>
              <li>
                <a href="{{ route('KOP.index') }}" class="sidebar-link">
                  <i class="bi bi-dropbox"></i>
                  <span>Kartu Order Proses</span></a>
              </li>
              <li>
                <a href="{{ route('KOPP.index') }}" class="sidebar-link">
                  <i class="bi bi-dropbox"></i>
                  <span>Kartu Order Proses Printing</span></a>
              </li>
              <li>
                <a href="{{ route('regkain_polos.index') }}" class="sidebar-link">
                  <i class="bi bi-dropbox"></i>
                  <span>Register Kain Polos</span></a>
              </li>
              <li>
                <a href="{{ route('regkain_printing.index') }}" class="sidebar-link">
                  <i class="bi bi-dropbox"></i>
                  <span>Register Kain Printing</span></a>
              </li>
              <li>
                <a href="{{ route('flow_cotton.index') }}" class="sidebar-link">
                  <i class="bi bi-dropbox"></i>
                  <span>Progresskain</span></a>
              </li>
              
            </ul>
          </li>
           <li class="sidebar-item has-sub">
            <a href="#" class="sidebar-link">
              <i class="bi bi-stack"></i>
              <span>GUDANG KAIN JADI</span>
            </a>
            <ul class="submenu">
              <li>
                <a href="{{ route('GJpenerimaankain.index') }}" class="sidebar-link">
                  <i class="bi bi-dropbox"></i>
                  <span>Penerimaan kain</span></a>
              </li>
              <li>
                <a href="{{ route('GJpengirimankain.index') }}" class="sidebar-link">
                  <i class="bi bi-box-seam-fill"></i>
                  <span>Pengiriman Kain</span></a>
              </li>
              {{-- <li>
                <a href="{{ route('GJstock.index') }}" class="sidebar-link">
                  <i class="bi bi-layers"></i>
                  <span>STOCK KAIN</span></a>W
              </li> --}}
              <li>
                <a href="{{ route('GJstockpolos.index') }}" class="sidebar-link">
                  <i class="bi bi-layers"></i>
                  <span>STOCK POLOS</span></a>
              </li>
              <li>
                <a href="{{ route('GJstockprinting.index') }}" class="sidebar-link">
                  <i class="bi bi-layers-fill"></i>
                  <span>STOCK PRINTING</span></a>
              </li>
              <li>
                <a href="{{ route('GJbspolos.index') }}" class="sidebar-link">
                  <i class="bi bi-trash3"></i>
                  <span>BS POLOS</span></a>
              </li>
              <li>
                <a href="{{ route('GJbsprinting.index') }}" class="sidebar-link">
                  <i class="bi bi-trash3-fill"></i>
                  <span>BS PRINTING</span></a>
              </li>

              <li>
                <a href="{{ route('GJhstockpolos.index') }}" class="sidebar-link">
                  <i class="bi bi-layers"></i>
                  <span>PENGIRIMAN STOCK POLOS</span></a>
              </li>
              <li>
                <a href="{{ route('GJhstockprinting.index') }}" class="sidebar-link">
                  <i class="bi bi-layers-fill"></i>
                  <span>PENGIRIMAN STOCK PRINTING</span></a>
              </li>
              <li>
                <a href="{{ route('GJhbspolos.index') }}" class="sidebar-link">
                  <i class="bi bi-trash3"></i>
                  <span>PENGIRIMAN BS POLOS</span></a>
              </li>
              <li>
                <a href="{{ route('GJhbsprinting.index') }}" class="sidebar-link">
                  <i class="bi bi-trash3-fill"></i>
                  <span>PENGIRIMAN BS PRINTING</span></a>
              </li>
            </ul>
          </li>
          <li class="sidebar-item has-sub">
            <a href="#" class="sidebar-link">
              <i class="bi bi-box-seam"></i>
              <span>RAJUT</span>
            </a>
            <ul class="submenu">
              <li>
                <a href="{{ route('rajut.index') }}" class="sidebar-link">
                  <i class="bi bi-boxes"></i>
                  <span>Data Rajut</span></a>
              </li>
            </ul>
          </li>


        </ul>
      </div>
    </div>
  </div>