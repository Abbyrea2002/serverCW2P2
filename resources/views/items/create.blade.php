@extends('items.layout')

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Add New Item</h2>
    <div class="card-body">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('items.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>

        <form action="{{ route('items.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="inputTitle" class="form-label"><strong>Title:</strong></label>
                <input
                    type="text"
                    name="title"
                    class="form-control @error('title') is-invalid @enderror"
                    id="inputTitle"
                    value="{{old('title')}}">
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
                    id="inputDescription"
                    placeholder="Description">{{old('description')}}</textarea>
                @error('desctiption')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputQuantity" class="form-label"><strong>Quantity:</strong></label>
                <input
                    type="text"
                    name="quantity"
                    class="form-control @error('quantity') is-invalid @enderror"
                    id="inputQuantity"
                    placeholder="{{old('quantity')}}">
                @error('quantity')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
        </form>

    </div>
</div>
@endsection
