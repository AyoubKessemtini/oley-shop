@extends('layouts.app')
@section('content')
<div class="banner_section layout_padding">
    <div class="container">
        <div id="my_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-sm-12">
                            <img src="{{asset('uploads/fronts/electronics.png')}}" alt="">
                                <div class="buynow_bt"><a href="/">Buy Now</a></div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-sm-12">
                        <img src="{{asset('uploads/fronts/woman-accessory.png')}}" alt="">
                            <div class="buynow_bt"><a href="/">Buy Now</a></div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-sm-12">
                        <img src="{{asset('uploads/fronts/clothes.png')}}" alt="">
                            <div class="buynow_bt"><a href="/">Buy Now</a></div>
                        </div>
                    </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div>
      
<br><br>
   

<div class="container">
  <main>
    <br><br><br>
  <h1 class="fashion_taital">Order </h1>
  <br><br><br>
  
    <h3>Dir <span style="color:#f26522;">{{$user->firstName}} {{$user->lastName}}</span> , Please complete this Form to Order !!</h3>
    <br><br>
    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Your cart</span>
          <span class="badge bg-primary rounded-pill">{{$cartqte}}</span>
        </h4>
        <ul class="list-group mb-3">
        @foreach($cart as $product)
            <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                <h6 class="my-0">{{$product->product->title}}</h6>
                <small class="text-muted">Quantity : {{$product->qte}}</small>
                </div>
                <span class="text-muted">${{$product->product->price}}</span>
            </li>
          @endforeach
          
          <li class="list-group-item d-flex justify-content-between">
            <h4>Total (USD)</h4>
            <h3>${{$total}}</h3>
          </li>
        </ul>
      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Billing address</h4>
        <form class="needs-validation" action="{{route('order')}}" method="post" id="paymentform">
          <div class="row g-3">
            @csrf
            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" name="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="col-12">
              <label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" name="address2" placeholder="Apartment or suite">
            </div>

            <div class="col-md-3">
              <label for="phone" class="form-label">Phone number</label>
              <input type="number" class="form-control" name="phone" placeholder="" required>
            </div>

            <div class="col-md-5">
              <label for="country" class="form-label">Country</label>
              <input type="text" class="form-control" name="country" placeholder="" required>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label">State</label>
              <input type="text" class="form-control" name="state" placeholder="" required>
            </div>

            <div class="col-md-3">
              <label for="zip" class="form-label">Zip</label>
              <input type="text" class="form-control" name="zip" placeholder="" required>
            </div>
          </div>
          <hr class="my-4">
          <button class="w-100 btn btn-lg" type="submit" ><a id="paypal-button-container"></a></button>
        </form>
      </div>
    </div>
  </main>

  
</div>


    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      <script src="form-validation.js"></script>
      <script src="https://www.paypal.com/sdk/js?client-id={{env('PAYPALCLIENTID')}}"></script>



<script>
  paypal.Buttons({

    // Sets up the transaction when a payment button is clicked
    createOrder: function(data, actions) {
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '{{$total}}' // Can reference variables or functions. Example: `value: document.getElementById('...').value`
          }
        }]
      });
    },

    // Finalize the transaction after payer approval
    onApprove: function(data, actions) {
      return actions.order.capture().then(function(orderData) {
        // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            var transaction = orderData.purchase_units[0].payments.captures[0];
            alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');
            document.getElementById('paymentform').submit();

        // When ready to go live, remove the alert and show a success message within this page. For example:
        // var element = document.getElementById('paypal-button-container');
        // element.innerHTML = '';
        // element.innerHTML = '<h3>Thank you for your payment!</h3>';
        // Or go to another URL:  actions.redirect('thank_you.html');
      });
    }
  }).render('#paypal-button-container');

</script>
@endsection
