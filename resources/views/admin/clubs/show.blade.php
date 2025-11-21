@extends('layouts.layoutMaster')

@section('content')
  <div class="container mt-4">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Club Details: {{ $club->name }}</h5>
        <div>
          <a href="{{ url('admin/edit_club/' . $club->id) }}" class="btn btn-sm btn-info">Edit Club</a>
          <a href="{{ url('admin/clubs') }}" class="btn btn-sm btn-secondary">Back to List</a>
        </div>
      </div>

      <div class="card-body">
        <div class="row">
          <!-- Club Image and Basic Info -->
          <div class="col-md-4">
            <div class="text-center mb-4">
              @if($club->image)
                <img src="{{ asset('files/' . $club->image) }}" alt="{{ $club->name }}" class="img-thumbnail mb-3" style="max-width: 100%; height: 250px; object-fit: cover;">
              @else
                <div class="bg-secondary rounded d-flex align-items-center justify-content-center text-white mb-3" style="width: 100%; height: 250px;">
                  <span style="font-size: 4rem;">{{ substr($club->name ?? 'C', 0, 1) }}</span>
                </div>
              @endif

              <h4>{{ $club->name ?? 'N/A' }}</h4>

              @if($club->category)
                <span class="badge bg-{{ $club->category == 'social' ? 'primary' : ($club->category == 'sports' ? 'success' : ($club->category == 'academic' ? 'info' : 'warning')) }} mb-2">
                  {{ ucfirst($club->category) }}
                </span>
                <br>
              @endif

              <span class="badge bg-{{ $club->status == 'active' ? 'success' : ($club->status == 'draft' ? 'secondary' : 'danger') }}">
                {{ ucfirst($club->status) }}
              </span>

              @if($club->file)
                <div class="mt-3">
                  <a href="{{ asset('files/' . $club->file) }}" target="_blank" class="btn btn-outline-danger btn-sm">
                    <i class="fas fa-file-pdf"></i> View PDF Document
                  </a>
                </div>
              @endif
            </div>
          </div>

          <!-- Detailed Information -->
          <div class="col-md-8">
            @if($club->description)
            <div class="mb-4">
              <h6><strong>Description:</strong></h6>
              <div class="border rounded p-3 bg-light">
                {!! $club->description !!}
              </div>
            </div>
            @endif

            @if($club->benefits)
            <div class="mb-4">
              <h6><strong>Club Benefits:</strong></h6>
              <div class="row">
                @php
                  $benefits = explode('||', $club->benefits);
                @endphp
                @foreach($benefits as $benefit)
                  @if(trim($benefit))
                    <div class="col-md-6 mb-2">
                      <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        <span>{{ trim($benefit) }}</span>
                      </div>
                    </div>
                  @endif
                @endforeach
              </div>
            </div>
            @endif

            <div class="row">
              <div class="col-md-12 mb-3">
                <strong>Slug:</strong>
                <p class="text-muted">{{ $club->slug ?? 'Not generated' }}</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Additional Info -->
        <hr>
        <div class="row">
          <div class="col-md-6">
            <small class="text-muted">
              <strong>Created:</strong> {{ $club->created_at->format('M j, Y g:i A') }}
            </small>
          </div>
          <div class="col-md-6">
            <small class="text-muted">
              <strong>Last Updated:</strong> {{ $club->updated_at->format('M j, Y g:i A') }}
            </small>
          </div>
        </div>

        <!-- Action Buttons -->
        <div class="mt-4">
          <a href="{{ url('admin/edit_club/' . $club->id) }}" class="btn btn-primary">Edit Club</a>
          <a href="{{ url('admin/clubs') }}" class="btn btn-secondary">Back to Clubs</a>
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
            Delete Club
          </button>
        </div>
      </div>
    </div>
  </div>

  {{-- Delete Confirmation Modal --}}
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Delete Club</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete this club?</p>
          <p><strong>{{ $club->name }}</strong></p>
          <p class="text-danger">This action cannot be undone.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <form action="/admin/delete_club" method="POST" class="d-inline">
            @csrf
            <input type="hidden" name="id" value="{{ $club->id }}">
            <button type="submit" class="btn btn-danger">Delete Club</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
