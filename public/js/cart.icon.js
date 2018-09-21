/* Cart icon qty update */
$(document).ready(function() {
	var totalQty = 0;
	if(cart.length) {
		for(var i=0; i<cart.length; i++) {
			var cartItem = cart[i];
            totalQty += cartItem.quantity;
		}
		$('.qty').html(totalQty);
	} else {
		$('.qty').html(totalQty);
	}
});

$('button').on('click', function(){
	var totalQty = 0;
	if(cart.length) {
		for(var i=0; i<cart.length; i++) {
			var cartItem = cart[i];
            totalQty += cartItem.quantity;
		}
		$('.qty').html(totalQty);
	} else {
		$('.qty').html(totalQty);
	}
});