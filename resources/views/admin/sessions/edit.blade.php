@extends('layouts.layoutMaster')

@section('vendor-style')
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/typography.css')}}"/>
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/editor.css')}}"/>
@endsection

@section('vendor-script')
  <script src="{{asset('assets/vendor/libs/quill/katex.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/quill/quill.js')}}"></script>
@endsection

@section('content')
  <div class="container mt-4">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Edit Session: {{ $session->title }}</h5>
        <div>
          <a href="{{ url('admin/sessions/' . $session->id) }}" class="btn btn-sm btn-info">View Session</a>
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

        <form action="{{ url('/admin/session/update/' . $session->id) }}" method="POST" enctype="multipart/form-data" id="session-form">
          @csrf

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" required value="{{ old('title', $session->title) }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Speaker</label>
                <input type="text" name="speaker" class="form-control" value="{{ old('speaker', $session->speaker) }}">
              </div>
            </div>
          </div>

         {{-- <div class="mb-3">
            <label class="form-label">Description</label>
            <div class="card">
              <div class="card-body">
                <div id="full-editor">
                  {!! old('description', $session->description) !!}
                </div>
                <input type="hidden" name="description" id="description-content">
              </div>
            </div>
          </div>--}}
          <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" placeholder="Enter session description here...">{{ old('description', $session->description) }}</textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Session Image</label>
            @if($session->image)
              <div class="mb-2">
                <img src="{{ asset('files/' . $session->image) }}" alt="Current session image" class="img-thumbnail" style="max-width: 200px;">
                <p class="small text-muted">Current session image</p>
              </div>
            @endif
            <input type="file" name="image" class="form-control" accept="image/*">
            <small class="form-text text-muted">Upload a new image to replace the current one (optional). Leave empty to keep current image.</small>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                  <option value="draft" {{ old('status', $session->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                  <option value="active" {{ old('status', $session->status) == 'active' ? 'selected' : '' }}>Active</option>
                  <option value="running" {{ old('status', $session->status) == 'running' ? 'selected' : '' }}>Running</option>
                  <option value="ended" {{ old('status', $session->status) == 'ended' ? 'selected' : '' }}>Ended</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <label class="form-label">Method</label>
                <select name="method" class="form-select">
                  <option value="">-- Select Method --</option>
                  <option value="online" {{ old('method', $session->method) == 'online' ? 'selected' : '' }}>Online</option>
                  <option value="offline" {{ old('method', $session->method) == 'offline' ? 'selected' : '' }}>Offline</option>
                  <option value="hybrid" {{ old('method', $session->method) == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <label class="form-label">Fee</label>
                <input type="number" name="fee" class="form-control" min="0" value="{{ old('fee', $session->fee) }}">
                <small class="form-text text-muted">Enter 0 for free sessions</small>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Duration</label>
                <input type="text" name="duration" class="form-control" value="{{ old('duration', $session->duration) }}" placeholder="e.g., 2 hours, 1 day, 3 weeks">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Venue</label>
                <input type="text" name="venue" class="form-control" value="{{ old('venue', $session->venue) }}" placeholder="Location or online platform">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Start Date</label>
                <input type="date" name="start_date" class="form-control" value="{{ old('start_date', $session->start_date) }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">End Date</label>
                <input type="date" name="end_date" class="form-control" value="{{ old('end_date', $session->end_date) }}">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Start Time</label>
                <input type="time" name="start_time" class="form-control" value="{{ old('start_time', $session->start_time) }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">End Time</label>
                <input type="time" name="end_time" class="form-control" value="{{ old('end_time', $session->end_time) }}">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Category Type</label>
                <select name="category" class="form-select">
                  <option value="">-- Select Category Type --</option>
                  <option value="course" {{ old('category', $session->category) == 'course' ? 'selected' : '' }}>Course</option>
                  <option value="coaching" {{ old('category', $session->category) == 'coaching' ? 'selected' : '' }}>Coaching</option>
                  <option value="seminar" {{ old('category', $session->category) == 'seminar' ? 'selected' : '' }}>Seminar</option>
                </select>
              </div>
            </div>
           {{-- <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="category_id" class="form-select">
                  <option value="">-- Select Category --</option>
                  @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('category_id', $session->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->title }}</option>
                  @endforeach
                </select>
              </div>
            </div>--}}
          </div>

        {{--  <div class="mb-3">
            <label class="form-label">Contact Person</label>
            <select name="person_id" class="form-select">
              <option value="">-- Select Contact Person --</option>
              @foreach($persons as $person)
                <option value="{{ $person->id }}" {{ old('person_id', $session->person_id) == $person->id ? 'selected' : '' }}>{{ $person->name }}</option>
              @endforeach
            </select>
          </div>--}}

          {{-- Additional info section --}}
          <div class="mb-3">
            <div class="row">
              <div class="col-md-6">
                <small class="text-muted">
                  <strong>Created:</strong> {{ $session->created_at->format('M j, Y g:i A') }}
                </small>
              </div>
              <div class="col-md-6">
                <small class="text-muted">
                  <strong>Last Updated:</strong> {{ $session->updated_at->format('M j, Y g:i A') }}
                </small>
              </div>
            </div>
          </div>

          <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Update Session</button>
            <a href="{{ url('admin/sessions') }}" class="btn btn-secondary">Cancel</a>
            @if($session->status === 'draft')
              <button type="submit" name="activate" value="1" class="btn btn-success">Update & Activate</button>
            @endif
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
              Delete Session
            </button>
          </div>
        </form>

      {{--  <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editor = document.querySelector('#full-editor');
            const hiddenInput = document.querySelector('#description-content');
            const form = document.querySelector('#session-form');

            if (!hiddenInput || !editor) return;

            setTimeout(() => {
                if (typeof Quill !== 'undefined') {
                    const quillInstance = document.querySelector('#full-editor').__quill;
                    if (quillInstance && form) {
                        form.addEventListener('submit', function(e) {
                            hiddenInput.value = quillInstance.root.innerHTML;
                        });
                    }
                }
            }, 1000);
        });
        </script>--}}
      </div>
    </div>
  </div>

  {{-- Delete Confirmation Modal --}}
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Delete Session</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete this session?</p>
          <p><strong>{{ $session->title }}</strong></p>
          <p class="text-danger">This action cannot be undone.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <form action="/admin/delete_session" method="POST" class="d-inline">
            @csrf
            <input type="hidden" name="id" value="{{ $session->id }}">
            <button type="submit" class="btn btn-danger">Delete Session</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
