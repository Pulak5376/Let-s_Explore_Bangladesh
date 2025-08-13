<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

<body>

    <div class="sidebar">
        <h2>Admin Panel</h2>

        <a href="{{ route('admin.dashboard') }}">Dashboard</a>

        <div>
            <button class="dropdown-btn">Bookings</button>
            <div class="dropdown-container">
                <button class="dropdown-btn">Transports</button>
                <div class="dropdown-container">
                    <a href="{{ route('admin.transports.addbus') }}">Add Bus</a>
                    <a href="{{ route('admin.transports.viewbus') }}">View Buses</a>
                </div>
            </div>
        </div>

        <a href="#">Users</a>
        <a href="#">Orders</a>
        <a href="#">Settings</a>

        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit">
                <i class="fas fa-sign-out-alt"></i>
                Logout
            </button>
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
        const dropdowns = document.querySelectorAll('.dropdown-btn');
        dropdowns.forEach(btn => {
            btn.addEventListener('click', function() {
                const container = this.nextElementSibling;
                if (container.style.display === 'flex') {
                    container.style.display = 'none';
                } else {
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
        width: 220px;
        background-color: #1c5873;
        color: #fff;
        display: flex;
        flex-direction: column;
    }

    .sidebar h2 {
        text-align: center;
        padding: 1rem 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        margin: 0;
    }

    .sidebar a,
    .sidebar button.dropdown-btn {
        color: #fff;
        text-decoration: none;
        padding: 0.8rem 1.2rem;
        display: block;
        background: none;
        border: none;
        text-align: left;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: background 0.3s;
    }

    .sidebar a:hover,
    .sidebar button.dropdown-btn:hover {
        background-color: #16475a;
    }

    .dropdown-container {
        display: none;
        margin-left: 1rem;
        flex-direction: column;
    }

    .sidebar form {
        padding: 0.5rem 1rem;
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
        gap: 0.5rem;
        transition: background 0.3s, transform 0.2s;
    }

    .sidebar form button:hover {
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
