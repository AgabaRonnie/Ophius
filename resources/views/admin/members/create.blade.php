@extends('layouts.layoutMaster')

@section('content')
  <div class="container mt-4">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Create New Member</h5>
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

        <form action="{{ url('/admin/store_member') }}" method="POST" enctype="multipart/form-data" id="member-form">
          @csrf

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Type</label>
                <select name="type" class="form-select" required>
                  <option value="">-- Select Type --</option>
                  <option value="Mentor" {{ old('type') == 'Mentor' ? 'selected' : '' }}>Mentor</option>
                  <option value="Volunteer" {{ old('type') == 'Volunteer' ? 'selected' : '' }}>Volunteer</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Photo</label>
            <input type="file" name="photo" class="form-control" accept="image/*">
            <small class="form-text text-muted">Upload a profile photo for the member (optional)</small>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Experience</label>
                <input type="text" name="experience" class="form-control" value="{{ old('experience') }}">
                <small class="form-text text-muted">e.g., "5 years in Software Development"</small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Mentorship Area</label>
                <input type="text" name="mentorship_area" class="form-control" value="{{ old('mentorship_area') }}">
                <small class="form-text text-muted">e.g., "Career Development, Technical Skills"</small>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="mb-3">
                <label class="form-label">Mentorship Format</label>
                <input type="text" name="mentorship_format" class="form-control" value="{{ old('mentorship_format') }}">
                <small class="form-text text-muted">e.g., "Online, In-person"</small>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <label class="form-label">Mentorship Frequency</label>
                <input type="text" name="mentorship_frequency" class="form-control" value="{{ old('mentorship_frequency') }}">
                <small class="form-text text-muted">e.g., "Weekly, Bi-weekly"</small>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <label class="form-label">Mentored Before</label>
                <select name="mentored_before" class="form-select">
                  <option value="">-- Select --</option>
                  <option value="1" {{ old('mentored_before') == '1' ? 'selected' : '' }}>Yes</option>
                  <option value="0" {{ old('mentored_before') == '0' ? 'selected' : '' }}>No</option>
                </select>
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">About</label>
            <textarea name="about" class="form-control" rows="4">{{ old('about') }}</textarea>
            <small class="form-text text-muted">Brief description about the member</small>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">LinkedIn</label>
                <input type="url" name="linkedin" class="form-control" value="{{ old('linkedin') }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">X (Twitter)</label>
                <input type="url" name="x" class="form-control" value="{{ old('x') }}">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Facebook</label>
                <input type="url" name="facebook" class="form-control" value="{{ old('facebook') }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Website</label>
                <input type="url" name="website" class="form-control" value="{{ old('website') }}">
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
              <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
              <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
              <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary">Create Member</button>
          <a href="{{ url('admin/members') }}" class="btn btn-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </div>
@endsection
