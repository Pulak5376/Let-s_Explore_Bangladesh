@extends('layouts.admin')

@section('title', 'Add Bus')

@section('header', 'Add New Bus')
@section('content')
<div class="add-transport-wrapper">
    <div class="form-container">
        <div class="form-header">
            <h2><i class="fas fa-bus"></i> Add New Bus</h2>
            <p>Enter bus details to add to the transport system</p>
        </div>
        
        <div id="msg-box"></div>

        <form id="addBusForm" action="{{ route('admin.transports.storebus') }}" method="POST" class="transport-form">
            @csrf
            
            <div class="form-row">
                <div class="form-group">
                    <label for="name"><i class="fas fa-bus"></i> Operator Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name') <small class="input-error">{{ $message }}</small> @enderror
                </div>
                
                <div class="form-group">
                    <label for="price"><i class="fas fa-dollar-sign"></i> Price</label>
                    <input type="number" id="price" step="0.01" name="price" value="{{ old('price') }}" min="0" required>
                    @error('price') <small class="input-error">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="route_from"><i class="fas fa-map-marker-alt"></i> Route From</label>
                    <input type="text" id="route_from" name="route_from" value="{{ old('route_from') }}" required>
                    @error('route_from') <small class="input-error">{{ $message }}</small> @enderror
                </div>
                
                <div class="form-group">
                    <label for="route_to"><i class="fas fa-map-marker-alt"></i> Route To</label>
                    <input type="text" id="route_to" name="route_to" value="{{ old('route_to') }}" required>
                    @error('route_to') <small class="input-error">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="departure_time"><i class="fas fa-clock"></i> Departure Time</label>
                    <input type="time" id="departure_time" name="departure_time" value="{{ old('departure_time') }}" required>
                    @error('departure_time') <small class="input-error">{{ $message }}</small> @enderror
                </div>
                
                <div class="form-group">
                    <label for="total_seats"><i class="fas fa-chair"></i> Total Seats</label>
                    <input type="number" id="total_seats" name="total_seats" value="{{ old('total_seats') }}" min="1" required>
                    @error('total_seats') <small class="input-error">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">
                    <i class="fas fa-plus"></i> Add Bus
                </button>
                <a href="{{ route('admin.transports.viewtransports') }}" class="btn-cancel">
                    <i class="fas fa-arrow-left"></i> Back to List
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

