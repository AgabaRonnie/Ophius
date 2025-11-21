@extends('layouts.layoutMaster')

@section('title', 'Edit Event')

@section('content')
  <div class="card">
    <div class="card-body">

<div class="container mt-4">
    <h1>Edit Event</h1>

    <form action="{{ url('/admin/events/' . $event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Event Name</label>
            <input type="text" name="name" class="form-control" value="{{ $event->name }}">
        </div>

      <div class="mb-3">
            <label class="form-label">Type</label>
            <select name="status" class="form-control">
                <option value="social" {{ $event->type == 'social' ? 'selected' : '' }}>Social</option>
                <option value="educational" {{ $event->type == 'educational' ? 'selected' : '' }}>Educational</option>

            </select>
        </div>

       {{-- <div class="mb-3">
            <label class="form-label">Type</label>
            <input type="text" name="type" class="form-control" value="{{ $event->type }}">
        </div>--}}

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ $event->description }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Speaker(s)</label>
            <input type="text" name="speaker" class="form-control" value="{{ $event->speaker }}">
        </div>

       <div class="mb-3">
            <label class="form-label">Speaker Bio</label>
            <input type="text" name="speaker_bio" class="form-control" value="{{ $event->speaker_bio }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Location</label>
            <input type="text" name="location" class="form-control" value="{{ $event->location }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Start Date</label>
            <input type="date" name="start_tdate" class="form-control" value="{{ $event->start_tdate }}">
        </div>

        <div class="mb-3">
            <label class="form-label">End Date</label>
            <input type="date" name="end_date" class="form-control" value="{{ $event->end_date }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Start Time</label>
            <input type="time" name="start_time" class="form-control" value="{{ $event->start_time }}">
        </div>

        <div class="mb-3">
            <label class="form-label">End Time</label>
            <input type="time" name="end_time" class="form-control" value="{{ $event->end_time }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
            @if($event->image)
                <p>Current: <img src="{{ asset('files/'.$event->image) }}" width="100"></p>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="active" {{ $event->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $event->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                <option value="pending" {{ $event->status == 'pending' ? 'selected' : '' }}>Pending</option>
            </select>
        </div>

{{--        <div class="mb-3">--}}
{{--            <label class="form-label">Registration Link</label>--}}
{{--            <input type="text" name="registration_link" class="form-control" value="{{ $event->registration_link }}">--}}
{{--        </div>--}}

{{--        <div class="mb-3">--}}
{{--            <label class="form-label">Video Link</label>--}}
{{--            <input type="text" name="video_link" class="form-control" value="{{ $event->video_link }}">--}}
{{--        </div>--}}

       {{-- <div class="mb-3">
            <label class="form-label">Speaker Photo</label>
            <input type="file" name="speaker_photo" class="form-control">
            @if($event->speaker_photo)
                <p>Current: <img src="{{ asset('storage/'.$event->speaker_photo) }}" width="100"></p>
            @endif
        </div>--}}

       {{-- <div class="mb-3">
            <label class="form-label">Speaker Bio</label>
            <textarea name="speaker_bio" class="form-control">{{ $event->speaker_bio }}</textarea>
        </div>--}}

       {{-- <div class="mb-3">
            <label class="form-label">Speaker LinkedIn</label>
            <input type="text" name="speaker_linkedin" class="form-control" value="{{ $event->speaker_linkedin }}">
        </div>--}}

        {{--<div class="mb-3">
            <label class="form-label">Latitude</label>
            <input type="text" name="latitude" class="form-control" value="{{ $event->latitude }}">
        </div>--}}

      {{--  <div class="mb-3">
            <label class="form-label">Longitude</label>
            <input type="text" name="longitude" class="form-control" value="{{ $event->longitude }}">
        </div>--}}

        <button type="submit" class="btn btn-primary">Update Event</button>
    </form>
</div>
    </div>
  </div>
@endsection
