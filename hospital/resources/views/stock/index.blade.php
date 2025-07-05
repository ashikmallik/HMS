@extends('layouts.app')

@section('content')
<style>
    /* আগের মতো সুন্দর ডিজাইন থাকবে */
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
        cursor: pointer;
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

        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="stock-box text-center" data-bs-toggle="modal" data-bs-target="#stockInModal" title="Add Stock">
                    <div class="stock-icon mb-2"><i class="bi bi-box-arrow-in-down"></i></div>
                    <div class="stock-count">{{ $stockIn ?? '0' }}</div>
                    <div>Stock In</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stock-box text-center" data-bs-toggle="modal" data-bs-target="#stockOutModal" title="Use Stock">
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
                            <th>Total Stock</th> <!-- নতুন -->
                            <th>Today's Stock In</th> <!-- নতুন -->
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
                            <td>{{ $activity->medicine->stock ?? 0 }}</td>
                            <td>{{ $todaysStockInCounts[$activity->medicine_id] ?? 0 }}</td>
                            <td>{{ $activity->user->name ?? 'System' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-muted text-center">No stock activity available.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

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
            <td>{{ $activity->medicine->stock ?? 0 }}</td>
            <td>{{ $todaysStockInCounts[$activity->medicine_id] ?? 0 }}</td>
            <td>{{ $activity->user->name ?? 'System' }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-muted text-center">No stock activity available.</td>
        </tr>
        @endforelse
    </tbody>
</table>

            </div>
        </div>
    </div>
</div>

<!-- Stock In Modal -->
<div class="modal fade" id="stockInModal" tabindex="-1" aria-labelledby="stockInModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('stock.in.store') }}" method="POST">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="stockInModalLabel">Add Stock (Stock In)</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="medicine_id_in" class="form-label">Select Medicine</label>
            <select name="medicine_id" id="medicine_id_in" class="form-select" required>
              <option value="">-- Select Medicine --</option>
              @foreach($medicines as $medicine)
                <option value="{{ $medicine->id }}">{{ $medicine->name }} (Stock: {{ $medicine->stock }})</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="quantity_in" class="form-label">Quantity</label>
            <input type="number" name="quantity" id="quantity_in" class="form-control" min="1" required>
          </div>
          <div class="mb-3">
            <label for="note_in" class="form-label">Note (optional)</label>
            <textarea name="note" id="note_in" class="form-control" rows="2"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Add Stock</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Stock Out Modal -->
<div class="modal fade" id="stockOutModal" tabindex="-1" aria-labelledby="stockOutModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('stock.out.store') }}" method="POST">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="stockOutModalLabel">Use Stock (Stock Out)</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="medicine_id_out" class="form-label">Select Medicine</label>
            <select name="medicine_id" id="medicine_id_out" class="form-select" required>
              <option value="">-- Select Medicine --</option>
              @foreach($medicines as $medicine)
                <option value="{{ $medicine->id }}">{{ $medicine->name }} (Stock: {{ $medicine->stock }})</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="quantity_out" class="form-label">Quantity</label>
            <input type="number" name="quantity" id="quantity_out" class="form-control" min="1" required>
          </div>
          <div class="mb-3">
            <label for="note_out" class="form-label">Note (optional)</label>
            <textarea name="note" id="note_out" class="form-control" rows="2"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger">Use Stock</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
