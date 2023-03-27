<form action="{{ route('customerkain.destroy',$id) }}" method="POST">
    <a class="btn btn-info" href="{{ route('customerkain.show',$id) }}">Show</a>
    @can('customerkain-edit')
    <a class="btn icon btn-primary" href="{{ route('customerkain.edit',$id) }}"><i class="bi bi-pencil-square"></i></a>
    @endcan

    @csrf
    @method('DELETE')
    @can('customerkain-delete')
    <button type="submit" class="btn icon btn-danger"><i class="bi bi-x-square"></i></button>
    @endcan
</form>