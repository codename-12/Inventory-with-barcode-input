<form action="{{ route('obenang.destroy',$id) }}" method="POST">
    <a class="btn btn-info" href="{{ route('obenang.show',$id) }}">Show</a>
    @can('obenang-edit')
    <a class="btn icon btn-primary" href="{{ route('obenang.edit',$id) }}"><i class="bi bi-pencil-square"></i></a>
    @endcan

    @csrf
    @method('DELETE')
    @can('obenang-delete')
    <button type="submit" class="btn icon btn-danger"><i class="bi bi-x-square"></i></button>
    @endcan
</form>