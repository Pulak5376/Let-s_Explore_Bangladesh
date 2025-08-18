@extends('layouts.app')

@section('title', 'Your Cart')

@section('content')
<section class="cart-section" style="padding: 30px 10px; max-width: 900px; margin: auto;">
  <h1 style="text-align:center; margin-bottom:30px;">
    <i class="fas fa-shopping-cart me-2"></i>Your Booking Cart
  </h1>

  @if(session('success'))
    <div class="alert alert-success">
      <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
    </div>
  @endif

  @if(session('error'))
    <div class="alert alert-danger">
      <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
    </div>
  @endif

  @if(count($cart) > 0)
  <div class="cart-table-wrapper" style="overflow-x:auto;">
    <table class="cart-table" style="width:100%; border-collapse:collapse; min-width: 600px;">
      <thead>
        <tr style="background:#f5f5f5;">
          <th><i class="fas fa-map-marker-alt me-1"></i>Package</th>
          <th><i class="fas fa-money-bill-wave me-1"></i>Price per Person</th>
          <th><i class="fas fa-users me-1"></i>Quantity</th>
          <th><i class="fas fa-calculator me-1"></i>Subtotal</th>
          <th><i class="fas fa-trash me-1"></i>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($cart as $item)
        <tr class="cart-item-row">
          <td>
            <div class="package-info">
              <strong>{{ $item['name'] }}</strong>
              <small class="text-muted d-block">📍 {{ $item['location'] }}</small>
              <small class="text-info">{{ $item['day'] }} days • {{ $item['person'] }} persons</small>
            </div>
          </td>
          <td class="price-cell">৳{{ number_format($item['price'], 2) }}</td> 
          <td class="quantity-cell">
            <span class="quantity-badge">{{ $item['quantity'] }}</span>
          </td>
          <td class="subtotal-cell">৳{{ number_format($item['price'] * $item['quantity'], 2) }}</td>
          <td class="action-cell">
            <form action="{{ route('cart.remove') }}" method="POST" class="d-inline">
              @csrf
              <input type="hidden" name="place_id" value="{{ $item['id'] }}" />
              <button type="submit" class="remove-btn" title="Remove item" 
                      onclick="return confirm('Are you sure you want to remove this item?')">
                <i class="fas fa-trash"></i>
              </button>
            </form>
          </td>
        </tr>
        @endforeach
        <tr class="total-row">
          <td colspan="3" class="total-label">
            <strong><i class="fas fa-receipt me-2"></i>Total Amount:</strong>
          </td>
          <td colspan="2" class="total-amount">
            <strong>৳{{ number_format($total, 2) }}</strong>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- Payment Section -->
  <div class="payment-section mt-4">
    <div class="payment-card">
      <h3 class="payment-title">
        <i class="fas fa-credit-card me-2"></i>Complete Your Booking
      </h3>
      <div class="payment-summary">
        <div class="summary-row">
          <span>Items in cart:</span>
          <span>{{ count($cart) }} package(s)</span>
        </div>
        <div class="summary-row">
          <span>Total amount:</span>
          <span class="total-price">৳{{ number_format($total, 2) }}</span>
        </div>
      </div>
      
      <form action="{{ route('cart.checkout') }}" method="POST" class="payment-form">
        @csrf
        <div class="payment-methods">
          <h4><i class="fas fa-wallet me-2"></i>Choose Payment Method</h4>
          <div class="payment-options">
            <label class="payment-option">
              <input type="radio" name="payment_method" value="bkash" checked>
              <span class="payment-icon">📱</span>
              <span>bKash</span>
            </label>
            <label class="payment-option">
              <input type="radio" name="payment_method" value="nagad">
              <span class="payment-icon">💳</span>
              <span>Nagad</span>
            </label>
            <label class="payment-option">
              <input type="radio" name="payment_method" value="rocket">
              <span class="payment-icon">🚀</span>
              <span>Rocket</span>
            </label>
            <label class="payment-option">
              <input type="radio" name="payment_method" value="card">
              <span class="payment-icon">💳</span>
              <span>Credit/Debit Card</span>
            </label>
          </div>
        </div>

        <div class="checkout-buttons">
          <a href="{{ route('places') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Continue Shopping
          </a>
          <button type="submit" class="btn btn-primary checkout-btn">
            <i class="fas fa-lock me-2"></i>Proceed to Payment
          </button>
        </div>
      </form>
    </div>
  </div>

  @else
    <div class="empty-cart">
      <i class="fas fa-shopping-cart empty-icon"></i>
      <h3>Your cart is empty</h3>
      <p>Looks like you haven't added any packages yet.</p>
      <a href="{{ route('places') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Explore Places
      </a>
    </div>
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

  .alert {
    padding: 15px 20px;
    border-radius: 10px;
    margin-bottom: 20px;
    border: none;
    font-weight: 500;
  }

  .alert-success {
    background: linear-gradient(135deg, #d4edda, #c3e6cb);
    color: #155724;
  }

  .alert-danger {
    background: linear-gradient(135deg, #f8d7da, #f5c6cb);
    color: #721c24;
  }

  .cart-table {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(46, 125, 50, 0.1);
  }

  .cart-table th {
    background: linear-gradient(135deg, #4caf50, #388e3c);
    color: white;
    font-weight: 600;
    padding: 15px 12px;
    text-align: center;
  }

  .cart-table td {
    padding: 15px 12px;
    text-align: center;
    border-bottom: 1px solid rgba(102, 187, 106, 0.2);
    vertical-align: middle;
  }

  .cart-item-row {
    transition: all 0.3s ease;
  }

  .cart-item-row:hover {
    background-color: rgba(76, 175, 80, 0.05);
  }

  .package-info strong {
    color: #2e7d32;
    font-size: 1.1rem;
  }

  .package-info small {
    font-size: 0.85rem;
    margin-top: 2px;
  }

  .quantity-badge {
    background: linear-gradient(135deg, #2196f3, #1976d2);
    color: white;
    padding: 5px 12px;
    border-radius: 15px;
    font-weight: 600;
  }

  .price-cell, .subtotal-cell {
    font-weight: 600;
    color: #2e7d32;
    font-size: 1.1rem;
  }

  .total-row td {
    border-bottom: none !important;
    background: linear-gradient(135deg, #e8f5e8, #f1f8e9);
    padding: 20px 12px;
  }

  .total-label {
    font-size: 1.2rem;
    color: #2e7d32;
  }

  .total-amount {
    font-size: 1.4rem;
    color: #1b5e20;
  }

  .remove-btn {
    background: linear-gradient(135deg, #f44336, #d32f2f);
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
  }

  .remove-btn:hover {
    background: linear-gradient(135deg, #d32f2f, #b71c1c);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(244, 67, 54, 0.3);
  }

  /* Payment Section */
  .payment-section {
    margin-top: 30px;
  }

  .payment-card {
    background: white;
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 8px 25px rgba(46, 125, 50, 0.1);
    border: 2px solid rgba(102, 187, 106, 0.2);
  }

  .payment-title {
    color: #2e7d32;
    margin-bottom: 20px;
    font-size: 1.5rem;
  }

  .payment-summary {
    background: linear-gradient(135deg, #f1f8e9, #e8f5e8);
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 25px;
  }

  .summary-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    font-size: 1.1rem;
  }

  .summary-row:last-child {
    margin-bottom: 0;
    font-weight: 600;
    font-size: 1.2rem;
    color: #2e7d32;
    border-top: 1px solid rgba(46, 125, 50, 0.2);
    padding-top: 10px;
  }

  .payment-methods h4 {
    color: #2e7d32;
    margin-bottom: 15px;
  }

  .payment-options {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 15px;
    margin-bottom: 25px;
  }

  .payment-option {
    display: flex;
    align-items: center;
    padding: 15px;
    border: 2px solid #e0e0e0;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.3s ease;
  }

  .payment-option:hover {
    border-color: #4caf50;
    background: rgba(76, 175, 80, 0.05);
  }

  .payment-option input[type="radio"] {
    margin-right: 10px;
  }

  .payment-option input[type="radio"]:checked + .payment-icon + span {
    color: #2e7d32;
    font-weight: 600;
  }

  .payment-option:has(input[type="radio"]:checked) {
    border-color: #4caf50;
    background: rgba(76, 175, 80, 0.1);
  }

  .payment-icon {
    font-size: 1.2rem;
    margin-right: 8px;
  }

  .checkout-buttons {
    display: flex;
    gap: 15px;
    justify-content: center;
  }

  .btn {
    padding: 12px 25px;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 1rem;
  }

  .btn-primary {
    background: linear-gradient(135deg, #4caf50, #388e3c);
    color: white;
  }

  .btn-primary:hover {
    background: linear-gradient(135deg, #388e3c, #2e7d32);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(76, 175, 80, 0.3);
  }

  .btn-secondary {
    background: linear-gradient(135deg, #6c757d, #5a6268);
    color: white;
  }

  .btn-secondary:hover {
    background: linear-gradient(135deg, #5a6268, #495057);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(108, 117, 125, 0.3);
  }

  /* Empty Cart */
  .empty-cart {
    text-align: center;
    padding: 60px 20px;
    color: #666;
  }

  .empty-icon {
    font-size: 4rem;
    color: #ccc;
    margin-bottom: 20px;
  }

  .empty-cart h3 {
    color: #555;
    margin-bottom: 10px;
  }

  .empty-cart p {
    margin-bottom: 25px;
    color: #888;
  }

  /* Responsive Design */
  @media (max-width: 768px) {
    .cart-table-wrapper {
      overflow-x: auto;
    }
    
    .cart-table {
      min-width: 600px;
      font-size: 0.9rem;
    }
    
    .payment-options {
      grid-template-columns: 1fr 1fr;
    }
    
    .checkout-buttons {
      flex-direction: column;
    }
    
    .btn {
      width: 100%;
      justify-content: center;
    }
  }

  @media (max-width: 480px) {
    .cart-section {
      padding: 20px 5px;
    }
    
    .payment-card {
      padding: 20px;
    }
    
    .payment-options {
      grid-template-columns: 1fr;
    }
  }
</style>
@endsection






























