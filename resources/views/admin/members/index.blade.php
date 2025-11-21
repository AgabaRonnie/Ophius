@extends('layouts.layoutMaster')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5>All Members</h5>
        <a href="/admin/create_member" class="btn btn-primary btn-sm">Add New Member</a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($members as $index => $member)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                @if($member->photo)
                                    <img src="{{ asset('files/' . $member->photo) }}" alt="{{ $member->name }}" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                                @else
                                    <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 40px; height: 40px;">
                                        {{ substr($member->name ?? 'N', 0, 1) }}
                                    </div>
                                @endif
                            </td>
                            <td>{{ $member->name ?? 'N/A' }}</td>
                            <td>
                                <span class="badge bg-{{ $member->type == 'Mentor' ? 'primary' : 'info' }}">
                                    {{ $member->type ?? 'N/A' }}
                                </span>
                            </td>
                            <td>{{ $member->email ?? 'N/A' }}</td>
                            <td>{{ $member->phone ?? 'N/A' }}</td>
                            <td>
                                <span class="badge bg-{{ $member->status == 'active' ? 'success' : ($member->status == 'pending' ? 'warning' : 'secondary') }}">
                                    {{ ucfirst($member->status) }}
                                </span>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($member->created_at)->format('M d, Y') }}</td>
                            <td>
                                <a href="/admin/show_member/{{ $member->id }}" class="btn btn-sm btn-outline-primary mb-2">View</a>
                                <a href="/admin/edit_member/{{ $member->id }}" class="btn btn-sm btn-info mb-2">Edit</a>

                                <form action="/admin/delete_member" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete this member?')">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $member->id }}">
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty

                        <tr>
                            <td colspan="9" class="text-center text-muted">No members found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
