@extends('layouts.layoutMaster')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5>Create New Event</h5>
    </div>

    <div class="card-body">

      {{-- Success Message --}}
      @if (session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @endif

      <form action="{{ url('/admin/store_event') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
          <label class="form-label">Event Name</label>
          <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        </div>


        <div class="mb-3">
          <label class="form-label">Type</label>
          <select name="type" class="form-select">
            <option value="social" {{ old('type') == 'social' ? 'selected' : '' }}>Social</option>
            <option value="educational" {{ old('type') == 'educational' ? 'selected' : '' }}>Educational</option>

          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Description</label>
          <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">Key Speaker</label>
          <input type="text" name="speaker" class="form-control" value="{{ old('speaker') }}">
        </div>

        <div class="mb-3">
          <label class="form-label">Speaker Bio</label>
          <textarea name="speaker_bio" class="form-control" rows="2">{{ old('speaker_bio') }}</textarea>
        </div>

        {{--<div class="mb-3">
          <label class="form-label">Speaker LinkedIn</label>
          <input type="url" name="speaker_linkedin" class="form-control" value="{{ old('speaker_linkedin') }}">
        </div>

        <div class="mb-3">
          <label class="form-label">Speaker Photo</label>
          <input type="file" name="speaker_photo" class="form-control" accept="image/*">
        </div>--}}

        <div class="mb-3">
          <label class="form-label">Location</label>
          <input type="text" name="location" class="form-control" value="{{ old('location') }}">
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label">Start Date</label>
            <input type="date" name="start_tdate" class="form-control" value="{{ old('start_tdate') }}">
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">End Date</label>
            <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}">
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label">Start Time</label>
            <input type="time" name="start_time" class="form-control" value="{{ old('start_time') }}">
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">End Time</label>
            <input type="time" name="end_time" class="form-control" value="{{ old('end_time') }}">
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Event Image</label>
          <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <div class="mb-3">
          <label class="form-label">Status</label>
          <select name="status" class="form-select">
            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
          </select>
        </div>

     {{--   <div class="mb-3">
          <label class="form-label">Registration Link</label>
          <input type="url" name="registration_link" class="form-control" value="{{ old('registration_link') }}">
        </div>--}}

   {{--     <div class="mb-3">
          <label class="form-label">Video Link</label>
          <input type="url" name="video_link" class="form-control" value="{{ old('video_link') }}">
        </div>--}}

       {{-- <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label">Latitude</label>
            <input type="text" name="latitude" class="form-control" value="{{ old('latitude') }}">
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Longitude</label>
            <input type="text" name="longitude" class="form-control" value="{{ old('longitude') }}">
          </div>
        </div>--}}

        <button type="submit" class="btn btn-primary">Create Event</button>
        <a href="{{ url('admin/events') }}" class="btn btn-secondary">Cancel</a>
      </form>
    </div>
  </div>
</div>
@endsection
