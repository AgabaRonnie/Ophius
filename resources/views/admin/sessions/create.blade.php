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
        <h5>Create New Session</h5>
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

        <form action="{{ url('/admin/store_session') }}" method="POST" enctype="multipart/form-data" id="session-form">
          @csrf

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Speaker</label>
                <input type="text" name="speaker" class="form-control" value="{{ old('speaker') }}">
              </div>
            </div>
          </div>

        {{--  <div class="mb-3">
            <label class="form-label">Description</label>
            <div class="card">
              <div class="card-body">
                <div id="full-editor">
                  {!! old('description', '<p>Enter session description here...</p>') !!}
                </div>
                <input type="hidden" name="description" id="description-content">
              </div>
            </div>
          </div>--}}
          <textarea name="description" class="form-control" rows="4" placeholder="Enter session description here...">{{ old('description') }}</textarea>


          <div class="mb-3">
            <label class="form-label">Session Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
            <small class="form-text text-muted">Upload a banner or promotional image for this session (optional)</small>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                  <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                  <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                  <option value="running" {{ old('status') == 'running' ? 'selected' : '' }}>Running</option>
                  <option value="ended" {{ old('status') == 'ended' ? 'selected' : '' }}>Ended</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <label class="form-label">Method</label>
                <select name="method" class="form-select">
                  <option value="">-- Select Method --</option>
                  <option value="online" {{ old('method') == 'online' ? 'selected' : '' }}>Online</option>
                  <option value="offline" {{ old('method') == 'offline' ? 'selected' : '' }}>Offline</option>
                  <option value="hybrid" {{ old('method') == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <label class="form-label">Fee</label>
                <input type="number" name="fee" class="form-control" min="0" value="{{ old('fee', 0) }}">
                <small class="form-text text-muted">Enter 0 for free sessions</small>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Duration</label>
                <input type="text" name="duration" class="form-control" value="{{ old('duration') }}" placeholder="e.g., 2 hours, 1 day, 3 weeks">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Venue</label>
                <input type="text" name="venue" class="form-control" value="{{ old('venue') }}" placeholder="Location or online platform">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Start Date</label>
                <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">End Date</label>
                <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Start Time</label>
                <input type="time" name="start_time" class="form-control" value="{{ old('start_time') }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">End Time</label>
                <input type="time" name="end_time" class="form-control" value="{{ old('end_time') }}">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Category Type</label>
                <select name="category" class="form-select">
                  <option value="">-- Select Category Type --</option>
                  <option value="course" {{ old('category') == 'course' ? 'selected' : '' }}>Course</option>
                  <option value="coaching" {{ old('category') == 'coaching' ? 'selected' : '' }}>Coaching</option>
                  <option value="seminar" {{ old('category') == 'seminar' ? 'selected' : '' }}>Seminar</option>
                </select>
              </div>
            </div>
           {{-- <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="category_id" class="form-select">
                  <option value="">-- Select Category --</option>
                  @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->title }}</option>
                  @endforeach
                </select>
              </div>
            </div>--}}
          </div>

         {{-- <div class="mb-3">
            <label class="form-label">Contact Person</label>
            <select name="person_id" class="form-select">
              <option value="">-- Select Contact Person --</option>
              @foreach($persons as $person)
                <option value="{{ $person->id }}" {{ old('person_id') == $person->id ? 'selected' : '' }}>{{ $person->name }}</option>
              @endforeach
            </select>
          </div>--}}

          <button type="submit" class="btn btn-primary">Create Session</button>
          <a href="{{ url('admin/sessions') }}" class="btn btn-secondary">Cancel</a>
        </form>

       {{-- <script>
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
@endsection
