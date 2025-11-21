@extends('layouts.layoutMaster')

@section('title', 'Events')

@section('content')
  <div class="card">
    <div class="card-body">
      <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h2>Events</h2>
          <a href="/admin/create_event" class="btn btn-primary">Add Event</a>
        </div>

        @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Type</th>
              <th>Image</th>
              <th>Speaker</th>
              <th>Location</th>
              <th>Start Date</th>
              <th>End Date</th>
              <th>Status</th>
              <th width="200">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($events as $key => $event)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $event->name }}</td>
                <td>{{ $event->type }}</td>
                <td>
                  @if($event->image)
                    <img src="{{ asset( 'files/'.$event->image) }}" alt="{{ $event->name }}" width="50">
                  @else
                    N/A
                @endif
                <td>{{ $event->speaker }}</td>
                <td>{{ $event->location }}</td>
                <td>{{ $event->start_tdate }}</td>
                <td>{{ $event->end_date }}</td>
                <td>
                            <span class="badge bg-{{ $event->status == 'active' ? 'success' : 'secondary' }}">
                                {{ ucfirst($event->status) }}
                            </span>
                </td>
                <td>
                  <a href="/admin/show_event/{{ $event->id }}" class="btn btn-sm btn-info mb-2">View</a>
                  <a href="/admin/edit_event/{{ $event->id }}" class="btn btn-sm btn-info mb-2">Edit</a>
                  <form action="/admin/delete_event" method="POST" class="d-inline">
                    @csrf
                    <input type="hidden" name="id" value="{{ $event->id }}">
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="9" class="text-center">No events found</td>
              </tr>
            @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
