<form action="{{ route('KOP.destroy',$id) }}" method="POST">
    <a class="btn btn-info" href="{{ route('KOP.show',$id) }}">Show</a>
    @can('KOP-edit')
    <a class="btn icon btn-primary" href="{{ route('KOP.edit',$id) }}"><i class="bi bi-pencil-square"></i></a>
    @endcan

    @csrf
    @method('DELETE')
    @can('KOP-delete')
    <button type="submit" class="btn icon btn-danger"><i class="bi bi-x-square"></i></button>
    @endcan
</form>