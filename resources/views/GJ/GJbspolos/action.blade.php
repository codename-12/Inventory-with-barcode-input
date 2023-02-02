<form action="{{ route('GJbspolos.destroy',$id) }}" method="POST">
    <a class="btn btn-info" href="{{ route('GJbspolos.show',$id) }}">Show</a>
    @can('GJstock-edit')
    <a class="btn btn-primary" href="{{ route('GJbspolos.edit',$id) }}">Edit</a>
    @endcan

    @csrf
    @method('DELETE')
    @can('GJstock-delete')
    <button type="submit" class="btn btn-danger">Delete</button>
    @endcan
</form>