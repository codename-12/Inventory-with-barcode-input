<form action="{{ route('regkain_printing.destroy',$kode_kain) }}" method="POST">
    <a class="btn btn-info" href="{{ route('regkain_printing.generatePDF',$kode_kain) }}">Print</a>
    @can('DFregkain_printing-edit')
    <a class="btn icon btn-primary" href="{{ route('regkain_printing.edit',$kode_kain) }}"><i class="bi bi-pencil-square"></i></a>
    @endcan
    @csrf
    @method('DELETE')
    @can('DFregkain_printing-delete')
    <button type="submit" class="btn icon btn-danger"><i class="bi bi-x-square"></i></button>
    @endcan
</form> 