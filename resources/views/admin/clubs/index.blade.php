@extends('layouts.layoutMaster')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5>All Clubs</h5>
        <a href="/admin/create_club" class="btn btn-primary btn-sm">Add New Club</a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($clubs as $index => $club)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                @if($club->image)
                                    <img src="{{ asset('files/' . $club->image) }}" alt="{{ $club->name }}" class="rounded" style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <div class="bg-secondary rounded d-flex align-items-center justify-content-center text-white" style="width: 50px; height: 50px;">
                                        {{ substr($club->name ?? 'C', 0, 1) }}
                                    </div>
                                @endif
                            </td>
                            <td>
                                <strong>{{ $club->name ?? 'N/A' }}</strong>
                                @if($club->file)
                                    <br><small class="text-muted"><i class="fas fa-file-pdf"></i> Has PDF</small>
                                @endif
                            </td>
                            <td>
                                @if($club->category)
                                    <span class="badge bg-{{ $club->category == 'social' ? 'primary' : ($club->category == 'sports' ? 'success' : ($club->category == 'academic' ? 'info' : 'warning')) }}">
                                        {{ ucfirst($club->category) }}
                                    </span>
                                @else
                                    <span class="text-muted">N/A</span>
                                @endif
                            </td>
                            <td>{{ Str::limit(strip_tags($club->description), 100) ?? 'No description' }}</td>
                            <td>
                                <span class="badge bg-{{ $club->status == 'active' ? 'success' : ($club->status == 'draft' ? 'secondary' : 'danger') }}">
                                    {{ ucfirst($club->status) }}
                                </span>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($club->created_at)->format('M d, Y') }}</td>
                            <td>
                                <a href="/admin/show_club/{{ $club->id }}" class="btn btn-sm btn-outline-primary">View</a>
                                <a href="/admin/edit_club/{{ $club->id }}" class="btn btn-sm btn-info">Edit</a>

                                <form action="/admin/delete_club" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete this club?')">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $club->id }}">
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">No clubs found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