<style>
    .add-transport-wrapper {
        width: 100%;
        max-width: 100%;
        margin: 0;
        padding: 0;
    }

    .form-container {
        max-width: 900px;
        margin: 0 auto;
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(28, 88, 115, 0.1);
        position: relative;
    }

    .form-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(90deg, #1c5873, #36a2eb, #1c5873);
    }

    .form-header {
        background: linear-gradient(135deg, #1c5873 0%, #2d6b84 50%, #36a2eb 100%);
        color: white;
        padding: 2rem;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .form-header::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        animation: shimmer 3s ease-in-out infinite;
    }

    @keyframes shimmer {
        0%, 100% { transform: rotate(0deg); }
        50% { transform: rotate(180deg); }
    }

    .form-header h2 {
        margin: 0 0 0.5rem 0;
        font-size: 2rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
    }

    .form-header p {
        margin: 0;
        opacity: 0.9;
        font-size: 1.1rem;
    }

    .transport-form {
        padding: 2.5rem;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
        margin-bottom: 2rem;
    }

    .form-group {
        position: relative;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.75rem;
        font-weight: 600;
        color: #1c5873;
        font-size: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .form-group label i {
        color: #36a2eb;
        width: 20px;
    }

    .form-group input {
        width: 100%;
        padding: 1rem 1.25rem;
        border: 2px solid #e9ecef;
        border-radius: 12px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    .form-group input:focus {
        outline: none;
        border-color: #1c5873;
        box-shadow: 0 0 0 4px rgba(28, 88, 115, 0.1);
        transform: translateY(-2px);
    }

    .form-group input:hover {
        border-color: #36a2eb;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .input-error {
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 0.5rem;
        display: block;
        font-weight: 500;
    }

    .form-actions {
        margin-top: 3rem;
        display: flex;
        gap: 1rem;
        justify-content: center;
        align-items: center;
    }

    .btn-submit {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        color: white;
        border: none;
        padding: 1rem 2rem;
        border-radius: 25px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
        display: flex;
        align-items: center;
        gap: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-submit:hover {
        background: linear-gradient(135deg, #218838 0%, #1e7e34 100%);
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(40, 167, 69, 0.4);
    }

    .btn-cancel {
        background: linear-gradient(135deg, #6c757d 0%, #5a6268 100%);
        color: white;
        text-decoration: none;
        padding: 1rem 2rem;
        border-radius: 25px;
        font-size: 1.1rem;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(108, 117, 125, 0.3);
        display: flex;
        align-items: center;
        gap: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-cancel:hover {
        background: linear-gradient(135deg, #5a6268 0%, #495057 100%);
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(108, 117, 125, 0.4);
        text-decoration: none;
        color: white;
    }

    #msg-box {
        margin: 1.5rem 2.5rem;
        padding: 1rem 1.5rem;
        border-radius: 12px;
        font-weight: 600;
        text-align: center;
        opacity: 0;
        display: none;
        transition: all 0.4s ease;
        transform: translateY(-10px);
    }

    #msg-box.show {
        display: block;
        opacity: 1;
        transform: translateY(0);
    }

    #msg-box.success {
        background: linear-gradient(135d, #d1edff 0%, #b3d9ff 100%);
        border: 2px solid #28a745;
        color: #155724;
    }

    #msg-box.error {
        background: linear-gradient(135deg, #f8d7da 0%, #f5c2c7 100%);
        border: 2px solid #dc3545;
        color: #721c24;
    }

    /* Mobile Responsive Design */
    @media (max-width: 768px) {
        .add-transport-wrapper {
            padding: 1rem;
        }

        .form-container {
            margin: 0;
            border-radius: 15px;
        }

        .form-header {
            padding: 1.5rem;
        }

        .form-header h2 {
            font-size: 1.5rem;
            flex-direction: column;
            gap: 0.5rem;
        }

        .transport-form {
            padding: 1.5rem;
        }

        .form-row {
            grid-template-columns: 1fr;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .form-actions {
            flex-direction: column;
            gap: 1rem;
        }

        .btn-submit,
        .btn-cancel {
            width: 100%;
            justify-content: center;
            padding: 1.25rem 2rem;
        }

        #msg-box {
            margin: 1rem;
        }
    }

    @media (max-width: 480px) {
        .form-header h2 {
            font-size: 1.25rem;
        }

        .form-group input {
            padding: 0.875rem 1rem;
        }

        .btn-submit,
        .btn-cancel {
            font-size: 1rem;
            padding: 1rem 1.5rem;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('addBusForm');
    const msgBox = document.getElementById('msg-box');

    function showMsg(message, type) {
        msgBox.textContent = message;
        msgBox.className = type + ' show';
        msgBox.style.display = 'block';
        
        // Trigger reflow and show animation
        setTimeout(() => {
            msgBox.style.opacity = '1';
            msgBox.style.transform = 'translateY(0)';
        }, 10);

        setTimeout(() => {
            hideMsg();
        }, 3000);
    }

    function hideMsg() {
        msgBox.style.opacity = '0';
        msgBox.style.transform = 'translateY(-10px)';
        setTimeout(() => {
            msgBox.style.display = 'none';
            msgBox.className = '';
        }, 400);
    }

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(form);
        const submitBtn = form.querySelector('.btn-submit');
        const originalText = submitBtn.innerHTML;
        
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Adding Bus...';
        submitBtn.disabled = true;

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'Accept': 'application/json'
                },
                body: formData
            });

            const result = await response.json();

            if (response.ok) {
                showMsg(result.message || 'Bus added successfully!', 'success');
                form.reset();
            } else {
                showMsg(result.message || 'Failed to add bus. Please check your input.', 'error');
            }
        } catch (error) {
            console.error('Error adding bus:', error);
            showMsg('Something went wrong. Please try again.', 'error');
        } finally {
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }
    });
});
</script>
