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
                            <li><a href="#">Headphones</a></li>
                            <li class="active">Product name goes here</li>
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
                    <!-- Product main img -->
                    @if ($product->images != NULL)
                      <div class="col-md-5 col-md-push-2">
                            <div id="product-main-img">
                            @foreach ($product->images as $image)
                                <div class="product-preview">
                                <img src="{{ $image }}" alt="">
                                </div> 
                            @endforeach
                             
                    @else
                        <img src="images/products/no-image.jpg" alt="Image not found">
                    @endif
                            </div>
                      </div>
                    <!-- /Product main img -->

                    <!-- Product thumb imgs -->
                    @if ($product->images != NULL)
                      <div class="col-md-2  col-md-pull-5">
                            <div id="product-imgs">
                            @foreach ($product->images as $image)
                                <div class="product-preview">
                                <img src="{{ $image }}" alt="">
                                </div> 
                            @endforeach
                             
                    @else
                        <img src="images/products/no-image.jpg">
                    @endif
                            </div>
                      </div>
                    <!-- /Product thumb imgs -->
                    <br>
                    <!-- Product details -->
                    <div class="col-md-5">
                        <div class="product-details">
                            <h2 class="product-name">{{$product->name}}</h2>
                            <!-- <div>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <a class="review-link" href="#">10 Review(s) | Add your review</a>
                            </div> -->
                            <div>
                                <h3 class="product-price">{{ number_format($product->price) }} ₫
                                <br>    
                                <del class="product-old-price">{{ number_format($product->old_price) }} ₫</del></h3>
                                <br>
                                <span class="product-available">
                                    @if ($product->in_stock > 0)
                                    <?php switch ($product->status) {
                                      case "1":
                                          echo "In stock";
                                          break;
                                      case "2":
                                          echo "Out of stock";
                                          break;
                                      // case "3":
                                      //     echo "Coming soon";
                                      //     break;
                                      default:
                                          echo "Unknown";
                                    }?>
                                    @else
                                        @if ($product->status == 3)
                                        Comming soon
                                        @else
                                        Out of stock
                                        @endif
                                    @endif
                                </span>
                            </div>
                            <!-- <p>{{ $product->description }}</p> -->

                            <div class="product-options">
                                <!-- <label>
                                    Size
                                    <select class="input-select">
                                        <option value="0">X</option>
                                    </select>
                                </label>
                                <label>
                                    Color
                                    <select class="input-select">
                                        <option value="0">Red</option>
                                    </select>
                                </label> -->
                            </div>
                            <!-- Fix bug null image[0] error -->
                                        <?php
                                            if ($product->images != NULL) {
                                              $showImg = $product->images[0];
                                            }
                                            else {
                                              $showImg = 'images/products/no-image.jpg';
                                            }
                                        ?>
                            @if ($product->in_stock > 0)
                            <div class="add-to-cart">
                                <div class="qty-label">
                                    Quantity
                                    <div class="input-number">
                                        <!-- <input type="number"> -->
                                        <input id="Soluong" type="number" class="form-control" placeholder="" name="quantity" value="1" />
                                        <!-- <span class="qty-up">+</span>
                                        <span class="qty-down">-</span> -->
                                    </div>
                                </div>
                                <br><br>
                                <button class="add-to-cart-btn" id="{{$product->id}}" data-id="{{$product->id}}"
                                data-name="{{$product->name}}"
                                data-price="{{$product->price}}"
                                data-image="{{$showImg}}" ><i class="fa fa-shopping-cart"></i> add to cart</button>
                            </div>
                            @endif
                            <!-- <ul class="product-btns">
                                <li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
                                <li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
                            </ul> -->

                            <ul class="product-links">
                                <li>Category:</li>
                                <li><a href="{{route('product.showProductByCategory', $product->category_id)}}">{{ $product->category->name }}</a></li>
                            </ul>

                            <!-- <ul class="product-links">
                                <li>Share:</li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                            </ul> -->

                        </div>
                    </div>
                    <!-- /Product details -->

                    <!-- Product tab -->
                    <div class="col-md-12">
                        <div id="product-tab">
                            <!-- product tab nav -->
                            <ul class="tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                                <!-- <li><a data-toggle="tab" href="#tab2">Details</a></li>
                                <li><a data-toggle="tab" href="#tab3">Reviews (3)</a></li> -->
                            </ul>
                            <!-- /product tab nav -->

                            <!-- product tab content -->
                            <div class="tab-content">
                                <!-- tab1  -->
                                <div id="tab1" class="tab-pane fade in active">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>{{$product->description}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /tab1  -->

                                <!-- tab2  -->
                                <!-- <div id="tab2" class="tab-pane fade in">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- /tab2  -->

                                <!-- tab3  -->
                                <!-- <div id="tab3" class="tab-pane fade in">
                                    <div class="row"> -->
                                        <!-- Rating -->
                                        <!-- <div class="col-md-3">
                                            <div id="rating">
                                                <div class="rating-avg">
                                                    <span>4.5</span>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                </div>
                                                <ul class="rating">
                                                    <li>
                                                        <div class="rating-stars">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                        <div class="rating-progress">
                                                            <div style="width: 80%;"></div>
                                                        </div>
                                                        <span class="sum">3</span>
                                                    </li>
                                                    <li>
                                                        <div class="rating-stars">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <div class="rating-progress">
                                                            <div style="width: 60%;"></div>
                                                        </div>
                                                        <span class="sum">2</span>
                                                    </li>
                                                    <li>
                                                        <div class="rating-stars">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <div class="rating-progress">
                                                            <div></div>
                                                        </div>
                                                        <span class="sum">0</span>
                                                    </li>
                                                    <li>
                                                        <div class="rating-stars">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <div class="rating-progress">
                                                            <div></div>
                                                        </div>
                                                        <span class="sum">0</span>
                                                    </li>
                                                    <li>
                                                        <div class="rating-stars">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <div class="rating-progress">
                                                            <div></div>
                                                        </div>
                                                        <span class="sum">0</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div> -->
                                        <!-- /Rating -->

                                        <!-- Reviews -->
                                        <!-- <div class="col-md-6">
                                            <div id="reviews">
                                                <ul class="reviews">
                                                    <li>
                                                        <div class="review-heading">
                                                            <h5 class="name">John</h5>
                                                            <p class="date">27 DEC 2018, 8:0 PM</p>
                                                            <div class="review-rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o empty"></i>
                                                            </div>
                                                        </div>
                                                        <div class="review-body">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="review-heading">
                                                            <h5 class="name">John</h5>
                                                            <p class="date">27 DEC 2018, 8:0 PM</p>
                                                            <div class="review-rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o empty"></i>
                                                            </div>
                                                        </div>
                                                        <div class="review-body">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="review-heading">
                                                            <h5 class="name">John</h5>
                                                            <p class="date">27 DEC 2018, 8:0 PM</p>
                                                            <div class="review-rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o empty"></i>
                                                            </div>
                                                        </div>
                                                        <div class="review-body">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <ul class="reviews-pagination">
                                                    <li class="active">1</li>
                                                    <li><a href="#">2</a></li>
                                                    <li><a href="#">3</a></li>
                                                    <li><a href="#">4</a></li>
                                                    <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                                </ul>
                                            </div>
                                        </div> -->
                                        <!-- /Reviews -->

                                        <!-- Review Form -->
                                        <!-- <div class="col-md-3">
                                            <div id="review-form">
                                                <form class="review-form">
                                                    <input class="input" type="text" placeholder="Your Name">
                                                    <input class="input" type="email" placeholder="Your Email">
                                                    <textarea class="input" placeholder="Your Review"></textarea>
                                                    <div class="input-rating">
                                                        <span>Your Rating: </span>
                                                        <div class="stars">
                                                            <input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
                                                            <input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
                                                            <input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
                                                            <input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
                                                            <input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
                                                        </div>
                                                    </div>
                                                    <button class="primary-btn">Submit</button>
                                                </form>
                                            </div>
                                        </div> -->
                                        <!-- /Review Form -->
                                    </div>
                                </div>
                                <!-- /tab3  -->
                            </div>
                            <!-- /product tab content  -->
                        </div>
                    </div>
                    <!-- /product tab -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /SECTION -->

<script type="text/javascript">

    var quantity=0;
    $(document).ready(function() {
        quantity= parseInt($('#Soluong').val());

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
    $('#Soluong').on('change', function(){
        quantity= parseInt($(this).val());
        if(quantity>10 || quantity<1 || isNaN(quantity)) {
          alert('This field must between 1 and 10');
          $('#Soluong').val(1);
        }
    });
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
        var product= {'image': data.attr('data-image'), 'name': data.attr('data-name'), 'id' : data.attr('id'), 'price' : data.attr('data-price'), 'quantity' : quantity };
        cart.push(product);
    }

</script>

@endsection