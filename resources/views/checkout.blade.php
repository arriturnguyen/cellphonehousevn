@extends('layouts.master')

@section('content')
        
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-7">
                <!-- Billing Details -->
                <div class="billing-details">
                    <div class="section-title">
                        <h3 class="title">Billing address</h3>
                    </div>
                    <form method="POST" action="{{ route('orders.store') }}">
                    @csrf
                    <div class="form-group">
                        <input class="input" type="text" name="user_name" placeholder="Name" required>
                    </div>
                    
                    <div class="form-group">
                        <input class="input" type="text" name="address" placeholder="Address" required>
                    </div>
                    <div class="form-group">
                        <input class="input" type="tel" name="phone" placeholder="Phone" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="cart" id="cart" readonly>
                    </div>
                    <div class="form-group">
                        <input type="number" name="amount" id="amount" readonly>
                    </div>
                    <div class="form-group">
                        <div class="input-checkbox">
                            <input type="checkbox" id="create-account">
                            <label for="create-account">
                                <span></span>
                                Create Account?
                            </label>
                            <div class="caption">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                                <div>
                                    <input class="input" type="email" name="email" placeholder="Email">
                                </div>
                                <br>
                                <div>
                                    <input class="input" type="password" name="password" placeholder="Enter Your Password">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Billing Details -->
                
            </div>

            <!-- Order Details -->
            <div class="col-md-5 order-details">
                <div class="section-title text-center">
                    <h3 class="title">Your Order</h3>
                </div>
                <div class="order-summary">
                    <div class="order-col">
                        <div><strong>PRODUCT</strong></div>
                        <div><strong>TOTAL</strong></div>
                    </div>
                    <div class="order-products">
                        <!-- <div class="order-col"> -->
                            <div class="order-product-qty"></div>
                            <!-- <div>1x Product Name Goes Here</div>
                            <div>$980.00</div> -->
                        <!-- </div> -->
                    </div>
                        <div class="order-product-ship"></div>
                        <div class="order-product-sum"></div>
                    <!-- <div class="order-col">
                        <div>Shiping</div>
                        <div><strong>FREE</strong></div>
                    </div> -->
                    <!-- <div class="order-col">
                        <div><strong>TOTAL</strong></div>
                        <div><strong class="order-total">$2940.00</strong></div>
                    </div> -->
                </div>
                <div class="payment-method">
                    <div class="input-radio">
                        <input type="radio" name="payment" id="payment-3" checked>
                        <label for="payment-3">
                            <span></span>
                            COD (Cash On Delivery)
                        </label>
                        <div class="caption">
                            <p>Rely on Viettel Post to collect payment for your shipment at the time of delivery.</p>
                        </div>
                    </div>
                </div>

                <button type="submit" name="submit" class="primary-btn order-submit">Place order</button>
            </div>
            </form>
            <!-- /Order Details -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<script type="text/javascript">
    $(document).ready(function() {
        console.log(cart);
        showCart(cart);
    });
    var cart = JSON.parse(localStorage.getItem('cart'));
    $('#cart').val(localStorage.getItem('cart'));
    function showCart(cart) {
        // alert('Test');
        var html = '', ship_html = '', sum_html = '', subtotal = 0, total = 0, ship_fee = 30000;
        if(cart.length){
            $('.your-cart').html('Your Cart');
            for(var i=0; i<cart.length; i++) {
                var cartItem = cart[i];
                subtotal += cartItem.price * cartItem.quantity;
                html += ' <div class="order-col"> '+
                        '    <div>'+cartItem.quantity+' x '+cartItem.name+
                        ' </div>'+
                        '    <div>'+subtotal+'</div>'+
                        ' </div>';
                total += subtotal;            
            }
                total += ship_fee;
            ship_html +=    ' <div class="order-col"> '+
                            ' <div>'+'Shiping'+'</div>'+
                            '    <div>'+ship_fee+
                            ' </div>'+
                            ' </div>';

            sum_html  +=    ' <div class="order-col"> '+
                            ' <div>'+'<strong>'+'TOTAL'+'</strong>'+'</div>'+
                            ' <div>'+'<strong class="order-total">'+total+'</strong>'+'</div>'+
                            ' </div>';
            $('.order-product-qty').html(html);
            $('.order-product-ship').html(ship_html);
            $('.order-product-sum').html(sum_html);
            $('#amount').val(total);
            
        }else {
            $('.order-product-qty').html('Your Cart is empty');
        }
    }
</script>

@endsection