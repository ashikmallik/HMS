@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(to right, #f0f4ff, #e3efff);
    }
    .medicine-card {
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        padding: 25px;
        transition: 0.3s;
    }
    .medicine-card:hover {
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
    }
    .table th, .table td {
        vertical-align: middle;
    }
</style>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

<div class="container py-5">
    <div class="medicine-card">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary">🧪 Medicine Inventory</h2>
            <div>
                <a href="" class="btn btn-outline-primary me-2">
                    <i class="bi bi-file-earmark-excel"></i> Export Excel
                </a>
                <a href="{{ route('medicines.create') }}" class="btn btn-success shadow-sm">
                    <i class="bi bi-plus-circle me-1"></i> Add New Medicine
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table id="medicineTable" class="table table-hover table-bordered align-middle">
                <thead class="table-primary text-center">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Generic</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($medicines as $medicine)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $medicine->name }}</td>
                            <td>{{ $medicine->generic ?? 'N/A' }}</td>
                            <td>{{ $medicine->type }}</td>
                            <td>৳ {{ number_format($medicine->price, 2) }}</td>
                            <td>{{ $medicine->stock }}</td>
                            <td class="text-center">
                                <a href="{{ route('medicines.edit', $medicine) }}" class="btn btn-sm btn-outline-warning">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="{{ route('medicines.destroy', $medicine) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash3"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">No medicines found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
    $('#medicineTable').DataTable();
});
</script>
@endsection
