<form action="{{ route('GJpenerimaankainpolos.destroy',$id) }}" method="POST">
    <a class="btn btn-info" href="{{ route('GJpenerimaankainpolos.show',$id) }}">Show</a>
    @can('GJstock-edit')
    <a class="btn btn-primary" href="{{ route('GJpenerimaankainpolos.edit',$id) }}">Edit</a>
    @endcan

    @csrf
    @method('DELETE')
    @can('GJstock-delete')
    <button type="submit" class="btn btn-danger">Delete</button>
    @endcan
</form>