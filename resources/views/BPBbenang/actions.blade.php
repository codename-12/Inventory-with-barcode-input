<form action="{{ route('BPBbenang.destroy',$id) }}" method="POST">
    @can('BPBbenang-edit')
    <a href="{{ route('BPBbenang.edit',$id) }}" class="btn icon btn-primary">
        <i class="bi bi-pencil-square"></i></a>
    @endcan

    @csrf
    @method('DELETE')
    @can('BPBbenang-delete')
    <button type="submit" class="btn icon btn-danger"><i class="bi bi-x-square"></i></button>
    @endcan
</form>