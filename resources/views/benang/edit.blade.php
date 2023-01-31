<div
   class="modal fade text-left"
      id="edit"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      role="dialog"
      aria-labelledby="myModalLabel33"
      aria-hidden="true">

      <div
        class="modal-dialog modal-dialog-centered"
        role="document">

        <div class="modal-content">
          <div class="modal-header bg-primary">
            <h4 class="modal-title" id="myModalLabel33">
              EDIT PENERIMAAN BENANG
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
        <form action="{{ route('benang.update',$benang->id) }}" method="POST" class="form-horizontal" data-parsley-validate>
          @csrf
          @method('PUT')
        <div class="modal-body"  >
          <div class="form-group">
            <strong>Tanggal masuk</strong>
            <input type="DATE" name="tanggal" value="{{ $benang->tanggal }}" class="form-control" placeholder="DD/MM/YYYY">
        </div>
    </div>
    <div class="form-group row">
      <label class="col-md-3 mt-3">Nama Supplier</label>
      <div class="col-md-9">
        <select
          class="select2 form-select shadow-none"
          style="width: 100%; height: 36px"
          id="id_supplier" name="id_supplier"
        >
            <option value="{{ $benang->id_supplier}}">{{ $benang->id_supplier}}</option>
          @foreach ($suppliers as $supplier)
             <option value="{{ $supplier->id}}">{{ $supplier->nama_supplier }}</option>
          @endforeach
       </select>
        </select>
      </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 mt-3">Bukti Penerimaan Barang</label>
        <div class="col-md-9">
          <select
            class="select2 form-select shadow-none"
            style="width: 100%; height: 36px"
            id="BPB" name="BPB"
          >
              <option value="{{ $benang->BPB }}">{{ $benang->BPB }}</option>
            @foreach ($bpbs as $bpb)
               <option value="{{ $bpb->id}}">{{ $bpb->no_bpb }}</option>
            @endforeach
         </select>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label
          for="lname"
          class="col-sm-3 text-end control-label col-form-label"
          >Surat Jalan</label
        >
        <div class="col-sm-9">
          <input
            type="text"
            class="form-control"
            name="SJ"
            value="{{ $benang->SJ }}"
            placeholder=" "
          />
        </div>
      </div>
    <div class="form-group row">
      <label
        for="lname"
        class="col-sm-3 text-end control-label col-form-label"
        >jenis Benang</label
      >
      <div class="col-sm-9">
        <input
          type="text"
          class="form-control"
          name="jenis_benang"
          value="{{ $benang->jenis_benang }}"
          placeholder="CD-12 / PUE 12"
        />
      </div>
    </div>
    <div class="form-group row">
      <label class="col-md-3">Tipe Benang</label>
      <div class="col-md-9">
        <div class="form-check">
          <input
            type="radio"
            class="form-check-input"
            name="tipe_benang"
            value="COTTON"
            required
          />
          <label
            class="form-check-label mb-0"
            for="COTTON"
            >COTTON</label
          >
        </div>
        <div class="form-check">
          <input
            type="radio"
            class="form-check-input"
            name="tipe_benang"
            value="POLYESTER"
            required
          />
          <label
            class="form-check-label mb-0"
            for="POLYESTER"
            >POLYESTER</label
          >
        </div>
        <script type="text/javascript">
          document.forms['form'].elements['tipe_benang'].value='{{ $benang->tipe_benang }}'
        </script>
      </div>
    </div>
    <div class="form-group row">
      <label
        for="email1"
        class="col-sm-3 text-end control-label col-form-label"
        >LOT</label
      >
      <div class="col-sm-9">
        <input
          type="text"
          class="form-control"
          name="LOT"
          value="{{ $benang->LOT }}"
          placeholder="contoh 72223e"
        />
      </div>
    </div>
    <div class="form-group row">
      <label
        for="cono1"
        class="col-sm-3 text-end control-label col-form-label"
        >BOX / KRG</label
      >
      <div class="col-sm-9">
        <input
          type="text"
          class="form-control"
          name="BOX_KRG"
          value="{{ $benang->BOX_KRG }}"
          placeholder="Contoh 21.09"
        />
      </div>
    </div>
    <div class="form-group row">
      <label
        for="cono1"
        class="col-sm-3 text-end control-label col-form-label"
        >KG</label
      >
      <div class="col-sm-9">
        <input
          type="text"
          class="form-control"
          name="KG"
          value="{{ $benang->KG }}"
          placeholder="Contoh 21.09"
        />
      </div>
    </div>
    <div class="form-group row">
      <label
        for="cono1"
        class="col-sm-3 text-end control-label col-form-label"
        >BALE</label
      >
      <div class="col-sm-9">
        <input
          type="text"
          class="form-control"
          name="BALE"
          value="{{ $benang->BALE }}"
          placeholder="Contoh 212.3"
        />
      </div>
    </div>
    <div class="form-group row">
      <label
        for="cono1"
        class="col-sm-3 text-end control-label col-form-label"
        >Keterangan</label
      >
      <div class="col-sm-9">
        <textarea class="form-control" name="keterangan">{{ $benang->keterangan }}</textarea>
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
    <span class="d-none d-sm-block">edit</span>
    </button>
   </div>
