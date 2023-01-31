<form action="{{ route('masterbenang.destroy',$id) }}" method="POST">
    <a class="btn btn-info" href="{{ route('masterbenang.show',$id) }}">Show</a>
    @can('masterbenang-edit')
    <a class="btn icon btn-primary" href="{{ route('masterbenang.edit',$id) }}"><i class="bi bi-pencil-square"></i></a>
    @endcan

    @csrf
    @method('DELETE')
    @can('masterbenang-delete')
    <button type="submit" class="btn icon btn-danger"><i class="bi bi-x-square"></i></button>
    @endcan
</form>