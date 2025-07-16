@extends('layouts.app')

@section('title', 'Your Cart')

@section('content')
<section class="cart-section" style="padding: 30px 10px; max-width: 900px; margin: auto;">
  <h1 style="text-align:center; margin-bottom:30px;">Your Booking Cart</h1>

  @if(session('success'))
    <p class="success-msg">{{ session('success') }}</p>
  @endif

  @if(count($cart) > 0)
  <div class="cart-table-wrapper" style="overflow-x:auto;">
    <table class="cart-table" style="width:100%; border-collapse:collapse; min-width: 600px;">
      <thead>
        <tr style="background:#f5f5f5;">
          <th>Package</th>
          <th>Price per Person</th>
          <th>Quantity</th>
          <th>Subtotal</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($cart as $item)
        <tr>
          <td>{{ $item['name'] }}</td>
          <td> BDT {{ $item['price'] }}</td> 
          <td>{{ $item['quantity'] }}</td>
          <td>BDT {{ $item['price'] * $item['quantity'] }}</td>
          <td>
            <form action="{{ route('cart.remove') }}" method="POST">
              @csrf
              <input type="hidden" name="place_id" value="{{ $item['id'] }}" />
              <button type="submit" class="remove-btn" style="background:rgb(185, 180, 180); border:none; padding:6px 14px; border-radius:4px; cursor:pointer;">
                ❌</button>
            </form>
          </td>
        </tr>
        @endforeach
        <tr>
          <td colspan="3" style="font-weight: bold; font-size: 25px">Total:</td>
          <td colspan="2" style="font-weight: bold;font-size: 25px; text-align: center;">BDT {{$total}}  </td>
        </tr>
      </tbody>
      </table>
  </div>
  @else
    <p style="text-align:center; color:#888;">Your cart is empty.</p>
  @endif
</section>

<style>
  .cart-section {
    background: linear-gradient(135deg, #f1f8e9 0%, #e8f5e8 100%);
    border-radius: 15px;
    box-shadow: 0 8px 25px rgba(46, 125, 50, 0.15);
    border: 2px solid rgba(102, 187, 106, 0.2);
  }

  .cart-section h1 {
    color: #2e7d32;
    font-weight: 600;
  }

  .success-msg {
    background: linear-gradient(135deg, #4caf50, #388e3c);
    color: white;
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 20px;
    text-align: center;
  }

  .cart-table {
    background: rgba(255, 255, 255, 0.9);
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(46, 125, 50, 0.1);
  }

  .cart-table th {
    background: linear-gradient(135deg, #4caf50, #388e3c);
    color: white;
    font-weight: 600;
  }

  .cart-table th, .cart-table td {
    padding: 12px 8px;
    text-align: center;
    border-bottom: 1px solid rgba(102, 187, 106, 0.2);
  }

  .cart-table tr:last-child td {
    border-bottom: none;
    background: linear-gradient(135deg, #e8f5e8, #f1f8e9);
    color: #2e7d32;
  }

  .remove-btn {
    background: linear-gradient(135deg, #f44336, #d32f2f) !important;
    color: white !important;
    border: none !important;
    padding: 8px 12px !important;
    border-radius: 6px !important;
    cursor: pointer !important;
    transition: all 0.3s ease !important;
  }

  .remove-btn:hover {
    background: linear-gradient(135deg, #d32f2f, #b71c1c) !important;
    transform: translateY(-1px);
    box-shadow: 0 4px 10px rgba(244, 67, 54, 0.3);
  }

  /* Dark Mode Styles */
  body.dark-mode {
    background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 50%, #1a1a1a 100%) !important;
  }

  body.dark-mode .cart-section {
    background: linear-gradient(135deg, #2c2c2c 0%, #3a3a3a 100%) !important;
    border-color: rgba(102, 187, 106, 0.3) !important;
    box-shadow: 0 8px 25px rgba(76, 175, 80, 0.2) !important;
  }

  body.dark-mode .cart-section h1 {
    color: #81c784 !important;
  }

  body.dark-mode .cart-section p {
    color: #b0bec5 !important;
  }

  body.dark-mode .cart-table {
    background: rgba(50, 50, 50, 0.9) !important;
    color: #e0e0e0 !important;
  }

  body.dark-mode .cart-table th {
    background: linear-gradient(135deg, #2e7d32, #1b5e20) !important;
  }

  body.dark-mode .cart-table th,
  body.dark-mode .cart-table td {
    border-bottom-color: rgba(102, 187, 106, 0.3) !important;
  }

  body.dark-mode .cart-table tr:last-child td {
    background: linear-gradient(135deg, #2e5d32, #3e7b40) !important;
    color: #a5d6a7 !important;
  }

  @media (max-width: 700px) {
    .cart-table-wrapper {
      overflow-x: auto;
    }
    .cart-table {
      min-width: 500px;
      font-size: 0.95rem;
    }
    .cart-section {
      padding: 15px 2px;
    }
  }
  @media (max-width: 500px) {
    .cart-table {
      min-width: 400px;
      font-size: 20px;
    }
    .cart-section h1 {
      font-size: 20px;
    }
    .cart-table th, .cart-table td {
      padding: 8px 4px;
    }
  }
</style>
@endsection






























