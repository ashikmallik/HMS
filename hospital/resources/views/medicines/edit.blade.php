@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Edit Medicine</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Please fix the following issues:<br><br>
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('medicines.update', $medicine) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row g-3">
            <div class="col-md-6">
                <label for="name" class="form-label">Medicine Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $medicine->name) }}" required>
            </div>
            <div class="col-md-6">
                <label for="generic" class="form-label">Generic Name</label>
                <input type="text" name="generic" class="form-control" value="{{ old('generic', $medicine->generic) }}">
            </div>
            <div class="col-md-6">
                <label for="type" class="form-label">Type</label>
                <input type="text" name="type" class="form-control" value="{{ old('type', $medicine->type) }}" required>
            </div>
            <div class="col-md-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $medicine->price) }}" required>
            </div>
            <div class="col-md-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" name="stock" class="form-control" value="{{ old('stock', $medicine->stock) }}" required>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('medicines.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
