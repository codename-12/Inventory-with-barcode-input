<form action="{{ route('GJstockpolos.destroy',$id) }}" method="POST">
    <a class="btn btn-info" href="{{ route('GJstockpolos.show',$id) }}">Show</a>
    @can('GJstock-edit')
    <a class="btn btn-primary" href="{{ route('GJstockpolos.edit',$id) }}">Edit</a>
    @endcan

    @csrf
    @method('DELETE')
    @can('GJstock-delete')
    <button type="submit" class="btn btn-danger">Delete</button>
    @endcan
</form>