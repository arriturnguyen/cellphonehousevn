@extends('layouts.master')

@section('content')
		<!-- BREADCRUMB -->
		<!-- <div id="breadcrumb" class="section"> -->
			<!-- container -->
			<!-- <div class="container"> -->
				<!-- row -->
				<!-- <div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="#">Home</a></li>
							<li><a href="#">All Categories</a></li>
							<li><a href="#">Accessories</a></li>
							<li class="active">Headphones (227,490 Results)</li>
						</ul>
					</div>
				</div> -->
				<!-- /row -->
			<!-- </div> -->
			<!-- /container -->
		<!-- </div> -->
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Categories</h3>
							<div class="checkbox-filter">

								<div class="input-checkbox">
									<input type="checkbox" id="category-1">
									<label for="category-1">
										<span></span>
										Laptops
										<small>(120)</small>
									</label>
								</div>

								<div class="input-checkbox">
									<input type="checkbox" id="category-2">
									<label for="category-2">
										<span></span>
										Smartphones
										<small>(740)</small>
									</label>
								</div>

								<div class="input-checkbox">
									<input type="checkbox" id="category-3">
									<label for="category-3">
										<span></span>
										Cameras
										<small>(1450)</small>
									</label>
								</div>

								<div class="input-checkbox">
									<input type="checkbox" id="category-4">
									<label for="category-4">
										<span></span>
										Accessories
										<small>(578)</small>
									</label>
								</div>

								<div class="input-checkbox">
									<input type="checkbox" id="category-5">
									<label for="category-5">
										<span></span>
										Laptops
										<small>(120)</small>
									</label>
								</div>

								<div class="input-checkbox">
									<input type="checkbox" id="category-6">
									<label for="category-6">
										<span></span>
										Smartphones
										<small>(740)</small>
									</label>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Price</h3>
							<div class="price-filter">
								<div id="price-slider"></div>
								<div class="input-number price-min">
									<input id="price-min" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
								<span>-</span>
								<div class="input-number price-max">
									<input id="price-max" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Brand</h3>
							<div class="checkbox-filter">
								<div class="input-checkbox">
									<input type="checkbox" id="brand-1">
									<label for="brand-1">
										<span></span>
										SAMSUNG
										<small>(578)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-2">
									<label for="brand-2">
										<span></span>
										LG
										<small>(125)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-3">
									<label for="brand-3">
										<span></span>
										SONY
										<small>(755)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-4">
									<label for="brand-4">
										<span></span>
										SAMSUNG
										<small>(578)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-5">
									<label for="brand-5">
										<span></span>
										LG
										<small>(125)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-6">
									<label for="brand-6">
										<span></span>
										SONY
										<small>(755)</small>
									</label>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Top selling</h3>
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product01.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="">product name goes here</a></h3>
									<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
								</div>
							</div>

							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product02.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">product name goes here</a></h3>
									<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
								</div>
							</div>

							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product03.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">product name goes here</a></h3>
									<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					@include('partials.product')
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
<script type="text/javascript">

    var quantity = 0;
    $(document).ready(function() {
        quantity = 1;

        /* Cart item qty update */
        // cart = JSON.parse(localStorage.getItem('cart'));
        // html = cart.length;
        // $('.qty').html(html);
    
    });
    if(JSON.parse(localStorage.getItem('cart'))) {
        cart= JSON.parse(localStorage.getItem('cart'));
    } else {
        var cart=[];
    };
    
    $('button').on('click', function(){
        // alert('d');
        // var product_name= $(this).attr('data-name');
        // var product_price= $(this).attr('data-name');
        var product_id =$(this).attr('id');
        if (cart.length) {
            var result= findProductInCartById(cart, product_id);
            console.log('vi tri sp tim thay', result);
            if(result!==false) {
                // alert('Do you want to add '+parseInt(quantity)+' item to your cart?');
                var qtySumCheck = cart[result].quantity + parseInt(quantity);
                if (qtySumCheck>10 || qtySumCheck<1 || isNaN(qtySumCheck)) {
                    alert('Your cart limit reached (Min 1 item, max 10 items for each product)');
                } else {
                    cart[result].quantity+= parseInt(quantity);
                    console.log('tang so luong',cart);
                    }
            } else {
                console.log('chua co sp do');
                addCart(cart, $(this));
            }
        } else {
            console.log('chua co cart');
            addCart(cart, $(this));
        }
        
        // console.log(product);
        
        
        console.log('sau khi addCart', cart);
        localStorage.cart=JSON.stringify(cart);

        /* Cart item qty update */
        // cart = JSON.parse(localStorage.getItem('cart'));
        // html = cart.length;
        // $('.qty').html(html);
    });

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

    function addCart(cart, data){
        // alert('Do you want to add '+quantity+' item to your cart?');
        var product = {'image': data.attr('data-image'), 'name': data.attr('data-name'), 'id' : data.attr('id'), 'price' : data.attr('data-price'), 'quantity' : quantity };
        cart.push(product);
    }

</script>		
@endsection