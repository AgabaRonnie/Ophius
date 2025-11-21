@extends('layouts.layoutMaster')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Session Details: {{ $session->title }}</h5>
            <div>
                <a href="/admin/edit_session/{{ $session->id }}" class="btn btn-sm btn-info">Edit Session</a>
                <a href="/admin/sessions" class="btn btn-sm btn-secondary">Back to Sessions</a>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                {{-- Left Column --}}
                <div class="col-md-8">
                    {{-- Session Image --}}
                    @if($session->image)
                    <div class="mb-4">
                        <img src="{{ asset('files/' . $session->image) }}" alt="{{ $session->title }}" class="img-fluid rounded" style="max-height: 300px; width: 100%; object-fit: cover;">
                    </div>
                    @endif

                    {{-- Description --}}
                    <div class="mb-4">
                        <h6 class="text-muted mb-2">Description</h6>
                        <div class="border rounded p-3 bg-light">
                            @if($session->description)
                                {!! $session->description !!}
                            @else
                                <p class="text-muted">No description provided.</p>
                            @endif
                        </div>
                    </div>

                    {{-- Schedule Information --}}
                    <div class="mb-4">
                        <h6 class="text-muted mb-3">Schedule Information</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="border rounded p-3 mb-3">
                                    <strong>Start Date & Time:</strong><br>
                                    @if($session->start_date)
                                        {{ \Carbon\Carbon::parse($session->start_date)->format('M d, Y') }}
                                        @if($session->start_time)
                                            at {{ \Carbon\Carbon::parse($session->start_time)->format('g:i A') }}
                                        @endif
                                    @else
                                        <span class="text-muted">Not set</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="border rounded p-3 mb-3">
                                    <strong>End Date & Time:</strong><br>
                                    @if($session->end_date)
                                        {{ \Carbon\Carbon::parse($session->end_date)->format('M d, Y') }}
                                        @if($session->end_time)
                                            at {{ \Carbon\Carbon::parse($session->end_time)->format('g:i A') }}
                                        @endif
                                    @else
                                        <span class="text-muted">Not set</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @if($session->duration)
                        <div class="border rounded p-3 mb-3">
                            <strong>Duration:</strong> {{ $session->duration }}
                        </div>
                        @endif
                    </div>

                    {{-- Venue Information --}}
                    @if($session->venue)
                    <div class="mb-4">
                        <h6 class="text-muted mb-2">Venue</h6>
                        <div class="border rounded p-3 bg-light">
                            <i class="fas fa-map-marker-alt me-2"></i>{{ $session->venue }}
                        </div>
                    </div>
                    @endif
                </div>

                {{-- Right Column --}}
                <div class="col-md-4">
                    {{-- Status & Basic Info --}}
                    <div class="card mb-4">
                        <div class="card-header">
                            <h6 class="mb-0">Session Info</h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <strong>Status:</strong><br>
                                <span class="badge bg-{{ $session->status == 'active' ? 'success' : ($session->status == 'draft' ? 'secondary' : ($session->status == 'running' ? 'primary' : 'danger')) }} fs-6">
                                    {{ ucfirst($session->status) }}
                                </span>
                            </div>

                            @if($session->method)
                            <div class="mb-3">
                                <strong>Method:</strong><br>
                                <span class="badge bg-{{ $session->method == 'online' ? 'info' : ($session->method == 'offline' ? 'success' : 'warning') }} fs-6">
                                    {{ ucfirst($session->method) }}
                                </span>
                            </div>
                            @endif

                            <div class="mb-3">
                                <strong>Fee:</strong><br>
                                <span class="fs-5 {{ $session->fee > 0 ? 'text-primary' : 'text-success' }}">
                                    {{ $session->fee > 0 ? '$' . number_format($session->fee) : 'Free' }}
                                </span>
                            </div>

                            @if($session->speaker)
                            <div class="mb-3">
                                <strong>Speaker:</strong><br>
                                {{ $session->speaker }}
                            </div>
                            @endif

                            @if($session->category)
                            <div class="mb-3">
                                <strong>Category Type:</strong><br>
                                <span class="badge bg-primary">{{ ucfirst($session->category) }}</span>
                            </div>
                            @endif
                        </div>
                    </div>

                    {{-- Additional Information --}}
                    <div class="card mb-4">
                        <div class="card-header">
                            <h6 class="mb-0">Additional Details</h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <strong>Slug:</strong><br>
                                <code>{{ $session->slug ?? 'Not generated' }}</code>
                            </div>

                            <div class="mb-3">
                                <strong>Created:</strong><br>
                                <small>{{ $session->created_at->format('M j, Y g:i A') }}</small>
                            </div>

                            <div class="mb-3">
                                <strong>Last Updated:</strong><br>
                                <small>{{ $session->updated_at->format('M j, Y g:i A') }}</small>
                            </div>
                        </div>
                    </div>

                    {{-- Quick Actions --}}
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0">Quick Actions</h6>
                        </div>
                        <div class="card-body d-grid gap-2">
                            @if($session->status === 'draft')
                                <button class="btn btn-success btn-sm">Activate Session</button>
                            @elseif($session->status === 'active')
                                <button class="btn btn-primary btn-sm">Start Session</button>
                            @endif

                            <button class="btn btn-info btn-sm">
                                <i class="fas fa-users me-1"></i>View Participants
                            </button>

                            <button class="btn btn-warning btn-sm">
                                <i class="fas fa-bell me-1"></i>Send Notification
                            </button>

                            <hr>

                            <form action="/admin/delete_session" method="POST" onsubmit="return confirm('Are you sure you want to delete this session?')">
                                @csrf
                                <input type="hidden" name="id" value="{{ $session->id }}">
                                <button type="submit" class="btn btn-danger btn-sm w-100">
                                    <i class="fas fa-trash me-1"></i>Delete Session
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
