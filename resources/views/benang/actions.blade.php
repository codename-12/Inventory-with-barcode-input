<form action="{{ route('benang.destroy',$id) }}" method="POST">
    <a class="btn btn-info" href="{{ route('benang.show',$id) }}">Show</a>
    @can('benang-edit')
    <button type="button" class="btn btn-primary edit" data-id="{{ $id }}"><i class="bi bi-pencil-square"></button><a class="btn icon btn-primary" href="{{ route('benang.edit',$benang->id) }}"><i class="bi bi-pencil-square"></i></a>
    @endcan

    @csrf
    @method('DELETE')
    @can('benang-delete')
    <button type="submit" class="btn icon btn-danger"><i class="bi bi-x-square"></i></button>
    @endcan
</form>