</form>
</div>
</div>
</div>

{{-- 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('benang.index') }}"> Back</a>
            </div>
        </div>
    </div>


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
    <div class="row">
        <div class="col-md-4">
          <div class="card">
        <form action="{{ route('benang.update',$benang->id) }}" method="POST" class="form-horizontal">
            @csrf
            @method('PUT')
          <div class="card-body"  >
            <h4 class="card-title">Data Benang</h4>
            <div class="col-xs-12 col-sm-12 col-md-12">W
                <div class="form-group">
                    <strong>Tanggal masuk</strong>
                    <input type="DATE" name="tanggal" value="{{ $benang->tanggal }}" class="form-control" placeholder="DD/MM/YYYY">
                </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3 mt-3">Nama Supplier</label>
              <div class="col-md-9">
                <select
                  class="select2 form-select shadow-none"
                  style="width: 100%; height: 36px"
                  id="id_supplier" name="id_supplier"
                >
                    <option value="{{ $benang->id_supplier}}">{{ $benang->id_supplier}}</option>
                  @foreach ($suppliers as $supplier)
                     <option value="{{ $supplier->id}}">{{ $supplier->nama_supplier }}</option>
                  @endforeach
               </select>
                </select>
              </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Bukti Penerimaan Barang</label>
                <div class="col-md-9">
                  <select
                    class="select2 form-select shadow-none"
                    style="width: 100%; height: 36px"
                    id="BPB" name="BPB"
                  >
                      <option value="{{ $benang->BPB }}">{{ $benang->BPB }}</option>
                    @foreach ($bpbs as $bpb)
                       <option value="{{ $bpb->id}}">{{ $bpb->no_bpb }}</option>
                    @endforeach
                 </select>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label
                  for="lname"
                  class="col-sm-3 text-end control-label col-form-label"
                  >Surat Jalan</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    name="SJ"
                    value="{{ $benang->SJ }}"
                    placeholder=" "
                  />
                </div>
              </div>
            <div class="form-group row">
              <label
                for="lname"
                class="col-sm-3 text-end control-label col-form-label"
                >jenis Benang</label
              >
              <div class="col-sm-9">
                <input
                  type="text"
                  class="form-control"
                  name="jenis_benang"
                  value="{{ $benang->jenis_benang }}"
                  placeholder="CD-12 / PUE 12"
                />
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3">Tipe Benang</label>
              <div class="col-md-9">
                <div class="form-check">
                  <input
                    type="radio"
                    class="form-check-input"
                    name="tipe_benang"
                    value="COTTON"
                    required
                  />
                  <label
                    class="form-check-label mb-0"
                    for="COTTON"
                    >COTTON</label>
                </div>
                <div class="form-check">
                  <input
                    type="radio"
                    class="form-check-input"
                    name="tipe_benang"
                    value="POLYESTER"
                    required
                  />
                  <label
                    class="form-check-label mb-0"
                    for="POLYESTER"
                    >POLYESTER</label>
                </div>
                <script type="text/javascript">
                  document.forms['form'].elements['tipe_benang'].value='{{ $benang->tipe_benang }}'
                </script>
              </div>
            </div>
            <div class="form-group row">
              <label
                for="email1"
                class="col-sm-3 text-end control-label col-form-label"
                >LOT</label
              >
              <div class="col-sm-9">
                <input
                  type="text"
                  class="form-control"
                  name="LOT"
                  value="{{ $benang->LOT }}"
                  placeholder="contoh 72223e"
                />
              </div>
            </div>
            <div class="form-group row">
              <label
                for="cono1"
                class="col-sm-3 text-end control-label col-form-label"
                >BOX / KRG</label
              >
              <div class="col-sm-9">
                <input
                  type="text"
                  class="form-control"
                  name="BOX_KRG"
                  value="{{ $benang->BOX_KRG }}"
                  placeholder="Contoh 21.09"
                />
              </div>
            </div>
            <div class="form-group row">
              <label
                for="cono1"
                class="col-sm-3 text-end control-label col-form-label"
                >KG</label
              >
              <div class="col-sm-9">
                <input
                  type="text"
                  class="form-control"
                  name="KG"
                  value="{{ $benang->KG }}"
                  placeholder="Contoh 21.09"
                />
              </div>
            </div>
            <div class="form-group row">
              <label
                for="cono1"
                class="col-sm-3 text-end control-label col-form-label"
                >BALE</label
              >
              <div class="col-sm-9">
                <input
                  type="text"
                  class="form-control"
                  name="BALE"
                  value="{{ $benang->BALE }}"
                  placeholder="Contoh 212.3"
                />
              </div>
            </div>
            <div class="form-group row">
              <label
                for="cono1"
                class="col-sm-3 text-end control-label col-form-label"
                >Keterangan</label
              >
              <div class="col-sm-9">
                <textarea class="form-control" name="keterangan">{{ $benang->keterangan }}</textarea>
              </div>
            </div>
          </div>
          <div class="border-top">
            <div class="card-body">
              <button type="submit" class="btn btn-primary">
                Submit
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
    </div>

@endsection --}}