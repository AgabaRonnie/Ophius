@extends('layouts.layoutMaster')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5>Event Gallery</h5>
        <a href="/admin/create_event_gallery" class="btn btn-primary btn-sm">Add New Media</a>
    </div>

    {{-- Gallery Grid View --}}
    <div class="row">
        @forelse($eventGalleries as $gallery)
        <div class="col-md-4 col-lg-3 mb-4">
            <div class="card h-100">
                <div class="position-relative">
                    @if($gallery->file)
                        @php
                            $fileExtension = pathinfo($gallery->file, PATHINFO_EXTENSION);
                            $videoExtensions = ['mp4', 'avi', 'mov', 'wmv', 'flv', 'webm'];
                        @endphp

                        @if(in_array(strtolower($fileExtension), $videoExtensions))
                            {{-- Video thumbnail --}}
                            <video class="card-img-top" style="height: 200px; object-fit: cover;" muted>
                                <source src="{{ asset('files/' . $gallery->file) }}" type="video/{{ $fileExtension }}">
                                Your browser does not support the video tag.
                            </video>
                            <div class="position-absolute top-0 end-0 m-2">
                                <span class="badge bg-danger">
                                    <i class="fas fa-play"></i> Video
                                </span>
                            </div>
                        @else
                            {{-- Image --}}
                            <img src="{{ asset('files/' . $gallery->file) }}" class="card-img-top" alt="{{ $gallery->title }}" style="height: 200px; object-fit: cover;">
                            <div class="position-absolute top-0 end-0 m-2">
                                <span class="badge bg-primary">
                                    <i class="fas fa-image"></i> Image
                                </span>
                            </div>
                        @endif
                    @elseif($gallery->video_link)
                        {{-- Video link thumbnail --}}
                        <div class="card-img-top bg-dark d-flex align-items-center justify-content-center text-white" style="height: 200px;">
                            <div class="text-center">
                                <i class="fas fa-video fa-3x mb-2"></i>
                                <p class="mb-0">External Video</p>
                            </div>
                        </div>
                        <div class="position-absolute top-0 end-0 m-2">
                            <span class="badge bg-warning">
                                <i class="fas fa-link"></i> Link
                            </span>
                        </div>
                    @else
                        {{-- No media placeholder --}}
                        <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                            <i class="fas fa-image fa-3x text-muted"></i>
                        </div>
                    @endif

                    {{-- Status badge --}}
                    <div class="position-absolute top-0 start-0 m-2">
                        <span class="badge bg-{{ $gallery->status == 'published' ? 'success' : ($gallery->status == 'draft' ? 'secondary' : 'warning') }}">
                            {{ ucfirst($gallery->status) }}
                        </span>
                    </div>
                </div>

                <div class="card-body">
                    <h6 class="card-title">{{ $gallery->title ?? 'Untitled' }}</h6>
                    @if($gallery->subtitle)
                        <p class="card-text text-muted small">{{ $gallery->subtitle }}</p>
                    @endif
                    @if($gallery->category)
                        <span class="badge bg-info mb-2">{{ $gallery->category }}</span>
                    @endif
                    <br>
                    <small class="text-muted">{{ \Carbon\Carbon::parse($gallery->created_at)->format('M d, Y') }}</small>
                </div>

              {{--display event name--}}
              <div class="card-body pt-0">
                  @if($gallery->event)
                      <span class="badge bg-secondary">Event: {{ $gallery->event->name }}</span>
                  @else
                      <span class="badge bg-secondary">No Event</span>
                  @endif
              </div>



                <div class="card-footer bg-transparent">
                    <div class="d-flex gap-1">
                        @if($gallery->video_link)
                            <a href="{{ $gallery->video_link }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                        @endif
                        <a href="/admin/edit_event_gallery/{{ $gallery->id }}" class="btn btn-sm btn-info">Edit</a>

                        <form action="/admin/delete_event_gallery" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete this media?')">
                            @csrf
                            <input type="hidden" name="id" value="{{ $gallery->id }}">
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="text-center py-5">
                <i class="fas fa-images fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">No media found</h5>
                <p class="text-muted">Start building your gallery by adding images or videos.</p>
                <a href="/admin/create_event_gallery" class="btn btn-primary">Add First Media</a>
            </div>
        </div>
        @endforelse
    </div>

    {{-- Summary Stats --}}
    @if($eventGalleries->count() > 0)
    <div class="row mt-4">
        <div class="col-12">
            <div class="card bg-light">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-3">
                            <h6>Total Media</h6>
                            <h4 class="text-primary">{{ $eventGalleries->count() }}</h4>
                        </div>
                        <div class="col-md-3">
                            <h6>Published</h6>
                            <h4 class="text-success">{{ $eventGalleries->where('status', 'published')->count() }}</h4>
                        </div>
                        <div class="col-md-3">
                            <h6>Draft</h6>
                            <h4 class="text-secondary">{{ $eventGalleries->where('status', 'draft')->count() }}</h4>
                        </div>
                        <div class="col-md-3">
                            <h6>Archived</h6>
                            <h4 class="text-warning">{{ $eventGalleries->where('status', 'archived')->count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
