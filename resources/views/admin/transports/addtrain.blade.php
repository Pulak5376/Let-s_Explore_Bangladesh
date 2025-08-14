@extends('layouts.admin')

@section('title', 'Add Train')

@section('header', 'Add New Train')
@section('content')
<div id="msg-box"></div>

<form id="addTrainForm" action="{{ route('admin.transports.storetrain') }}" method="POST" class="train-form">
    @csrf
    <div class="form-group">
        <label>Operator Name</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
        @error('name') <small class="input-error">{{ $message }}</small> @enderror
    </div>

    <div class="form-group">
        <label>Route From</label>
        <input type="text" name="route_from" value="{{ old('route_from') }}" required>
        @error('route_from') <small class="input-error">{{ $message }}</small> @enderror
    </div>

    <div class="form-group">
        <label>Route To</label>
        <input type="text" name="route_to" value="{{ old('route_to') }}" required>
        @error('route_to') <small class="input-error">{{ $message }}</small> @enderror
    </div>

    <div class="form-group">
        <label>Departure Time</label>
        <input type="time" name="departure_time" value="{{ old('departure_time') }}" required>
        @error('departure_time') <small class="input-error">{{ $message }}</small> @enderror
    </div>

    <div class="form-group">
        <label>Price</label>
        <input type="number" step="1" name="price" value="{{ old('price') }}" required>
        @error('price') <small class="input-error">{{ $message }}</small> @enderror
    </div>

    <div class="form-group">
        <label>Total Seats</label>
        <input type="number" name="total_seats" value="{{ old('total_seats') }}" required>
        @error('total_seats') <small class="input-error">{{ $message }}</small> @enderror
    </div>

    <button type="submit" class="btn-submit">Add Train</button>
</form>

<style>
.train-form {
    max-width: 520px;
    margin: 2rem auto;
    background: #fff;
    padding: 2.5rem 2rem;
    border-radius: 12px;
    box-shadow: 0 4px 24px rgba(28, 88, 115, 0.10);
    border: 1px solid #e3e8ee;
}

.form-group {
    margin-bottom: 1.5rem;
}
.form-group label {
    display: block;
    margin-bottom: 0.4rem;
    font-weight: 600;
    color: #1c5873;
}
.form-group input {
    width: 100%;
    padding: 0.6rem 0.8rem;
    border-radius: 6px;
    border: 1px solid #bfcad6;
    background: #f7fafc;
    font-size: 1rem;
    transition: border-color 0.2s, background 0.2s;
}
.form-group input:focus {
    border-color: #1c5873;
    background: #fff;
    outline: none;
}

.input-error {
    color: #e74c3c;
    font-size: 0.92rem;
    margin-top: 0.2rem;
}

.btn-submit {
    width: 100%;
    padding: 0.9rem 0;
    background: linear-gradient(90deg, #1c5873 0%, #2a5298 100%);
    color: #fff;
    border: none;
    border-radius: 6px;
    font-weight: 700;
    font-size: 1.08rem;
    cursor: pointer;
    box-shadow: 0 2px 8px rgba(44, 62, 80, 0.08);
    transition: background 0.2s, transform 0.2s;
}
.btn-submit:hover {
    background: linear-gradient(90deg, #16475a 0%, #1c5873 100%);
    transform: translateY(-2px);
}

#msg-box {
    position: fixed;
    top: 32px;
    left: 50%;
    transform: translateX(-50%) translateY(-40px);
    min-width: 320px;
    max-width: 90vw;
    z-index: 9999;
    padding: 1rem 2rem;
    border-radius: 10px;
    font-weight: 600;
    text-align: center;
    opacity: 0;
    display: none;
    box-shadow: 0 2px 8px rgba(44, 62, 80, 0.10);
    transition: opacity 0.4s, transform 0.4s;
}

#msg-box.show {
    display: block;
    opacity: 1;
    transform: translateX(-50%) translateY(0);
}

#msg-box.success {
    background: #e6f9ed;
    color: #218838;
    border: 1px solid #b7e4c7;
}

#msg-box.error {
    background: #fff0f0;
    color: #b71c1c;
    border: 1px solid #e53935;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('addTrainForm');
    const msgBox = document.getElementById('msg-box');

    function showMsg(message, type) {
        msgBox.textContent = message;
        msgBox.className = type + ' show';
        msgBox.style.display = 'block';
        setTimeout(() => {
            msgBox.style.opacity = '1';
            msgBox.style.transform = 'translateX(-50%) translateY(0)';
        }, 10);

        setTimeout(() => {
            hideMsg();
        }, 2500);
    }

    function hideMsg() {
        msgBox.style.opacity = '0';
        msgBox.style.transform = 'translateX(-50%) translateY(-40px)';
        setTimeout(() => {
            msgBox.style.display = 'none';
            msgBox.className = '';
        }, 400);
    }

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(form);

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
                showMsg(result.message || 'Train added successfully!', 'success');
                form.reset();
            } else {
                showMsg(result.message || 'Failed to add train.', 'error');
            }
        } catch (error) {
            console.error('Error adding train:', error);
            showMsg('Something went wrong. Please try again.', 'error');
        }
    });
});
</script>
@endsection
