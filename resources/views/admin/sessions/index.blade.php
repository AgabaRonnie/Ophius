@extends('layouts.layoutMaster')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5>All Sessions</h5>
        <a href="/admin/create_session" class="btn btn-primary btn-sm">Add New Session</a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Speaker</th>
                            <th>Method</th>
                            <th>Fee</th>
                            <th>Start Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($sessions as $index => $session)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $session->title }}</td>
                            <td>{{ $session->speaker ?? 'N/A' }}</td>
                            <td>
                                @if($session->method)
                                    <span class="badge bg-{{ $session->method == 'online' ? 'info' : ($session->method == 'offline' ? 'success' : 'warning') }}">
                                        {{ ucfirst($session->method) }}
                                    </span>
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>{{ $session->fee > 0 ? '$' . number_format($session->fee) : 'Free' }}</td>
                            <td>{{ $session->start_date ? \Carbon\Carbon::parse($session->start_date)->format('M d, Y') : 'N/A' }}</td>
                            <td>
                                <span class="badge bg-{{ $session->status == 'active' ? 'success' : ($session->status == 'draft' ? 'secondary' : ($session->status == 'running' ? 'primary' : 'danger')) }}">
                                    {{ ucfirst($session->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="/admin/sessions/{{ $session->id }}" class="btn btn-sm btn-success mb-2">View</a>
                                <a href="/admin/edit_session/{{ $session->id }}" class="btn btn-sm btn-info mb-2">Edit</a>

                                <form action="/admin/delete_session" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete this session?')">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $session->id }}">
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">No sessions found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
