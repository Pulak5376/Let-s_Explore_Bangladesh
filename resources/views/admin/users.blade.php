@extends('layouts.admin')

@section('title', 'User Management')
@section('header', 'User Management')

@section('content')
<div class="users-container">
    <div class="stats-overview">
        <div class="stat-card total-users">
            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-info">
                <h3>Total Users</h3>
                <span class="stat-number">{{ $users->total() }}</span>
            </div>
        </div>
        
        <div class="stat-card admin-users">
            <div class="stat-icon">
                <i class="fas fa-user-shield"></i>
            </div>
            <div class="stat-info">
                <h3>Admin Users</h3>
                <span class="stat-number">{{ $users->where('role', 'admin')->count() }}</span>
            </div>
        </div>
        
        <div class="stat-card regular-users">
            <div class="stat-icon">
                <i class="fas fa-user"></i>
            </div>
            <div class="stat-info">
                <h3>Regular Users</h3>
                <span class="stat-number">{{ $users->where('role', 'user')->count() }}</span>
            </div>
        </div>
        
        <div class="stat-card recent-users">
            <div class="stat-icon">
                <i class="fas fa-user-clock"></i>
            </div>
            <div class="stat-info">
                <h3>This Month</h3>
                <span class="stat-number">{{ $users->where('created_at', '>=', now()->startOfMonth())->count() }}</span>
            </div>
        </div>
    </div>

    <div class="search-filter-section">
        <div class="search-box">
            <form method="GET" action="{{ route('admin.users') }}" class="search-form">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search users by name or email..." value="{{ request('search') }}">
                    <button class="btn btn-search" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
        
        <div class="filter-options">
            <select name="role_filter" class="form-select" onchange="filterByRole(this.value)">
                <option value="">All Roles</option>
                <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ request('role') == 'user' ? 'selected' : '' }}>User</option>
            </select>
        </div>
    </div>

    <div class="users-table-container">
        <div class="table-header">
            <h3><i class="fas fa-table"></i> Users List</h3>
        </div>

        <div class="table-responsive">
            <table class="users-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Avatar</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Joined Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $index => $user)
                    <tr>
                        <td>{{ $users->firstItem() + $index }}</td>
                        <td>
                            <div class="user-avatar">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random&color=fff&size=40" alt="{{ $user->name }}">
                            </div>
                        </td>
                        <td>
                            <div class="user-info">
                                <span class="user-name">{{ $user->name }}</span>
                                @if($user->email_verified_at)
                                    <span class="badge badge-verified">Verified</span>
                                @endif
                            </div>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <span class="role-badge role-{{ $user->role }}">
                                @if($user->role == 'admin')
                                    <i class="fas fa-user-shield"></i>
                                @else
                                    <i class="fas fa-user"></i>
                                @endif
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td>
                            <span class="join-date">{{ $user->created_at->format('M d, Y') }}</span>
                            <small class="text-muted">{{ $user->created_at->diffForHumans() }}</small>
                        </td>
                        <td>
                            <span class="status-badge status-active">
                                <i class="fas fa-circle"></i> Active
                            </span>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-view" onclick="viewUser({{ $user->id }})" title="View Details">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-edit" onclick="editUser({{ $user->id }})" title="Edit User">
                                    <i class="fas fa-edit"></i>
                                </button>
                                @if($user->id != auth()->id())
                                <button class="btn btn-delete" onclick="deleteUser({{ $user->id }}, '{{ $user->name }}')" title="Delete User">
                                    <i class="fas fa-trash"></i>
                                </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center no-data">
                            <i class="fas fa-users-slash"></i>
                            <p>No users found.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($users->hasPages())
        <div class="pagination-container">
            {{ $users->appends(request()->query())->links() }}
        </div>
        @endif
    </div>
</div>

<div class="modal fade" id="viewUserModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-user"></i> User Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="userDetailsContent">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-edit"></i> Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="editUserForm">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="editUserName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="editUserName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="editUserEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="editUserEmail" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="editUserRole" class="form-label">Role</label>
                        <select class="form-select" id="editUserRole" name="role" required>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="updateUser()">Update User</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Confirm Delete</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <i class="fas fa-user-times text-danger" style="font-size: 4rem; margin-bottom: 1rem;"></i>
                    <h4>Are you sure?</h4>
                    <p>Do you want to delete user <strong id="deleteUserName"></strong>?</p>
                    <p class="text-muted">This action cannot be undone.</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">
                    <i class="fas fa-trash"></i> Delete User
                </button>
            </div>
        </div>
    </div>
</div>

<script>
let currentUserId = null;

function filterByRole(role) {
    const url = new URL(window.location);
    if (role) {
        url.searchParams.set('role', role);
    } else {
        url.searchParams.delete('role');
    }
    window.location.href = url.toString();
}

function viewUser(userId) {
    fetch(`/admin/users/${userId}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const user = data.user;
                document.getElementById('userDetailsContent').innerHTML = `
                    <div class="user-profile">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <img src="https://ui-avatars.com/api/?name=${encodeURIComponent(user.name)}&background=random&color=fff&size=150" 
                                     class="rounded-circle mb-3" alt="${user.name}">
                                <h4>${user.name}</h4>
                                <span class="badge bg-${user.role === 'admin' ? 'danger' : 'primary'}">${user.role.toUpperCase()}</span>
                            </div>
                            <div class="col-md-8">
                                <table class="table">
                                    <tr><td><strong>Email:</strong></td><td>${user.email}</td></tr>
                                    <tr><td><strong>Joined:</strong></td><td>${new Date(user.created_at).toLocaleDateString()}</td></tr>
                                    <tr><td><strong>Email Verified:</strong></td><td>${user.email_verified_at ? 'Yes' : 'No'}</td></tr>
                                    <tr><td><strong>Last Updated:</strong></td><td>${new Date(user.updated_at).toLocaleDateString()}</td></tr>
                                </table>
                            </div>
                        </div>
                    </div>
                `;
                new bootstrap.Modal(document.getElementById('viewUserModal')).show();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error loading user details');
        });
}

function editUser(userId) {
    fetch(`/admin/users/${userId}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const user = data.user;
                currentUserId = userId;
                document.getElementById('editUserName').value = user.name;
                document.getElementById('editUserEmail').value = user.email;
                document.getElementById('editUserRole').value = user.role;
                new bootstrap.Modal(document.getElementById('editUserModal')).show();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error loading user data');
        });
}

function updateUser() {
    const form = document.getElementById('editUserForm');
    const formData = new FormData(form);
    
    fetch(`/admin/users/${currentUserId}`, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            bootstrap.Modal.getInstance(document.getElementById('editUserModal')).hide();
            location.reload();
        } else {
            alert('Error updating user: ' + (data.message || 'Unknown error'));
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error updating user');
    });
}

function deleteUser(userId, userName) {
    currentUserId = userId;
    document.getElementById('deleteUserName').textContent = userName;
    new bootstrap.Modal(document.getElementById('deleteUserModal')).show();
}

