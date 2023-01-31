<form action="{{ route('customerkain.destroy',$id) }}" method="POST">
    <a class="btn btn-info" href="{{ route('customerkain.show',$id) }}">Show</a>
    @can('customerkain-edit')
    <a class="btn btn-primary" href="{{ route('customerkain.edit',$id) }}">Edit</a>
    @endcan

    @csrf
    @method('DELETE')
    @can('customerkain-delete')
    <button type="submit" class="btn btn-danger">Delete</button>
    @endcan
</form>