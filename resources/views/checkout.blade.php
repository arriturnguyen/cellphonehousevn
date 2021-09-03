@extends('layouts.master')

@section('content')
        
<!-- SECTION -->
@include('partials.message')
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
                    <form id="order-submit-form" method="POST" action="{{ route('orders.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input class="input" type="text" name="user_name" value="{{ old('name')}}" placeholder="" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="name">Address <span class="text-danger">*</span></label>
                        <input class="input" type="text" name="address" value="{{ old('address')}}" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Phone <span class="text-danger">*</span></label>
                        <input class="input" type="tel" name="phone" value="{{ old('phone')}}" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="cart" id="cart" readonly hidden>
                    </div>
                    <div class="form-group">
                        <input type="number" name="amount" id="amount" readonly hidden>
                    </div>
                    <!-- <div class="form-group">
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
                    </div> -->
                    <div class="form-group" id="parent">
                        <div>
                            <label for="name">auth 4 <span class="text-danger">*</span></label>
                            <input type="checkbox" class="ex" name="auth_1" id="auth_1" value="auth 1">
                            <input type="checkbox" class="ex" name="auth_2" id="auth_2" value="auth 2">
                            <input type="checkbox" class="ex" name="auth_3" id="auth_3" value="auth 3">
                            <input type="checkbox" class="ex" name="auth_4" id="auth_4" value="4" onclick="see()">
                        </div>
                    </div>
                    <div class="form-group" id="form_test" style="display: none;">
                        <label for="name">form test <span class="text-danger">*</span></label>
                        <input class="input" type="tel" name="phone" value="{{ old('phone')}}" placeholder="" required>
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

                <button type="submit" name="submit" id="order-submit-button" class="primary-btn order-submit">Place order</button>
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
function see()
{
    // alert('ddd');
        if ($('#parent').find('#auth_4').prop("checked")) {
            $("#form_test").show();
        } else {
            $("#form_test").hide();
        }
}
// $(document).ready(function(){
//     // alert($('#parent').find('#auth_4').prop("checked"));
//     $('#checkbox').on('change', function() {
//         if (this.checked) {
//             // Do your stuff
//         }
//     });

//         if ($('#parent').find('#auth_4').prop("checked")) {
//             $("#form_test").show();
//         } else {
//             $("#form_test").hide();
//         }
         
// });

    var fadeTime = 300;
    $(document).ready(function() {
        console.log(cart);
        showCart(cart);
    });
    var cart = JSON.parse(localStorage.getItem('cart'));
    $('#cart').val(localStorage.getItem('cart'));

    function formatCurrency(number){
        var n = number.split('').reverse().join("");
        var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");    
        return  n2.split('').reverse().join('') + ' ₫';
    }

    function showCart(cart) {
        // alert('Test');
        var html = '', ship_html = '', sum_html = '', total = 0, ship_fee = 30000;
        if(cart.length){
            $('.your-cart').html('Your Cart');
            for(var i=0; i<cart.length; i++) {
                var cartItem = cart[i];
                var subtotal = 0;
                subtotal += cartItem.price * cartItem.quantity;

                var echoSubtotal = subtotal.toString();

                html += ' <div class="order-col"> '+
                        '    <div>'+cartItem.quantity+' x '+cartItem.name+
                        ' </div>'+
                        '    <div>'+formatCurrency(echoSubtotal)+'</div>'+
                        ' </div>';
                total += subtotal;            
            }
                total += ship_fee;

                var echoTotal = total.toString();
                var echoShip_fee = ship_fee.toString();

            ship_html +=    ' <div class="order-col"> '+
                            ' <div>'+'Shiping'+'</div>'+
                            '    <div>'+formatCurrency(echoShip_fee)+
                            ' </div>'+
                            ' </div>';

            sum_html  +=    ' <div class="order-col"> '+
                            ' <div>'+'<strong>'+'TOTAL'+'</strong>'+'</div>'+
                            ' <div>'+'<strong class="order-total">'+formatCurrency(echoTotal)+'</strong>'+'</div>'+
                            ' </div>';
            $('.order-product-qty').html(html);
            $('.order-product-ship').html(ship_html);
            $('.order-product-sum').html(sum_html);
            $('#amount').val(total);
            
        }else {
            $('.order-product-qty').html('Your Cart is empty');
            $('#order-submit-button').fadeOut(fadeTime);
        }
    }   

</script>

@endsection