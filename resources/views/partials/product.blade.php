					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<!-- <div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									Sort By:
									<select class="input-select">
										<option value="0">Popular</option>
										<option value="1">Position</option>
									</select>
								</label>

								<label>
									Show:
									<select class="input-select">
										<option value="0">20</option>
										<option value="1">50</option>
									</select>
								</label>
							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>
						</div> -->
						<!-- /store top filter -->


						<?php
						//Columns must be a factor of 12 (1,2,3,4,6,12)
						$numOfCols = 3;
						$rowCount = 0;
						$bootstrapColWidth = 12 / $numOfCols;
						?>
						<div class="row">
							@foreach($products as $product) 
								<div class="col-md-<?php echo $bootstrapColWidth; ?>">
							        <div class="product">
							        	<a href="{{route('product.show', $product->id)}}">
										<div class="product-img">
											
											@if ($product->images != NULL)
							                  <img src="{{ $product->images[0] }}">
							                @else
							                  <img src="images/products/no-image.jpg"></th>
							                @endif

											<div class="product-label">
												@if (($product->price)<($product->old_price))
												<span class="sale">-{{floor(100-(($product->price)/($product->old_price))*100)}}%</span>
												@endif
												<!-- <span class="new">NEW</span> -->
											</div>
										</div>
										</a>
										<div class="product-body">
											<p class="product-category">{{ $product->category->name }}</p>
											<h3 class="product-name"><a href="{{route('product.show', $product->id)}}">{{$product->name}}</a></h3>
											<h4 class="product-price">{{number_format($product->price)}} ₫ 
											<br>	
											<del class="product-old-price">{{number_format($product->old_price)}} ₫</del></h4>
											<div class="product-rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</div>
											<!-- <div class="product-btns">
												<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
												<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
												<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
											</div> -->
										</div>
										<div class="add-to-cart">
											<button class="add-to-cart-btn" id="{{$product->id}}" data-id="{{$product->id}}"
			                                data-name="{{$product->name}}"
			                                data-price="{{$product->price}}"
			                                data-image="{{$product->images[0]}}" ><i class="fa fa-shopping-cart"></i> add to cart</button>
										</div>
							        </div>
							    </div>    
							<?php
							    $rowCount++;
							    if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
							 ?>
							@endforeach
							
						<!-- </div> Thua 1 the div?-->
					</div>	
					<!-- /STORE -->
					
						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<span class="store-qty">Showing {{count($products)}} products</span>
							<!-- <ul class="store-pagination">
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul> -->
						</div>
						<!-- /store bottom filter -->
						{{ $products->links() }}
					</div>
					<!-- /STORE -->