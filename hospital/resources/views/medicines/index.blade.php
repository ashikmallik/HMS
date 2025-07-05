@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(to right, #e0f7fa, #ede7f6);
    }
    .table-container {
        background: #fff;
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }
    .table thead th {
        background-color: #4527a0;
        color: #fff;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .table td, .table th {
        vertical-align: middle;
    }
    h2 {
        color: #311b92;
        font-weight: bold;
    }
</style>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="bi bi-capsule"></i> Medicine List</h2>
        <a href="{{ route('medicines.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add New Medicine
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-container">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Manufacturer</th>
                        <th>Unit</th>
                        <th>Stock</th>
                        <th>Price</th>
                        <th>Purchase Price</th>
                        <th>Expiry Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($medicines as $medicine)
                    <tr>
                        <td>{{ $medicine->id }}</td>
                        <td>{{ $medicine->name }}</td>
                        <td>{{ $medicine->type }}</td>
                        <td>{{ $medicine->manufacturer }}</td>
                        <td>{{ $medicine->unit }}</td>
                        <td>{{ $medicine->stock }}</td>
                        <td>{{ number_format($medicine->price, 2) }}</td>
                        <td>{{ number_format($medicine->purchase_price, 2) }}</td>
                        <td>{{ $medicine->expiry_date ? \Carbon\Carbon::parse($medicine->expiry_date)->format('d M Y') : 'N/A' }}</td>
                        <td>
                            <a href="{{ route('medicines.edit', $medicine) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('medicines.destroy', $medicine) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center text-muted">No medicines found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
