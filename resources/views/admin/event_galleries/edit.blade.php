@extends('layouts.layoutMaster')

@section('content')
  <div class="container mt-4">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Edit Gallery Media: {{ $eventGallery->title ?? 'Untitled' }}</h5>
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

        <form action="{{ url('/admin/event_gallery/update/' . $eventGallery->id) }}" method="POST" enctype="multipart/form-data" id="gallery-form">
          @csrf

          <div class="row">
           {{-- <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Event ID</label>
                <input type="number" name="event_id" class="form-control" required value="{{ old('event_id', $eventGallery->event_id) }}">
                <small class="form-text text-muted">Enter the event ID this media belongs to</small>
              </div>
            </div>--}}


            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Event</label>
                <select name="event_id" class="form-select" required>
                  <option value="">-- Select Event --</option>
                  @foreach($events as $event)
                    <option value="{{ $event->id }}" {{ old('event_id', $eventGallery->event_id) == $event->id ? 'selected' : '' }}>
                      {{ $event->name }}
                    </option>
                  @endforeach
                </select>
                <small class="form-text text-muted">Select the event this media belongs to</small>
              </div>
            </div>


            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Category</label>
                <input type="text" name="category" class="form-control" value="{{ old('category', $eventGallery->category) }}">
                <small class="form-text text-muted">e.g., "Event Photos", "Highlights", "Behind the Scenes"</small>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $eventGallery->title) }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Subtitle</label>
                <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle', $eventGallery->subtitle) }}">
              </div>
            </div>
          </div>

          {{-- Current Media Display --}}
          @if($eventGallery->file || $eventGallery->video_link)
          <div class="mb-3">
            <label class="form-label">Current Media</label>
            <div class="border rounded p-3">
              @if($eventGallery->file)
                @php
                  $fileExtension = pathinfo($eventGallery->file, PATHINFO_EXTENSION);
                  $videoExtensions = ['mp4', 'avi', 'mov', 'wmv', 'flv', 'webm'];
                @endphp

                @if(in_array(strtolower($fileExtension), $videoExtensions))
                  <video controls style="max-width: 300px; max-height: 200px;">
                    <source src="{{ asset('files/' . $eventGallery->file) }}" type="video/{{ $fileExtension }}">
                    Your browser does not support the video tag.
                  </video>
                  <p class="small text-muted mt-2">Current video file</p>
                @else
                  <img src="{{ asset('files/' . $eventGallery->file) }}" alt="Current media" class="img-thumbnail" style="max-width: 300px;">
                  <p class="small text-muted mt-2">Current image file</p>
                @endif
              @elseif($eventGallery->video_link)
                <div class="d-flex align-items-center">
                  <i class="fas fa-video fa-2x text-primary me-3"></i>
                  <div>
                    <strong>Video Link:</strong><br>
                    <a href="{{ $eventGallery->video_link }}" target="_blank" class="text-truncate">{{ $eventGallery->video_link }}</a>
                  </div>
                </div>
              @endif
            </div>
          </div>
          @endif

          <div class="mb-3">
            <label class="form-label">Media File (Image or Video)</label>
            <input type="file" name="file" class="form-control" accept="image/*,video/*">
            <small class="form-text text-muted">
              Upload a new image or video file to replace the current one (optional). Leave empty to keep current media.
            </small>
          </div>

          <div class="mb-3">
            <label class="form-label">Video Link (Alternative)</label>
            <input type="url" name="video_link" class="form-control" value="{{ old('video_link', $eventGallery->video_link) }}">
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
              <option value="draft" {{ old('status', $eventGallery->status) == 'draft' ? 'selected' : '' }}>Draft</option>
              <option value="published" {{ old('status', $eventGallery->status) == 'published' ? 'selected' : '' }}>Published</option>
              <option value="archived" {{ old('status', $eventGallery->status) == 'archived' ? 'selected' : '' }}>Archived</option>
            </select>
          </div>

          {{-- Additional info section --}}
          <div class="mb-3">
            <div class="row">
              <div class="col-md-6">
                <small class="text-muted">
                  <strong>Created:</strong> {{ $eventGallery->created_at->format('M j, Y g:i A') }}
                </small>
              </div>
              <div class="col-md-6">
                <small class="text-muted">
                  <strong>Last Updated:</strong> {{ $eventGallery->updated_at->format('M j, Y g:i A') }}
                </small>
              </div>
            </div>
          </div>

          <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Update Media</button>
            <a href="{{ url('admin/event_galleries') }}" class="btn btn-secondary">Cancel</a>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
              Delete Media
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
          <h5 class="modal-title" id="deleteModalLabel">Delete Gallery Media</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete this media?</p>
          <p><strong>{{ $eventGallery->title ?? 'Untitled Media' }}</strong></p>
          <p class="text-danger">This action cannot be undone.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <form action="/admin/delete_event_gallery" method="POST" class="d-inline">
            @csrf
            <input type="hidden" name="id" value="{{ $eventGallery->id }}">
            <button type="submit" class="btn btn-danger">Delete Media</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
