<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <body>

    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="#">Users</a>
        <a href="#">Orders</a>
        <a href="#">Settings</a>
        <a href="#">Logout</a>
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
            border-bottom: 1px solid rgba(255,255,255,0.2);
            margin: 0;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            padding: 0.8rem 1.2rem;
            display: block;
            transition: background 0.3s;
        }

        .sidebar a:hover {
            background-color: #16475a;
        }

        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .header {
            background-color: #fff;
            padding: 1rem 2rem;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
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
