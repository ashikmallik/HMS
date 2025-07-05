@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(to right, #e3f2fd, #ede7f6);
    }
    .stock-dashboard {
        background: #fff;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        margin-top: 40px;
    }
    .stock-box {
        background: linear-gradient(135deg, #81d4fa, #9575cd);
        border-radius: 12px;
        color: #fff;
        padding: 20px;
        transition: 0.3s ease-in-out;
    }
    .stock-box:hover {
        transform: scale(1.03);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }
    .stock-icon {
        font-size: 2rem;
    }
    .stock-count {
        font-size: 2rem;
        font-weight: bold;
    }
    .section-title {
        font-weight: 800;
        color: #311b92;
    }
</style>

<div class="container">
    <div class="stock-dashboard">
        <h2 class="mb-4 section-title"><i class="bi bi-archive"></i> Stock Management Overview</h2>

        <div class="row g-4">
            <div class="col-md-3">
                <div class="stock-box text-center">
                    <div class="stock-icon mb-2"><i class="bi bi-box-arrow-in-down"></i></div>
                    <div class="stock-count">{{ $stockIn ?? '0' }}</div>
                    <div>Stock In</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stock-box text-center">
                    <div class="stock-icon mb-2"><i class="bi bi-box-arrow-up"></i></div>
                    <div class="stock-count">{{ $stockOut ?? '0' }}</div>
                    <div>Stock Out</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stock-box text-center">
                    <div class="stock-icon mb-2"><i class="bi bi-capsule"></i></div>
                    <div class="stock-count">{{ $totalItems ?? '0' }}</div>
                    <div>Total Items</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stock-box text-center">
                    <div class="stock-icon mb-2"><i class="bi bi-exclamation-triangle"></i></div>
                    <div class="stock-count">{{ $lowStock ?? '0' }}</div>
                    <div>Low Stock</div>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <h4 class="section-title">Recent Stock Activity</h4>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Item</th>
                            <th>Type</th>
                            <th>Quantity</th>
                            <th>User</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($activities as $activity)
                        <tr>
                            <td>{{ $activity->created_at->format('d M Y h:i A') }}</td>
                            <td>{{ $activity->medicine->name ?? 'N/A' }}</td>
                            <td>
                                <span class="badge {{ $activity->type == 'in' ? 'bg-success' : 'bg-danger' }}">
                                    {{ ucfirst($activity->type) }}
                                </span>
                            </td>
                            <td>{{ $activity->quantity }}</td>
                            <td>{{ $activity->user->name ?? 'System' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-muted text-center">No stock activity available.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection
