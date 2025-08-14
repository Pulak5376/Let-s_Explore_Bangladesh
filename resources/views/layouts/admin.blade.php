<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />

<body>

    <div class="sidebar">
        <h2><i class="fas fa-cogs"></i> Admin Panel</h2>

        <a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="#"><i class="fas fa-users"></i> Users</a>

        <button class="dropdown-btn"><i class="fas fa-book"></i> Bookings <i class="fas fa-chevron-down"
                style="margin-left:auto;"></i></button>
        <div class="dropdown-container">
            <button class="dropdown-btn"><i class="fas fa-bus"></i> Transports <i class="fas fa-chevron-down"
                    style="margin-left:auto;"></i></button>
            <div class="dropdown-container">
                <a href="{{ route('admin.transports.addbus') }}"><i class="fas fa-plus"></i> Add Bus</a>
                <a href="{{ route('admin.transports.viewbus') }}"><i class="fas fa-eye"></i> View Buses</a>
                <a href="{{ route('admin.transports.addtrain') }}"><i class="fas fa-plus"></i> Add Train</a>
                <a href="{{ route('admin.transports.viewtrain') }}"><i class="fas fa-eye"></i> View Trains</a>
            </div>
        </div>

        <a href="#"><i class="fas fa-map"></i> Add Places</a>
        <a href="#"><i class="fas fa-pen-nib"></i> Stories</a>
        <a href="#"><i class="fas fa-images"></i> Galleries</a>
        <a href="#"><i class="fas fa-cog"></i> Settings</a>

        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit"><i class="fas fa-sign-out-alt"></i> Logout</button>
        </form>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>@yield('header', 'Dashboard')</h1>
        </div>
        <div class="content">
            @yield('content')
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Admin Panel. All rights reserved.
        </div>
    </div>

    <script>
        document.querySelectorAll('.dropdown-btn').forEach(button => {
            button.addEventListener('click', () => {
                const container = button.nextElementSibling;
                const isOpen = container.style.display === 'flex';
                container.style.display = isOpen ? 'none' : 'flex';
                localStorage.setItem(button.textContent.trim(), !isOpen);
            });
        });
        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll('.dropdown-btn').forEach(button => {
                const container = button.nextElementSibling;
                const savedState = localStorage.getItem(button.textContent.trim());
                if (savedState === "true") {
                    container.style.display = 'flex';
                }
            });
        });
    </script>

</body>
<style>
    body {
        margin: 0;
        font-family: 'Inter', sans-serif;
        display: flex;
        min-height: 100vh;
        background-color: #f4f6f9;
    }

    .sidebar {
        width: 250px;
        background: linear-gradient(145deg, #1c5873, #14445a);
        color: #fff;
        display: flex;
        flex-direction: column;
        padding-top: 1rem;
        box-shadow: 3px 0 10px rgba(0, 0, 0, 0.1);
    }

    .sidebar h2 {
        text-align: center;
        padding: 1rem;
        margin: 0;
        font-size: 1.4rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .sidebar a,
    .sidebar button.dropdown-btn {
        color: #ecf0f1;
        text-decoration: none;
        padding: 0.9rem 1.2rem;
        display: flex;
        align-items: center;
        gap: 0.8rem;
        background: none;
        border: none;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .sidebar a:hover,
    .sidebar button.dropdown-btn:hover {
        background-color: rgba(255, 255, 255, 0.08);
        padding-left: 1.5rem;
    }

    .dropdown-container {
        display: none;
        flex-direction: column;
        background-color: rgba(0, 0, 0, 0.1);
        margin-left: 1rem;
        border-left: 2px solid rgba(255, 255, 255, 0.2);
    }

    .dropdown-container a {
        font-size: 0.95rem;
        padding: 0.7rem 1.2rem;
    }

    .active-link {
        background-color: rgba(255, 255, 255, 0.15);
        border-left: 4px solid #f1c40f;
    }

    .sidebar form {
        margin-top: auto;
        padding: 1rem;
    }

    .sidebar form button {
        width: 100%;
        padding: 0.8rem 1rem;
        background-color: #e74c3c;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        transition: background 0.3s, transform 0.2s;
    }

    .sidebar form button:hover {
        background-color: #c0392b;
        transform: translateY(-2px);
    }

    .main-content {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .header {
        background-color: #fff;
        padding: 1rem 2rem;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .content {
        flex: 1;
        padding: 2rem;
    }

    .footer {
        background-color: #1c5873;
        color: #fff;
        text-align: center;
        padding: 1rem;
    }
</style>
</head>

</html>
