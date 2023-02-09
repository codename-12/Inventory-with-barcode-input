<form action="{{ route('regkain_polos.destroy',$id) }}" method="POST">
    <a class="btn btn-info" href="{{ route('regkain_polos.show',$id) }}">Show</a>
    @can('GJstock-edit')
    <a class="btn icon btn-primary" href="{{ route('regkain_polos.edit',$id) }}"><i class="bi bi-pencil-square"></i></a>
    @endcan

    @csrf
    @method('DELETE')
    @can('GJstock-delete')
    <button type="submit" class="btn icon btn-danger"><i class="bi bi-x-square"></i></button>
    @endcan
</form> 