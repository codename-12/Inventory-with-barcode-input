<form action="{{ route('invoicebenang.destroy',$id) }}" method="POST">
    <a class="btn btn-info" href="{{ route('invoicebenang.show',$id) }}">Show</a>
    @can('invoicebenang-edit')
    <a class="btn icon btn-primary" href="{{ route('invoicebenang.edit',$id) }}"><i class="bi bi-pencil-square"></i></a>
    @endcan

    @csrf
    @method('DELETE')
    @can('invoicebenang-delete')
    <button type="submit" class="btn icon btn-danger"><i class="bi bi-x-square"></i></button>
    @endcan
</form>