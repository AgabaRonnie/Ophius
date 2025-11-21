@extends('layouts.layoutMaster')

@section('content')
  <div class="container mt-4">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Edit Member: {{ $member->name }}</h5>
        <div>
          <a href="{{ url('admin/show_member/' . $member->id) }}" class="btn btn-sm btn-info">View Member</a>
        </div>
      </div>

      <div class="card-body">
        {{-- Display validation errors --}}
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        {{-- Display success message --}}
        @if (session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
        @endif

        <form action="{{ url('/admin/member/update/' . $member->id) }}" method="POST" enctype="multipart/form-data" id="member-form">
          @csrf

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required value="{{ old('name', $member->name) }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Type</label>
                <select name="type" class="form-select" required>
                  <option value="">-- Select Type --</option>
                  <option value="Mentor" {{ old('type', $member->type) == 'Mentor' ? 'selected' : '' }}>Mentor</option>
                  <option value="Volunteer" {{ old('type', $member->type) == 'Volunteer' ? 'selected' : '' }}>Volunteer</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $member->email) }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $member->phone) }}">
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Photo</label>
            @if($member->photo)
              <div class="mb-2">
                <img src="{{ asset('files/' . $member->photo) }}" alt="Current photo" class="img-thumbnail" style="max-width: 200px;">
                <p class="small text-muted">Current photo</p>
              </div>
            @endif
            <input type="file" name="photo" class="form-control" accept="image/*">
            <small class="form-text text-muted">
              Upload a new photo to replace the current one (optional). Leave empty to keep current photo.
            </small>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Experience</label>
                <input type="text" name="experience" class="form-control" value="{{ old('experience', $member->experience) }}">
                <small class="form-text text-muted">e.g., "5 years in Software Development"</small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Mentorship Area</label>
                <input type="text" name="mentorship_area" class="form-control" value="{{ old('mentorship_area', $member->mentorship_area) }}">
                <small class="form-text text-muted">e.g., "Career Development, Technical Skills"</small>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="mb-3">
                <label class="form-label">Mentorship Format</label>
                <input type="text" name="mentorship_format" class="form-control" value="{{ old('mentorship_format', $member->mentorship_format) }}">
                <small class="form-text text-muted">e.g., "Online, In-person"</small>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <label class="form-label">Mentorship Frequency</label>
                <input type="text" name="mentorship_frequency" class="form-control" value="{{ old('mentorship_frequency', $member->mentorship_frequency) }}">
                <small class="form-text text-muted">e.g., "Weekly, Bi-weekly"</small>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <label class="form-label">Mentored Before</label>
                <select name="mentored_before" class="form-select">
                  <option value="">-- Select --</option>
                  <option value="1" {{ old('mentored_before', $member->mentored_before) == '1' ? 'selected' : '' }}>Yes</option>
                  <option value="0" {{ old('mentored_before', $member->mentored_before) == '0' ? 'selected' : '' }}>No</option>
                </select>
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">About</label>
            <textarea name="about" class="form-control" rows="4">{{ old('about', $member->about) }}</textarea>
            <small class="form-text text-muted">Brief description about the member</small>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">LinkedIn</label>
                <input type="url" name="linkedin" class="form-control" value="{{ old('linkedin', $member->linkedin) }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">X (Twitter)</label>
                <input type="url" name="x" class="form-control" value="{{ old('x', $member->x) }}">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Facebook</label>
                <input type="url" name="facebook" class="form-control" value="{{ old('facebook', $member->facebook) }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Website</label>
                <input type="url" name="website" class="form-control" value="{{ old('website', $member->website) }}">
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
              <option value="active" {{ old('status', $member->status) == 'active' ? 'selected' : '' }}>Active</option>
              <option value="inactive" {{ old('status', $member->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
              <option value="pending" {{ old('status', $member->status) == 'pending' ? 'selected' : '' }}>Pending</option>
            </select>
          </div>

          {{-- Additional info section --}}
          <div class="mb-3">
            <div class="row">
              <div class="col-md-6">
                <small class="text-muted">
                  <strong>Created:</strong> {{ $member->created_at->format('M j, Y g:i A') }}
                </small>
              </div>
              <div class="col-md-6">
                <small class="text-muted">
                  <strong>Last Updated:</strong> {{ $member->updated_at->format('M j, Y g:i A') }}
                </small>
              </div>
            </div>
          </div>

          <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Update Member</button>
            <a href="{{ url('admin/members') }}" class="btn btn-secondary">Cancel</a>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
              Delete Member
            </button>
          </div>
        </form>
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
