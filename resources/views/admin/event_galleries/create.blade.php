@extends('layouts.layoutMaster')

@section('content')
  <div class="container mt-4">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Add New Media to Gallery</h5>
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

        <form action="{{ url('/admin/store_event_gallery') }}" method="POST" enctype="multipart/form-data" id="gallery-form">
          @csrf

          <div class="row">
           {{-- <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Event ID</label>
                <input type="number" name="event_id" class="form-control" required value="{{ old('event_id') }}">
                <small class="form-text text-muted">Enter the event ID this media belongs to</small>
              </div>
            </div>--}}

           {{-- drop down for events--}}
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Select Event</label>
                <select name="event_id" class="form-select" required>
                  <option value="">-- Select Event --</option>
                  @foreach($events as $event)
                    <option value="{{ $event->id }}" {{ old('event_id') == $event->id ? 'selected' : '' }}>
                      {{ $event->name }} (ID: {{ $event->id }})
                    </option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Category</label>
                <input type="text" name="category" class="form-control" value="{{ old('category') }}">
                <small class="form-text text-muted">e.g., "Event Photos", "Highlights", "Behind the Scenes"</small>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Subtitle</label>
                <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle') }}">
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Media File (Image or Video)</label>
            <input type="file" name="file" class="form-control" accept="image/*,video/*">
            <small class="form-text text-muted">
              Upload an image or video file. Supported formats: JPG, PNG, GIF, MP4, AVI, MOV, etc.
            </small>
          </div>

          <div class="mb-3">
            <label class="form-label">Video Link (Alternative)</label>
            <input type="url" name="video_link" class="form-control" value="{{ old('video_link') }}">
            <small class="form-text text-muted">
              If you prefer to link to an external video (YouTube, Vimeo, etc.) instead of uploading a file
            </small>
          </div>

          <div class="alert alert-info">
            <i class="fas fa-info-circle"></i>
            <strong>Note:</strong> You can either upload a file OR provide a video link, not both. If you provide both, the uploaded file will take priority.
          </div>

          <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
              <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
              <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
              <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Archived</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary">Add to Gallery</button>
          <a href="{{ url('admin/event_galleries') }}" class="btn btn-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </div>
@endsection