document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
    fetch(`/admin/users/${currentUserId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            bootstrap.Modal.getInstance(document.getElementById('deleteUserModal')).hide();
            location.reload();
        } else {
            alert('Error deleting user: ' + (data.message || 'Unknown error'));
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error deleting user');
    });
});

function exportUsers() {
    window.location.href = '/admin/users/export';
}
</script>

<style>
.users-container {
    padding: 0;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    min-height: calc(100vh - 120px);
}

.stats-overview {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.stat-card {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
}

.stat-card.total-users .stat-icon { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
.stat-card.admin-users .stat-icon { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); }
.stat-card.regular-users .stat-icon { background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); }
.stat-card.recent-users .stat-icon { background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); }

.stat-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
}

.stat-info h3 {
    margin: 0 0 0.5rem 0;
    color: #333;
    font-size: 1rem;
    font-weight: 600;
}

.stat-number {
    font-size: 2rem;
    font-weight: 800;
    color: #667eea;
}

.search-filter-section {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    margin-bottom: 2rem;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    display: flex;
    gap: 1rem;
    align-items: center;
    flex-wrap: wrap;
}

.search-box {
    flex: 1;
    min-width: 300px;
}

.input-group {
    display: flex;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.form-control {
    border: none;
    padding: 12px 16px;
    font-size: 14px;
    flex: 1;
}

.btn-search {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    padding: 12px 20px;
    cursor: pointer;
}

.filter-options .form-select {
    min-width: 150px;
    border-radius: 10px;
    border: 1px solid #e0e0e0;
    padding: 12px 16px;
}

.users-table-container {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
}

.table-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 1.5rem;
    display: flex;
    justify-content: between;
    align-items: center;
}

.table-header h3 {
    margin: 0;
    font-size: 1.3rem;
    font-weight: 600;
}

.table-actions .btn-export {
    background: rgba(255, 255, 255, 0.2);
    color: white;
    border: 1px solid rgba(255, 255, 255, 0.3);
    padding: 8px 16px;
    border-radius: 8px;
    text-decoration: none;
    transition: all 0.3s ease;
}

.table-actions .btn-export:hover {
    background: rgba(255, 255, 255, 0.3);
}

.table-responsive {
    overflow-x: auto;
}

.users-table {
    width: 100%;
    margin: 0;
    border-collapse: collapse;
}

.users-table thead th {
    background: #f8f9fa;
    padding: 1rem;
    font-weight: 600;
    color: #333;
    border-bottom: 2px solid #e9ecef;
    text-align: left;
}

.users-table tbody td {
    padding: 1rem;
    border-bottom: 1px solid #f0f0f0;
    vertical-align: middle;
}

.users-table tbody tr:hover {
    background: #f8f9fa;
}

.user-avatar img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
}

.user-info {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.user-name {
    font-weight: 600;
    color: #333;
}

.badge {
    font-size: 0.7rem;
    padding: 0.25rem 0.5rem;
    border-radius: 12px;
}

.badge-verified {
    background: #d4edda;
    color: #155724;
}

.role-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
}

.role-admin {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    color: white;
}

.role-user {
    background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    color: white;
}

.join-date {
    display: block;
    font-weight: 600;
    color: #333;
}

.status-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
}

.status-active {
    background: #d4edda;
    color: #155724;
}

.action-buttons {
    display: flex;
    gap: 0.5rem;
}

.action-buttons .btn {
    width: 35px;
    height: 35px;
    border-radius: 8px;
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-view {
    background: #17a2b8;
    color: white;
}

.btn-view:hover {
    background: #138496;
}

.btn-edit {
    background: #ffc107;
    color: #212529;
}

.btn-edit:hover {
    background: #e0a800;
}

.btn-delete {
    background: #dc3545;
    color: white;
}

.btn-delete:hover {
    background: #c82333;
}

.no-data {
    padding: 3rem;
    text-align: center;
    color: #999;
}

.no-data i {
    font-size: 3rem;
    margin-bottom: 1rem;
    color: #ddd;
}

.pagination-container {
    padding: 1.5rem;
    display: flex;
    justify-content: center;
}

.user-profile {
    padding: 1rem;
}

.user-profile .table td {
    border: none;
    padding: 0.5rem 0;
}

@media (max-width: 768px) {
    .stats-overview {
        grid-template-columns: 1fr;
    }
    
    .search-filter-section {
        flex-direction: column;
        align-items: stretch;
    }
    
    .search-box {
        min-width: auto;
    }
    
    .table-header {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
    }
    
    .action-buttons {
        flex-direction: column;
    }
}
</style>
@endsection
