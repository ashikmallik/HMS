@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #f0f4f8, #d9e2ec);
    }
    .form-card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 8px 24px rgb(99 99 99 / 0.2);
        padding: 30px;
        max-width: 700px;
        margin: 40px auto;
    }
    h2 {
        color: #334e68;
        font-weight: 700;
        margin-bottom: 30px;
    }
    label {
        font-weight: 600;
        color: #486581;
    }
    .btn-primary {
        background-color: #3b82f6;
        border: none;
    }
    .btn-primary:hover {
        background-color: #2563eb;
    }
</style>

<div class="form-card">
    <h2>➕ Add New Medicine</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Please fix the following errors:<br><br>
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('medicines.store') }}" method="POST">
        @csrf

        <div class="row g-3">
            <div class="col-md-6">
                <label for="name">Medicine Name <span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="col-md-6">
                <label for="type">Type</label>
                <input type="text" name="type" id="type" class="form-control" value="{{ old('type') }}" placeholder="e.g., Tablet, Syrup">
            </div>

            <div class="col-md-6">
                <label for="manufacturer">Manufacturer</label>
                <input type="text" name="manufacturer" id="manufacturer" class="form-control" value="{{ old('manufacturer') }}" placeholder="Company name">
            </div>

            <div class="col-md-6">
                <label for="unit">Unit</label>
                <input type="text" name="unit" id="unit" class="form-control" value="{{ old('unit') }}" placeholder="e.g., Tablet, Packet">
            </div>

            <div class="col-md-4">
                <label for="stock">Stock <span class="text-danger">*</span></label>
                <input type="number" name="stock" id="stock" class="form-control" min="0" value="{{ old('stock', 0) }}" required>
            </div>

            <div class="col-md-4">
                <label for="price">Price (৳) <span class="text-danger">*</span></label>
                <input type="number" name="price" id="price" class="form-control" step="0.01" min="0" value="{{ old('price', 0) }}" required>
            </div>

            <div class="col-md-4">
                <label for="purchase_price">Purchase Price (৳)</label>
                <input type="number" name="purchase_price" id="purchase_price" class="form-control" step="0.01" min="0" value="{{ old('purchase_price', 0) }}">
            </div>

            <div class="col-md-6">
                <label for="expiry_date">Expiry Date</label>
                <input type="date" name="expiry_date" id="expiry_date" class="form-control" value="{{ old('expiry_date') }}">
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Add Medicine
            </button>
            <a href="{{ route('medicines.index') }}" class="btn btn-secondary ms-2">Cancel</a>
        </div>
    </form>
</div>
@endsection
