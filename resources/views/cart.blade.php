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
          <td>${{ $item['price'] }}</td>
          <td>{{ $item['quantity'] }}</td>
          <td>${{ $item['price'] * $item['quantity'] }}</td>
          <td>
            <form action="{{ route('cart.remove') }}" method="POST">
              @csrf
              <input type="hidden" name="place_id" value="{{ $item['id'] }}" />
              <button type="submit" class="remove-btn" style="background:#e74c3c; color:#fff; border:none; padding:6px 14px; border-radius:4px; cursor:pointer;">Remove</button>
            </form>
          </td>
        </tr>
        @endforeach
        <tr>
          <td colspan="3" style="text-align: right; font-weight: bold;">Total:</td>
          <td colspan="2" style="font-weight: bold;">${{ $total }}</td>
        </tr>
      </tbody>
    </table>
  </div>
  @else
    <p style="text-align:center; color:#888;">Your cart is empty.</p>
  @endif
</section>

<style>
  .cart-table th, .cart-table td {
    padding: 12px 8px;
    text-align: center;
    border-bottom: 1px solid #eee;
  }
  .cart-table th {
    font-weight: 600;
  }
  .cart-table tr:last-child td {
    border-bottom: none;
  }
  .remove-btn:hover {
    background: #c0392b !important;
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
