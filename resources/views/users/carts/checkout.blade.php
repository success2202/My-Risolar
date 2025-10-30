@extends('layouts.app')
@section('title')
<title>  Checkout | Risolar</title>
@endsection
@section('head')

<link rel="canonical" href="{{ url()->current() }}">

@endsection
@section('scripts')
<script src="https://js.paystack.co/v1/inline.js"></script>

@endsection
@section('content')
@section('styles')

<style>
<!-- Custom Styles for Payment Button -->
<style>
  .btn-gradient {
    background: linear-gradient(135deg, #007bff, #0056d2);
    color: #fff;
    font-size: 1rem;
    font-weight: 500;
    border: none;
    border-radius: 8px;
    transition: all 0.3s ease-in-out;
  }

  .btn-gradient:hover {
    background: linear-gradient(135deg, #0056d2, #003d99);
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
  }


.delivery{
    color:#343232;
     font-size:14px;
    font-family:Verdana,'Geneva', Tahoma, sans-serif"
}
.bgg{
    background-color: grey !important;
    font-size: 15px !important;
    color: white;
    padding-left: 8px;
}
</style>
@endsection

<div style="height: 2em; background:#eee"></div>



<div class="container my-5">
  <div class="row g-4">
    <!-- Billing Info -->
    <div class="col-lg-7">
      <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="mb-0 text-secondary fw-semibold">Billing Information</h6>
            <a href="" class="small text-decoration-none text-primary">Change Address</a>
          </div>

          {{-- <p class="mb-1 fw-medium">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
          <p class="text-muted mb-0">
            {{ Auth::user()->address ?? 'No address saved' }}
          </p> --}}
          
           <p style="color:#76717a">Name: {{ $address->name }}</p>
                <p style="color:#76717a">Address: {{ $address->address?$address->address.',': '' }} {{ $address->city?$address->city.',': '' }} 
                    {{ $address->state?$address->state.',':'' }} {{ $address->country?$address->country.',':'' }} </p>

                     
                <p style="color:#76717a"> {{ $address->phone?'Phone: '.$address->phone: '' }}</p>
                <p style="color:#76717a">  {{ $address->email?'Email: '. $address->email: '' }}</p>
                <p style="color:#76717a">  {{ $address->country?'Country: '. $address->country: '' }}</p>
                <p style="color:#76717a">  {{ $address->city?'City: '. $address->city: '' }}</p>

                <p style="color:#76717a">Order No:  {{ $orderNo}}</p>
                
        </div>
      </div>

      <!-- 🚀 Payment Method -->
      <div class="card shadow-sm border-0">
        <div class="card-body">
          <h6 class="mb-3 text-secondary fw-semibold">Payment Method</h6>

          <!-- Credit Card Option -->
          <form action="{{ route('checkout.process') }}" method="POST">
                @csrf
          <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="payment_method" id="card" value="credit" data-bs-toggle="collapse" data-bs-target="#cardDetails" checked>
            <label class="form-check-label" for="creditCard">
              <i class="fas fa-credit-card me-2 text-primary"></i> Credit / Debit Card
            </label>
            <div class="ms-4 mt-2 small text-muted">
              Pay securely using Visa, Mastercard, or Verve.
            </div>
          </div>

          <!-- Collapsible Card Fields -->
          {{-- <div class="collapse show" id="cardDetails">
            <div class="border rounded p-3 bg-light">
              <div class="mb-3">
                <label for="cardNumber" class="form-label small">Card Number</label>
                <input type="text" class="form-control" id="cardNumber" placeholder="1234 5678 9012 3456">
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="expiryDate" class="form-label small">Expiry Date</label>
                  <input type="text" class="form-control" id="expiryDate" placeholder="MM/YY">
                </div>
                <div class="col-md-6 mb-3">
                  <label for="cvv" class="form-label small">CVV</label>
                  <input type="text" class="form-control" id="cvv" placeholder="123">
                </div>
              </div>
              <div class="mb-3">
                <label for="cardName" class="form-label small">Name on Card</label>
                <input type="text" class="form-control" id="cardName" placeholder="John Doe">
              </div>
            </div>
          </div> --}}

          <!-- PayPal Option -->
          <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="payment_method" id="delivery" value="delivery" data-bs-toggle="" data-bs-target="#cardDetails">
            <label class="form-check-label" for="delivery">
              <i class="fab fa-paypal me-2 text-primary"></i> Home Delivery
            </label>
            <div class="ms-4 mt-2 small text-muted">
              Redirects to Shipment address.
            </div>
          </div>

          

          <!-- Bank Transfer Option -->
          <div class="form-check">
            <input class="form-check-input" type="radio" name="payment_method" id="bank" value="bank" data-bs-toggle="collapse" data-bs-target="#cardDetails">
            <label class="form-check-label" for="bank">
              <i class="fas fa-university me-2 text-primary"></i> Bank Transfer
            </label>
            <div class="ms-4 mt-2 small text-muted">
              Transfer funds directly to our account. Details will be shown after checkout.
            </div>
          </div>
          <a  href="{{route('users.products')}}">Continue Shopping</a>
        </div>
      </div>
    </div>
      <!-- Existing addresses -->
     
                    @if($address)
    <input type="hidden" name="address_id" id="address_id" value="{{ $address->id }}">
    

@endif


    <!-- Order Summary -->
    <div class="col-lg-5">
      <div class="card shadow-sm border-0">
        <div class="card-body">
          <h6 class="mb-4 text-secondary fw-semibold">Order Summary</h6>

          @php
            $totalItems = 0;
            $totalCost = 0;
          @endphp

          @if(session('cart') && count(session('cart')) > 0)
            @foreach (session('cart') as $id => $cart)
              @php
                $totalItems += $cart['quantity'];
                $totalCost += $cart['price'] * $cart['quantity'];
              @endphp
              <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                <div>
                  <p class="mb-0 fw-medium">{{ $cart['name'] }}</p>
                  <small class="text-muted">Qty: {{ $cart['quantity'] }}</small>
                </div>
                <span class="fw-semibold">
                  {{ moneyFormat($cart['price'] * $cart['quantity'], 2) }}
                </span>
              </div>
            @endforeach

            <!-- Shipping -->
            <div class="d-flex justify-content-between py-2">
              <span class="text-muted">Shipping</span>
              <span class="fw-medium">{{ moneyFormat($shipping_fee) }}</span>
            </div>

            <!-- Total Items -->
            <div class="d-flex justify-content-between py-2">
              <span class="text-muted">Total Items</span>
              <span class="fw-medium">{{ $totalItems }} items</span>
            </div>

            <hr>

            <!-- Final Total -->
            <div class="d-flex justify-content-between fw-semibold fs-6">
              <span>Total</span>
              <span>{{ moneyFormat($totalCost + $shipping_fee, 2) }}</span>
            </div>

            <div class="d-flex justify-content-between fw-semibold fs-6">
            
              <span><a href=""> Modity Cart </a> </span>
            </div>

          @else
            <p class="text-muted">Your cart is empty.</p>
          @endif


          <!-- 🚀 Payment Button -->
          <div class="mt-4">
          @if(session()->has('cartSession'))
            <button type="submit" id="payBtn" class="btn btn-gradient w-100 py-3 d-flex justify-content-center align-items-center">
              <i class="fas fa-lock me-2"></i>
              Proceed to Secure Payment
            </button> 
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</form>
<!-- Custom Styles -->
<style>
  .btn-gradient {
    background: linear-gradient(135deg, #007bff, #0056d2);
    color: #fff;
    font-size: 1rem;
    font-weight: 500;
    border: none;
    border-radius: 8px;
    transition: all 0.3s ease-in-out;
  }

  .btn-gradient:hover {
    background: linear-gradient(135deg, #0056d2, #003d99);
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
  }
</style>






@endsection

@section('script')

<script>
    
    $('#delivery').on('click', function(){
        if($('#delivery').attr('checked', true))
        {
           let amount = $('#sub_total').val(); 
           let fee = $('#delivery').data('amount');
           let total = parseFloat(amount) + parseFloat(fee);
             $('#total').html('₦' + total.toLocaleString('en-US', { minimumFractionDigits: 2 }));
            $('#amount').val(total);
            $('#fee').html('₦' + fee.toLocaleString('en-US', { minimumFractionDigits: 2 }));
        }
    })

    $('#home').on('click', function(){
        if($('#home').attr('checked', true))
        {
           let amount = $('#sub_total').val(); 
           let fee = $('#home').data('amount');
           let total = parseFloat(amount) + parseFloat(fee);
           $('#total').html('₦' + total.toLocaleString('en-US', { minimumFractionDigits: 2}));
           $('#amount').val(total);
           $('#fee').html('₦' + fee.toLocaleString('en-US', { minimumFractionDigits: 2 }));
        }
    });



document.getElementById('proceedBtn').addEventListener('click', function() {
    let selected = document.querySelector('input[name="payment_method"]:checked').value;

    if (selected === 'card') {
        // Show card form
        document.getElementById('cardForm').classList.remove('d-none');
        document.getElementById('cardForm').scrollIntoView({ behavior: 'smooth' });
    } else if (selected === 'delivery') {
        // Redirect to place order immediately
        window.location.href = "{{ route('checkout.index') }}";
    }
});



</script>

 


@endsection