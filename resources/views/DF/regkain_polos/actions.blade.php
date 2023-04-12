<form action="{{ route('regkain_polos.destroy',$kode_kain) }}" method="POST">
    <a class="btn btn-info" href="{{ route('regkain_polos.print',$kode_kain) }}">Print</a>
    @can('DFregkain_polos-edit')
    <a class="btn icon btn-primary" href="{{ route('regkain_polos.edit',$kode_kain) }}"><i class="bi bi-pencil-square"></i></a>
    @endcan
    @csrf
    @method('DELETE')
    @can('DFregkain_polos-delete')
    <button type="submit" class="btn icon btn-danger"><i class="bi bi-x-square"></i></button>
    @endcan
</form>     