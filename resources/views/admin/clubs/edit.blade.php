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
        <h5>Edit Club: {{ $club->name }}</h5>
        <div>
          <a href="{{ url('admin/show_club/' . $club->id) }}" class="btn btn-sm btn-info">View Club</a>
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

        <form action="{{ url('/admin/club/update/' . $club->id) }}" method="POST" enctype="multipart/form-data" id="club-form">
          @csrf

          <div class="row">
            <div class="col-md-8">
              <div class="mb-3">
                <label class="form-label">Club Name</label>
                <input type="text" name="name" class="form-control" required value="{{ old('name', $club->name) }}">
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="category" class="form-select">
                  <option value="">-- Select Category --</option>
                  <option value="social" {{ old('category', $club->category) == 'social' ? 'selected' : '' }}>Social</option>
                  <option value="sports" {{ old('category', $club->category) == 'sports' ? 'selected' : '' }}>Sports</option>
                  <option value="academic" {{ old('category', $club->category) == 'academic' ? 'selected' : '' }}>Academic</option>
                  <option value="cultural" {{ old('category', $club->category) == 'cultural' ? 'selected' : '' }}>Cultural</option>
                </select>
              </div>
            </div>
          </div>

          {{--<div class="mb-3">
            <label class="form-label">Description</label>
            <div class="card">
              <div class="card-body">
                <div id="full-editor">
                  {!! old('description', $club->description) !!}
                </div>
                <!-- Hidden input to store the HTML content -->
                <input type="hidden" name="description" id="description-content">
              </div>
            </div>
            <small class="form-text text-muted">
              Provide a detailed description of the club, its purpose, and activities.
            </small>
          </div>--}}
          <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" placeholder="Enter the club description here...">{{ old('description', $club->description) }}</textarea>
            <small class="form-text text-muted">
              Provide a detailed description of the club, its purpose, and activities.
            </small>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Club Image</label>
                @if($club->image)
                  <div class="mb-2">
                    <img src="{{ asset('files/' . $club->image) }}" alt="Current image" class="img-thumbnail" style="max-width: 200px;">
                    <p class="small text-muted">Current club image</p>
                  </div>
                @endif
                <input type="file" name="image" class="form-control" accept="image/*">
                <small class="form-text text-muted">
                  Upload a new image to replace the current one (optional). Leave empty to keep current image.
                </small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">PDF File (Optional)</label>
                @if($club->file)
                  <div class="mb-2">
                    <a href="{{ asset('files/' . $club->file) }}" target="_blank" class="btn btn-sm btn-outline-danger">
                      <i class="fas fa-file-pdf"></i> View Current PDF
                    </a>
                    <p class="small text-muted">Current PDF file</p>
                  </div>
                @endif
                <input type="file" name="file" class="form-control" accept=".pdf">
                <small class="form-text text-muted">Upload a new PDF document (constitution, brochure, etc.)</small>
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Club Benefits</label>
            <textarea name="benefits" class="form-control" rows="4" placeholder="Enter benefits separated by || (e.g., Networking opportunities || Skill development || Social events || Career guidance)">{{ old('benefits', $club->benefits) }}</textarea>
            <small class="form-text text-muted">
              Enter club benefits separated by || (double pipe). Example: "Networking opportunities || Skill development || Social events"
            </small>
          </div>

          <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
              <option value="draft" {{ old('status', $club->status) == 'draft' ? 'selected' : '' }}>Draft</option>
              <option value="active" {{ old('status', $club->status) == 'active' ? 'selected' : '' }}>Active</option>
              <option value="inactive" {{ old('status', $club->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
          </div>

          {{-- Additional info section --}}
          <div class="mb-3">
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
          </div>

          <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Update Club</button>
            <a href="{{ url('admin/clubs') }}" class="btn btn-secondary">Cancel</a>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
              Delete Club
            </button>
          </div>
        </form>

        {{--<script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('=== DEBUGGING CLUB EDIT FORM ===');

            // Check if elements exist
            const editor = document.querySelector('#full-editor');
            const hiddenInput = document.querySelector('#description-content');
            const form = document.querySelector('#club-form');

            console.log('Editor element:', editor);
            console.log('Hidden input element:', hiddenInput);
            console.log('Form element:', form);

            if (!hiddenInput) {
                console.error('PROBLEM: Hidden input #description-content not found!');
                return;
            }

            if (!editor) {
                console.error('PROBLEM: Editor #full-editor not found!');
                return;
            }

            // Check if Quill is initialized
            setTimeout(() => {
                if (typeof Quill !== 'undefined') {
                    console.log('Quill is available');

                    // Try to get Quill instance
                    const quillInstance = document.querySelector('#full-editor').__quill;
                    if (quillInstance) {
                        console.log('Quill instance found:', quillInstance);
                        console.log('Current Quill content:', quillInstance.root.innerHTML);
                    } else {
                        console.error('PROBLEM: Quill instance not found on editor element');
                    }
                } else {
                    console.error('PROBLEM: Quill library not loaded');
                }
            }, 1000);

            // Monitor form submission
            if (form) {
                form.addEventListener('submit', function(e) {
                    console.log('=== CLUB EDIT FORM SUBMISSION DEBUG ===');
                    console.log('Hidden input value:', hiddenInput ? hiddenInput.value : 'INPUT NOT FOUND');

                    // Check all form data
                    const formData = new FormData(form);
                    console.log('All form data:');
                    for (let [key, value] of formData.entries()) {
                        console.log(`${key}: ${value}`);
                    }
                });
            }
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
