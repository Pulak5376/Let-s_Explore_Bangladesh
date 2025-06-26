@extends('layouts.app')

@section('title', 'Your Cart')

@section('content')
<section class="cart-section">
  <h1>Your Booking Cart</h1>

  @if(session('success'))
    <p class="success-msg">{{ session('success') }}</p>
  @endif

  @if(count($cart) > 0)
  <table class="cart-table">
    <thead>
      <tr>
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
            <button type="submit" class="remove-btn">Remove</button>
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
  @else
    <p>Your cart is empty.</p>
  @endif
</section>
@endsection
