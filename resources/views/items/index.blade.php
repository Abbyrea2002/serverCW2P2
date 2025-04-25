@extends('items.layout')

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Laravel CRUD</h2>
    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('items.create') }}"><i class="fa fa-plus"></i> Create New Item</a>
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description </th>
                    <th>Quantity</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>
                                <a class="btn btn-info btn-sm" href="{{ route('items.show',$item) }}"><i class="fa-solid fa-list"></i> Show</a>
                                <a class="btn btn-primary btn-sm" href="{{ route('items.edit',$item) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                <form action="{{ route('items.destroy', $item) }}" method="post">
                                    @csrf    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                                </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">There are no data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {!! $items->links() !!}

    </div>
</div>
@endsection
