@extends('layouts.admin')

@section('title', 'View Transports')
@section('header', 'View Transports')

@section('content')
    <div style="margin-bottom: 1rem;">
        <button id="showAll" style="padding:0.5rem 1rem;">All Transports</button>
        <button id="showBus" style="padding:0.5rem 1rem;">Show Buses</button>
        <button id="showTrain" style="padding:0.5rem 1rem;">Show Trains</button>
    </div>

    <table id="transportsTable">
        <thead>
            <tr>
                <th style="padding:0.8rem;border:1px solid #ddd;">ID</th>
                <th style="padding:0.8rem;border:1px solid #ddd;">Name</th>
                <th style="padding:0.8rem;border:1px solid #ddd;">Type</th>
                <th style="padding:0.8rem;border:1px solid #ddd;">Route From</th>
                <th style="padding:0.8rem;border:1px solid #ddd;">Route To</th>
                <th style="padding:0.8rem;border:1px solid #ddd;">Departure</th>
                <th style="padding:0.8rem;border:1px solid #ddd;">Price</th>
                <th style="padding:0.8rem;border:1px solid #ddd;">Total Seats</th>
                <th style="padding:0.8rem;border:1px solid #ddd;">Edit</th>
                <th style="padding:0.8rem;border:1px solid #ddd;">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transports as $transport)
                <tr data-type="{{ $transport->type }}">
                    <td style="padding:0.5rem;border:1px solid #ddd;">{{ $transport->id }}</td>
                    <td style="padding:0.5rem;border:1px solid #ddd;">{{ $transport->name }}</td>
                    <td style="padding:0.5rem;border:1px solid #ddd;">{{ ucfirst($transport->type) }}</td>
                    <td style="padding:0.5rem;border:1px solid #ddd;">{{ $transport->route_from }}</td>
                    <td style="padding:0.5rem;border:1px solid #ddd;">{{ $transport->route_to }}</td>
                    <td style="padding:0.5rem;border:1px solid #ddd;">{{ $transport->departure_time }}</td>
                    <td style="padding:0.5rem;border:1px solid #ddd;">{{ $transport->price }}</td>
                    <td style="padding:0.5rem;border:1px solid #ddd;">{{ $transport->total_seats }}</td>
                    <td>
                        <a href="{{ route('admin.transports.edit', $transport->id) }}" style="color:blue;">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('admin.transports.destroy', $transport->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color:red; background:none; border:none; cursor:pointer;">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        const tableRows = document.querySelectorAll('#transportsTable tbody tr');
        const showBusBtn = document.getElementById('showBus');
        const showTrainBtn = document.getElementById('showTrain');
        const showAllBtn = document.getElementById('showAll');

        showBusBtn.addEventListener('click', () => {
            tableRows.forEach(row => {
                row.style.display = row.dataset.type === 'bus' ? '' : 'none';
            });
        });

        showTrainBtn.addEventListener('click', () => {
            tableRows.forEach(row => {
                row.style.display = row.dataset.type === 'train' ? '' : 'none';
            });
        });

        showAllBtn.addEventListener('click', () => {
            tableRows.forEach(row => row.style.display = '');
        });

        tableRows.forEach(row => row.style.display = '');
    </script>
    <style>
        button {
            background-color: #1c5873;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            cursor: pointer;
        }

        button:hover {
            background-color: #36d417;
        }

        #transportsTable {
            width: 100%;
            border-collapse: collapse;
        }

        #transportsTable th,
        #transportsTable td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #transportsTable th {
            background-color: #1c5873;
            text-align: left;
            color: white
        }

        @media (max-width: 600px) {

            #transportsTable th,
            #transportsTable td {
                padding: 0.5rem;
            }

            #transportsTable {
                font-size: 0.9rem;
            }
        }
    </style>
@endsection
