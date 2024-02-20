
		<x-front-component.header-inner />
		<div class="header-inner">
			<div class="container">
				<div class="cat-nav-head">
					<div class="row">

						</div>
						<div class="col-lg-9 col-12">
							<div class="menu-area">
								<!-- Main Menu -->
								<nav class="navbar navbar-expand-lg">
									<div class="navbar-collapse">
										<div class="nav-inner">
											<ul class="nav main-menu menu navbar-nav">
													<li class="active"><a href="{{url('/hom')}}">Home</a></li>
													{{-- <li class="active"><a href="{{url('/hom')}}">Home</a></li> --}}
													<li><a href="{{ route('products.list') }}">Product</a></li>
													{{-- <li><a href="{{route('products.list')}}">Product</a></li> --}}
													<li><a href="#">Service</a></li>
													<li><a href="#">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
														<ul class="dropdown">
															{{-- <li><a href="{{url('/shopgrid')}}">Shop Grid</a></li> --}}
															<li><a href="{{ route('products.list') }}">Shop Grid</a></li>
															{{-- <li><a href="{{url('/cart')}}">Cart</a></li> --}}
															<li><a href="{{url('cart')}}">Cart</a></li>
															{{-- <li><a href="{{url('/check')}}">Checkout</a></li> --}}
															<li><a href="">Checkout</a></li>
														</ul>
													</li>
													<li><a href="#">Pages</a></li>
													<li><a href="#">Blog<i class="ti-angle-down"></i></a>
														<ul class="dropdown">
															<li><a href="blog-single-sidebar.html">Blog Single Sidebar</a></li>
														</ul>
													</li>
													<li><a href="">Contact Us</a></li>
													{{-- <li><a href="{{url('/contact')}}">Contact Us</a></li> --}}
												</ul>
										</div>
									</div>
								</nav>
								<!--/ End Main Menu -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--/ End Header Inner -->
