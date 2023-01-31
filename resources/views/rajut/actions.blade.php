<form action="{{ route('supbenang.destroy',$id) }}" method="POST">
    <a class="btn btn-info" href="{{ route('supbenang.show',$id) }}">Show</a>
    @can('supbenang-edit')
    <a class="btn btn-primary" href="{{ route('supbenang.edit',$id) }}">Edit</a>
    @endcan

    @csrf
    @method('DELETE')
    @can('supbenang-delete')
    <button type="submit" class="btn btn-danger">Delete</button>
    @endcan
</form>