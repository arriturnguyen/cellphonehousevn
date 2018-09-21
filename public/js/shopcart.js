var cart = JSON.parse(localStorage.getItem('cart'));

/* Set rates + misc */
var taxRate = 0.05;
var shippingRate = 30000; 
var fadeTime = 300;

$(document).ready(function() {
  console.log(cart);
        showCart(cart);
        recalculateCart();
        /* Cart item qty update */
        // cart = JSON.parse(localStorage.getItem('cart'));
        // html = cart.length;
        // $('.qty').html(html);
    /* Assign actions */
  $('.product-quantity input').change( function() {
    quantity= parseInt($(this).val());
    var product_id =$(this).attr('data-product-id');
    var result= findProductInCartById(cart, product_id);
    if( quantity>10 || quantity<1) {
      alert('this field must between 1,10');
      $('.product-quantity input').val(cart[result].quantity);
    } else {
      updateQuantity(this);
      // quantity= parseInt($(this).val());
      // alert(product_id+'_'+quantity);
      console.log('vi tri sp tim thay', result);
      cart[result].quantity= parseInt(quantity);
      console.log('thay doi so luong',cart);  
      localStorage.cart=JSON.stringify(cart);
    }
  });

  $('.product-removal button').click( function() {
    var product_id =$(this).attr('data-product-id');
    var result= findProductInCartById(cart, product_id);
    cart.splice(result, 1);
    console.log('cart after remove', cart);
    removeItem(this);
    localStorage.cart=JSON.stringify(cart);
  });      
});

function showCart(cart) {
    // alert('Test');
    var html = '';
    if(cart.length){
        $('.your-cart').html('Your Cart');
        for(var i=0; i<cart.length; i++) {
            var cartItem = cart[i];
            var subtotal = 0;
            subtotal += cartItem.price * cartItem.quantity;
            
            /* Convert cac bien int sang string de dung duoc ham formatCurrency */
            var echoSubtotal = subtotal.toString();
            var echoPrice = cartItem.price;
            echoPrice = echoPrice.toString();

            // formatCurrency(subtotal);
            // console.log('tttt0', formatCurrency(parseInt(cartItem.price)), formatCurrency(parseInt(subtotal)));
            html += ' <div class="product">'+
                    '    <div class="product-image">'+
                    '      <img src="'+cartItem.image+'">'+
                    '    </div>'+
                    '    <div class="product-details">'+
                    '      <div class="product-title">'+cartItem.name+'</div>'+
                    '    </div>'+
                    '    <div class="product-price">'+formatCurrency(echoPrice)+'</div>'+
                    '    <div class="product-price-sub" hidden>'+cartItem.price+'</div>'+
                    '    <div class="product-quantity">'+
                    '      <input type="number" id="change-qty" data-product-id="'+cartItem.id+ '" value="'+cartItem.quantity+'" min="1" max="10">'+
                    '    </div>'+
                    '    <div class="product-removal">'+
                    '      <button class="remove-product" data-product-id="'+cartItem.id+'">'+
                    '        Remove'+
                    '      </button>'+
                    '    </div>'+
                    '    <div class="product-line-price">'+formatCurrency(echoSubtotal)+'</div>'+
                    '    <div class="product-line-price-sub" hidden>'+subtotal+'</div>'+
                    ' </div>';    
        }
        $('.item').html(html);
    }else {
        $('.your-cart').html('Your Cart is empty');
    }
}

/*Format currency*/
function formatCurrency(number){
    var n = number.split('').reverse().join("");
    var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");    
    return  n2.split('').reverse().join('') + ' VNĐ';
}

/* Recalculate cart */
function recalculateCart()
{
  var sumsubtotal = 0;
  /* Sum up row totals */
  $('.product').each(function () {
    sumsubtotal += parseFloat($(this).children('.product-line-price-sub').text());
  });
  
  /* Calculate totals */
  var total = sumsubtotal + shippingRate;
  
  /* Convert cac bien int sang string de dung duoc ham formatCurrency */
  var echoSumsubtotal = sumsubtotal.toString();
  var echoShippingRate = shippingRate.toString();
  var echoTotal = total.toString();

  /* Update totals display */
  $('.totals-value').fadeOut(fadeTime, function() {
    $('#cart-subtotal').html(formatCurrency(echoSumsubtotal));
    $('#cart-shipping').html(formatCurrency(echoShippingRate));
    $('#cart-total').html(formatCurrency(echoTotal));
    if(total == 0){
      $('.checkout').fadeOut(fadeTime);
    }else{
      $('.checkout').fadeIn(fadeTime);
    }
    $('.totals-value').fadeIn(fadeTime);
  });

  /* Cart item qty update */
        // cart = JSON.parse(localStorage.getItem('cart'));
        // html = cart.length;
        // $('.qty').html(html);
}


/* Update quantity */
function updateQuantity(quantityInput)
{
  /* Calculate line price */
  var productRow = $(quantityInput).parent().parent();
  var price = parseFloat(productRow.children('.product-price-sub').text());
  var quantity = $(quantityInput).val();
  var linePrice = price * quantity;

  /* Convert cac bien int sang string de dung duoc ham formatCurrency */
  var echoLinePrice = linePrice.toString();
  
  /* Update line price display and recalc cart totals
  ((Update tai div hien thi => de dang string moi dung ham formatcurrency duoc)) */
  productRow.children('.product-line-price').each(function () {
    $(this).fadeOut(fadeTime, function() {
      $(this).text(formatCurrency(echoLinePrice));
      // recalculateCart();
      $(this).fadeIn(fadeTime);
    });
  });
  /* Update line price display and recalc cart totals 
  (Update tai div hidden => de nguyen dang int moi recalculate cart duoc) */
  productRow.children('.product-line-price-sub').each(function () {
    $(this).fadeOut(fadeTime, function() {
      $(this).text(linePrice);
      recalculateCart();
      // $(this).fadeIn(fadeTime);
    });
  });  
}


/* Remove item from cart */
function removeItem(removeButton)
{
  /* Remove row from DOM and recalc cart total */
  var productRow = $(removeButton).parent().parent();
  productRow.slideUp(fadeTime, function() {
    productRow.remove();
    recalculateCart();
  });  
}

function findProductInCartById(cart, product_id){

        for (var i = 0; i < cart.length; i++) {
            console.log('id sp moi: ', product_id, 'id sp for:', cart[i].id);
            if (cart[i].id===product_id) {
                console.log('tim thay');
                return i;
            } else {
                
                continue;
            }

        }
        console.log('ko tim thay');
        return false;
    };


  $('.product-quantity').on('change', '#change-qty', function() {
    alert('he');
    quantity= parseInt($(this).val());
    var product_id =$(this).attr('product-id');
    alert(product_id+'_'+quantity);
            var result= findProductInCartById(cart, product_id);
            console.log('vi tri sp tim thay', result);
                cart[result].quantity+= parseInt(quantity);
                console.log('thay doi so luong',cart);
  });

