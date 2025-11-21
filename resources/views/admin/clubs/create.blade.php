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
        <h5>Create New Club</h5>
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

        <form action="{{ url('/admin/store_club') }}" method="POST" enctype="multipart/form-data" id="club-form">
          @csrf

          <div class="row">
            <div class="col-md-8">
              <div class="mb-3">
                <label class="form-label">Club Name</label>
                <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="category" class="form-select">
                  <option value="">-- Select Category --</option>
                  <option value="social" {{ old('category') == 'social' ? 'selected' : '' }}>Social</option>
                  <option value="sports" {{ old('category') == 'sports' ? 'selected' : '' }}>Sports</option>
                  <option value="academic" {{ old('category') == 'academic' ? 'selected' : '' }}>Academic</option>
                  <option value="cultural" {{ old('category') == 'cultural' ? 'selected' : '' }}>Cultural</option>
                </select>
              </div>
            </div>
          </div>

         {{-- <div class="mb-3">
            <label class="form-label">Description</label>
            <div class="card">
              <div class="card-body">
                <div id="full-editor">
                  {!! old('description', '<p>Enter the club description here. You can format it using the toolbar above!</p>') !!}
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
            <textarea name="description" class="form-control" rows="4" placeholder="Enter the club description here...">{{ old('description') }}</textarea>
            <small class="form-text text-muted">
              Provide a detailed description of the club, its purpose, and activities.
            </small>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Club Image</label>
                <input type="file" name="image" class="form-control" accept="image/*">
                <small class="form-text text-muted">Upload a logo or main image for the club (optional)</small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">PDF File (Optional)</label>
                <input type="file" name="file" class="form-control" accept=".pdf">
                <small class="form-text text-muted">Upload a PDF document (constitution, brochure, etc.)</small>
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Club Benefits</label>
            <textarea name="benefits" class="form-control" rows="4" placeholder="Enter benefits separated by || (e.g., Networking opportunities || Skill development || Social events || Career guidance)">{{ old('benefits') }}</textarea>
            <small class="form-text text-muted">
              Enter club benefits separated by || (double pipe). Example: "Networking opportunities || Skill development || Social events"
            </small>
          </div>

          <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
              <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
              <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
              <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary">Create Club</button>
          <a href="{{ url('admin/clubs') }}" class="btn btn-secondary">Cancel</a>
        </form>

     {{--   <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('=== DEBUGGING CLUB FORM ===');

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
                    console.log('=== CLUB FORM SUBMISSION DEBUG ===');
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
@endsection
