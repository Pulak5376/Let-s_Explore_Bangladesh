@extends('layouts.admin')

@section('title', 'Manage Galleries')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-gradient-primary text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0"><i class="fas fa-images me-2"></i>Gallery Management</h4>
                        <a href="{{ route('admin.galleries.add') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-plus me-1"></i>Add New Gallery
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($galleries->count() > 0)
                        <div class="row">
                            @foreach($galleries as $gallery)
                                <div class="col-md-4 col-lg-3 mb-4">
                                    <div class="card h-100 gallery-card">
                                        <div class="position-relative">
                                            @if($gallery->image_url)
                                                <img src="{{ asset($gallery->image_url) }}" class="card-img-top gallery-img" alt="{{ $gallery->title }}">
                                            @else
                                                <div class="no-image-placeholder">
                                                    <i class="fas fa-image fa-3x text-muted"></i>
                                                </div>
                                            @endif
                                            <div class="gallery-overlay">
                                                <div class="gallery-actions">
                                                    <a href="{{ route('admin.galleries.edit', $gallery->id) }}" class="btn btn-sm btn-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-sm btn-danger" onclick="deleteGallery({{ $gallery->id }}, '{{ $gallery->title }}')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h6 class="card-title text-truncate">{{ $gallery->title }}</h6>
                                            <p class="card-text">
                                                <small class="text-muted">
                                                    <i class="fas fa-map-marker-alt me-1"></i>{{ $gallery->location }}
                                                </small>
                                            </p>
                                            @if($gallery->description)
                                                <p class="card-text small text-muted">{{ Str::limit($gallery->description, 60) }}</p>
                                            @endif
                                            <small class="text-muted">
                                                <i class="fas fa-calendar me-1"></i>{{ $gallery->created_at->format('M d, Y') }}
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-images fa-4x text-muted mb-3"></i>
                            <h5 class="text-muted">No galleries found</h5>
                            <p class="text-muted">Start by adding your first gallery item.</p>
                            <a href="{{ route('admin.galleries.add') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-1"></i>Add Gallery Item
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">
                    <i class="fas fa-exclamation-triangle me-2"></i>Confirm Delete
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete "<span id="galleryTitle"></span>"?</p>
                <div class="alert alert-warning">
                    <i class="fas fa-info-circle me-2"></i>This action cannot be undone!
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-1"></i>Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.bg-gradient-primary {
    background: linear-gradient(90deg, #007bff 0%, #0056b3 100%) !important;
}

.gallery-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: none;
    border-radius: 15px;
    overflow: hidden;
}

.gallery-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

.gallery-img {
    height: 200px;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.no-image-placeholder {
    height: 200px;
    background: #f8f9fa;
    display: flex;
    align-items: center;
    justify-content: center;
}

.gallery-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.gallery-card:hover .gallery-overlay {
    opacity: 1;
}

.gallery-card:hover .gallery-img {
    transform: scale(1.1);
}

.gallery-actions {
    display: flex;
    gap: 10px;
}

.card-title {
    font-weight: 600;
    color: #333;
}

.alert {
    border-radius: 10px;
}

.modal-content {
    border-radius: 15px;
}
</style>

<script>
function deleteGallery(id, title) {
    document.getElementById('galleryTitle').textContent = title;
    document.getElementById('deleteForm').action = `/admin/galleries/${id}`;
    
    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}

// Auto dismiss alerts
setTimeout(function() {
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(function(alert) {
        const bsAlert = new bootstrap.Alert(alert);
        bsAlert.close();
    });
}, 5000);
</script>
@endsection
