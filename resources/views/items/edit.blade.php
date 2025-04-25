@extends('items.layout')

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Edit Item</h2>
    <div class="card-body">

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('items.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>

        <form action="{{ route('items.update',$item) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="inputTitle" class="form-label"><strong>Title:</strong></label>
                <input
                    type="text"
                    name="title"
                    value="{{ $item->title }}"
                    class="form-control @error('title') is-invalid @enderror"
                    id="inputTitle">
                @error('title')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
                </div>

<div class="mb-3">
    <label for="inputDescription" class="form-label"><strong>Description:</strong></label>
    <textarea
        class="form-control @error('description') is-invalid @enderror"
        style="height:150px"
        name="description"
        id="inputDescription">{{ $item->description }}</textarea>
    @error('desctiption')
        <div class="form-text text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="inputQuantity" class="form-label"><strong>Quantity:</strong></label>
    <input
        type="text"
        name="quantity"
        value = "{{ $item->quantity }}"
        class="form-control @error('quantity') is-invalid @enderror"
        id="inputQuantity">
    @error('quantity')
        <div class="form-text text-danger">{{ $message }}</div>
    @enderror
</div>
<button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Update</button>
</form>

</div>
</div>
@endsection
