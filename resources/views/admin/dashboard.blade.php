@extends('layouts.admin')

@section('title', 'Dashboard')
@section('header', 'Admin Dashboard')

@section('content')
<div class="dashboard-container">
    <div class="welcome-section">
        <div class="welcome-card">
            <div class="welcome-icon">
                <i class="fas fa-user-shield"></i>
            </div>
            <div class="welcome-content">
                <h2>Welcome back, {{ Auth::user()->name }}!</h2>
                <p>{{ Auth::user()->email }}</p>
                <span class="last-login">Last login: {{ now()->format('M d, Y - H:i A') }}</span>
            </div>
        </div>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon bus">
                <i class="fas fa-bus"></i>
            </div>
            <div class="stat-content">
                <h3>Total Buses</h3>
                <div class="stat-number">{{ \App\Models\Transport::where('type', 'bus')->count() }}</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon train">
                <i class="fas fa-train"></i>
            </div>
            <div class="stat-content">
                <h3>Total Trains</h3>
                <div class="stat-number">{{ \App\Models\Transport::where('type', 'train')->count() }}</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon flight">
                <i class="fas fa-plane"></i>
            </div>
            <div class="stat-content">
                <h3>Total Flights</h3>
                <div class="stat-number">{{ \App\Models\Flight::count() }}</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon users">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-content">
                <h3>Total Users</h3>
                <div class="stat-number">{{ \App\Models\User::where('role', 'user')->count() }}</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon places">
                <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="stat-content">
                <h3>Total Places</h3>
                <div class="stat-number">{{ \App\Models\Places::count() }}</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon contacts">
                <i class="fas fa-envelope"></i>
            </div>
            <div class="stat-content">
                <h3>Contact Messages</h3>
                <div class="stat-number">{{ \App\Models\Contact::count() }}</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon reviews">
                <i class="fas fa-star"></i>
            </div>
            <div class="stat-content">
                <h3>Total Reviews</h3>
                <div class="stat-number">{{ \App\Models\Review::count() }}</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon galleries">
                <i class="fas fa-images"></i>
            </div>
            <div class="stat-content">
                <h3>Gallery Items</h3>
                <div class="stat-number">{{ \App\Models\Gallery::count() }}</div>
            </div>
        </div>
    </div>

    <div class="booking-stats">
        <div class="booking-card">
            <div class="booking-header">
                <h3><i class="fas fa-chart-bar"></i> Booking Statistics</h3>
            </div>
            <div class="booking-grid">
                <div class="booking-item">
                    <div class="booking-icon bus-booking">
                        <i class="fas fa-bus"></i>
                    </div>
                    <div class="booking-details">
                        <h4>Bus Bookings</h4>
                        <div class="booking-number">{{ \App\Models\Booking::whereHas('transport', function($q) { $q->where('type', 'bus'); })->count() }}</div>
                        <span>Total Bus Reservations</span>
                    </div>
                </div>

                <div class="booking-item">
                    <div class="booking-icon train-booking">
                        <i class="fas fa-train"></i>
                    </div>
                    <div class="booking-details">
                        <h4>Train Bookings</h4>
                        <div class="booking-number">{{ \App\Models\Booking::whereHas('transport', function($q) { $q->where('type', 'train'); })->count() }}</div>
                        <span>Total Train Reservations</span>
                    </div>
                </div>

                <div class="booking-item">
                    <div class="booking-icon flight-booking">
                        <i class="fas fa-plane"></i>
                    </div>
                    <div class="booking-details">
                        <h4>Flight Bookings</h4>
                        <div class="booking-number">{{ \App\Models\FlightBooking::count() }}</div>
                        <span>Total Flight Reservations</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="charts-section">
        <div class="chart-card">
            <div class="chart-header">
                <h3><i class="fas fa-chart-pie"></i> Transport Distribution</h3>
            </div>
            <div class="chart-container">
                <canvas id="transportChart"></canvas>
            </div>
        </div>

        <div class="chart-card">
            <div class="chart-header">
                <h3><i class="fas fa-chart-line"></i> Monthly Bookings</h3>
            </div>
            <div class="chart-container">
                <canvas id="bookingChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const transportCtx = document.getElementById('transportChart').getContext('2d');
    const transportChart = new Chart(transportCtx, {
        type: 'doughnut',
        data: {
            labels: ['Buses', 'Trains', 'Flights'],
            datasets: [{
                data: [
                    {{ \App\Models\Transport::where('type', 'bus')->count() }},
                    {{ \App\Models\Transport::where('type', 'train')->count() }},
                    {{ \App\Models\Flight::count() }}
                ],
                backgroundColor: [
                    '#ff6b6b',
                    '#4ecdc4',
                    '#45b7d1'
                ],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 20,
                        usePointStyle: true
                    }
                }
            }
        }
    });

    const bookingCtx = document.getElementById('bookingChart').getContext('2d');
    const bookingChart = new Chart(bookingCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [
                {
                    label: 'Bus Bookings',
                    data: [12, 19, 8, 15, 22, 18],
                    borderColor: '#ff6b6b',
                    backgroundColor: 'rgba(255, 107, 107, 0.1)',
                    tension: 0.4
                },
                {
                    label: 'Train Bookings',
                    data: [8, 15, 12, 9, 16, 14],
                    borderColor: '#4ecdc4',
                    backgroundColor: 'rgba(78, 205, 196, 0.1)',
                    tension: 0.4
                },
                {
                    label: 'Flight Bookings',
                    data: [5, 8, 6, 12, 9, 11],
                    borderColor: '#45b7d1',
                    backgroundColor: 'rgba(69, 183, 209, 0.1)',
                    tension: 0.4
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top'
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<style>
    .dashboard-container {
        padding: 0;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: calc(100vh - 120px);
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .welcome-section {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        margin-bottom: 1rem;
    }

    .welcome-card {
        display: flex;
        align-items: center;
        gap: 1.5rem;
    }

    .welcome-icon {
        background: linear-gradient(135deg, #1c5873 0%, #2d6b84 100%);
        color: white;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        box-shadow: 0 8px 20px rgba(28, 88, 115, 0.3);
    }

    .welcome-content h2 {
        color: #1c5873;
        margin-bottom: 0.5rem;
        font-size: 1.8rem;
        font-weight: 700;
    }

    .welcome-content p {
        color: #666;
        margin-bottom: 0.5rem;
        font-size: 1.1rem;
    }

    .last-login {
        color: #999;
        font-size: 0.9rem;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 1rem;
    }

    .stat-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        gap: 1.5rem;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }

    .stat-icon {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        color: white;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .stat-icon.bus { background: linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%); }
    .stat-icon.train { background: linear-gradient(135deg, #4ecdc4 0%, #44a08d 100%); }
    .stat-icon.flight { background: linear-gradient(135deg, #45b7d1 0%, #96c93d 100%); }
    .stat-icon.users { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); }
    .stat-icon.places { background: linear-gradient(135deg, #fd7e14 0%, #e55100 100%); }
    .stat-icon.contacts { background: linear-gradient(135deg, #6f42c1 0%, #5a28a3 100%); }
    .stat-icon.reviews { background: linear-gradient(135deg, #ffc107 0%, #ff8f00 100%); }
    .stat-icon.galleries { background: linear-gradient(135deg, #20c997 0%, #0f9b7a 100%); }

    .stat-content h3 {
        color: #333;
        margin-bottom: 0.5rem;
        font-size: 1.1rem;
        font-weight: 600;
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 800;
        color: #1c5873;
        margin-bottom: 0.25rem;
    }

    .booking-stats {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        margin-bottom: 1rem;
    }

    .booking-header {
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #f0f0f0;
    }

    .booking-header h3 {
        color: #1c5873;
        font-size: 1.5rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .booking-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
    }

    .booking-item {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 15px;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        transition: transform 0.3s ease;
    }

    .booking-item:hover {
        transform: translateY(-3px);
    }

    .booking-icon {
        width: 60px;
        height: 60px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: white;
    }

    .booking-icon.bus-booking { background: linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%); }
    .booking-icon.train-booking { background: linear-gradient(135deg, #4ecdc4 0%, #44a08d 100%); }
    .booking-icon.flight-booking { background: linear-gradient(135deg, #45b7d1 0%, #96c93d 100%); }

    .booking-details h4 {
        color: #333;
        margin-bottom: 0.5rem;
        font-weight: 600;
    }

    .booking-number {
        font-size: 2rem;
        font-weight: 800;
        color: #1c5873;
        margin-bottom: 0.25rem;
    }

    .booking-details span {
        color: #666;
        font-size: 0.85rem;
    }
    .charts-section {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        gap: 1.5rem;
        margin-bottom: 1rem;
    }

    .chart-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .chart-header {
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #f0f0f0;
    }

    .chart-header h3 {
        color: #1c5873;
        font-size: 1.3rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .chart-container {
        position: relative;
        height: 300px;
    }

    @media (max-width: 768px) {
        .dashboard-container {
            padding: 1rem;
            gap: 1rem;
        }

        .welcome-card {
            flex-direction: column;
            text-align: center;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .booking-grid {
            grid-template-columns: 1fr;
        }

        .charts-section {
            grid-template-columns: 1fr;
        }

        .action-buttons {
            grid-template-columns: 1fr;
        }

        .stat-number {
            font-size: 2rem;
        }

        .booking-number {
            font-size: 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .welcome-section,
        .booking-stats,
        .chart-card,
        .quick-actions {
            padding: 1.5rem;
        }

        .stat-card {
            padding: 1.5rem;
        }

        .booking-item {
            padding: 1rem;
        }
    }
</style>
@endsection
