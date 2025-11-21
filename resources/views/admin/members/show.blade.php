@extends('layouts.layoutMaster')

@section('content')
  <div class="container mt-4">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Member Details: {{ $member->name }}</h5>
        <div>
          <a href="{{ url('admin/edit_member/' . $member->id) }}" class="btn btn-sm btn-info">Edit Member</a>
          <a href="{{ url('admin/members') }}" class="btn btn-sm btn-secondary">Back to List</a>
        </div>
      </div>

      <div class="card-body">
        <div class="row">
          <!-- Photo and Basic Info -->
          <div class="col-md-4">
            <div class="text-center mb-4">
              @if($member->photo)
                <img src="{{ asset('files/' . $member->photo) }}" alt="{{ $member->name }}" class="img-thumbnail mb-3" style="max-width: 250px;">
              @else
                <div class="bg-secondary rounded d-flex align-items-center justify-content-center text-white mb-3" style="width: 250px; height: 250px; margin: 0 auto;">
                  <span style="font-size: 4rem;">{{ substr($member->name ?? 'N', 0, 1) }}</span>
                </div>
              @endif

              <h4>{{ $member->name ?? 'N/A' }}</h4>
              <span class="badge bg-{{ $member->type == 'Mentor' ? 'primary' : 'info' }} mb-2">
                {{ $member->type ?? 'N/A' }}
              </span>
              <br>
              <span class="badge bg-{{ $member->status == 'active' ? 'success' : ($member->status == 'pending' ? 'warning' : 'secondary') }}">
                {{ ucfirst($member->status) }}
              </span>
            </div>
          </div>

          <!-- Detailed Information -->
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-6 mb-3">
                <strong>Email:</strong>
                <p>{{ $member->email ?? 'Not provided' }}</p>
              </div>
              <div class="col-md-6 mb-3">
                <strong>Phone:</strong>
                <p>{{ $member->phone ?? 'Not provided' }}</p>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <strong>Experience:</strong>
                <p>{{ $member->experience ?? 'Not provided' }}</p>
              </div>
              <div class="col-md-6 mb-3">
                <strong>Mentorship Area:</strong>
                <p>{{ $member->mentorship_area ?? 'Not provided' }}</p>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4 mb-3">
                <strong>Format:</strong>
                <p>{{ $member->mentorship_format ?? 'Not provided' }}</p>
              </div>
              <div class="col-md-4 mb-3">
                <strong>Frequency:</strong>
                <p>{{ $member->mentorship_frequency ?? 'Not provided' }}</p>
              </div>
              <div class="col-md-4 mb-3">
                <strong>Mentored Before:</strong>
                <p>
                  @if($member->mentored_before === 1)
                    <span class="badge bg-success">Yes</span>
                  @elseif($member->mentored_before === 0)
                    <span class="badge bg-secondary">No</span>
                  @else
                    Not specified
                  @endif
                </p>
              </div>
            </div>

            @if($member->about)
            <div class="mb-3">
              <strong>About:</strong>
              <p>{{ $member->about }}</p>
            </div>
            @endif

            <!-- Social Links -->
            <div class="mb-3">
              <strong>Social Links:</strong>
              <div class="mt-2">
                @if($member->linkedin)
                  <a href="{{ $member->linkedin }}" target="_blank" class="btn btn-sm btn-outline-primary me-2">
                    <i class="fab fa-linkedin"></i> LinkedIn
                  </a>
                @endif
                @if($member->x)
                  <a href="{{ $member->x }}" target="_blank" class="btn btn-sm btn-outline-dark me-2">
                    <i class="fab fa-x-twitter"></i> X (Twitter)
                  </a>
                @endif
                @if($member->facebook)
                  <a href="{{ $member->facebook }}" target="_blank" class="btn btn-sm btn-outline-primary me-2">
                    <i class="fab fa-facebook"></i> Facebook
                  </a>
                @endif
                @if($member->website)
                  <a href="{{ $member->website }}" target="_blank" class="btn btn-sm btn-outline-info me-2">
                    <i class="fas fa-globe"></i> Website
                  </a>
                @endif
                @if(!$member->linkedin && !$member->x && !$member->facebook && !$member->website)
                  <span class="text-muted">No social links provided</span>
                @endif
              </div>
            </div>
          </div>
        </div>

        <!-- Additional Info -->
        <hr>
        <div class="row">
          <div class="col-md-6">
            <small class="text-muted">
              <strong>Member Since:</strong> {{ $member->created_at->format('M j, Y g:i A') }}
            </small>
          </div>
          <div class="col-md-6">
            <small class="text-muted">
              <strong>Last Updated:</strong> {{ $member->updated_at->format('M j, Y g:i A') }}
            </small>
          </div>
        </div>

        <!-- Action Buttons -->
        <div class="mt-4">
          <a href="{{ url('admin/edit_member/' . $member->id) }}" class="btn btn-primary">Edit Member</a>
          <a href="{{ url('admin/members') }}" class="btn btn-secondary">Back to Members</a>
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
            Delete Member
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
          <h5 class="modal-title" id="deleteModalLabel">Delete Member</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete this member?</p>
          <p><strong>{{ $member->name }}</strong></p>
          <p class="text-danger">This action cannot be undone.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <form action="/admin/delete_member" method="POST" class="d-inline">
            @csrf
            <input type="hidden" name="id" value="{{ $member->id }}">
            <button type="submit" class="btn btn-danger">Delete Member</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
