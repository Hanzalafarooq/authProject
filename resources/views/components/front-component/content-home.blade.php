 <!-- Start Small Banner  -->
 <section class="small-banner section">
     <div class="container-fluid">
         <div class="row">
             <!-- Single Banner  -->
             <div class="col-lg-4 col-md-6 col-12">
                 <div class="single-banner">
                     <img src="{{ 'asset/images/mini-banner1.jpg' }}" alt="#">
                     <div class="content">
                         <p>Man's Collectons</p>
                         <h3>Summer travel <br> collection</h3>
                         <a href="#">Discover Now</a>
                     </div>
                 </div>
             </div>
             <!-- /End Single Banner  -->
             <!-- Single Banner  -->
             <div class="col-lg-4 col-md-6 col-12">
                 <div class="single-banner">
                     <img src="{{ 'asset/images/mini-banner2.jpg' }}" alt="#">
                     <div class="content">
                         <p>Bag Collectons</p>
                         <h3>Awesome Bag <br> 2020</h3>
                         <a href="#">Shop Now</a>
                     </div>
                 </div>
             </div>
             <!-- /End Single Banner  -->
             <!-- Single Banner  -->
             <div class="col-lg-4 col-12">
                 <div class="single-banner tab-height">
                     <img src="{{ 'asset/images/mini-banner3.jpg' }}" alt="#">
                     <div class="content">
                         <p>Flash Sale</p>
                         <h3>Mid Season <br> Up to <span>40%</span> Off</h3>
                         <a href="#">Discover Now</a>
                     </div>
                 </div>
             </div>
             <!-- /End Single Banner  -->
         </div>
     </div>
 </section>
 <!-- End Small Banner -->

 <!-- Start Product Area -->
 <div class="product-area section">
     <div class="container">
         <div class="row">
             <div class="col-12">
                 <div class="section-title">
                     <h2>Trending Item</h2>
                 </div>
             </div>
         </div>
         <div class="row">
             <div class="col-12">
                 <div class="product-info">
                     <div class="nav-main">
                         <!-- Tab Nav -->
                         <ul class="nav nav-tabs" id="myTab" role="tablist">
                             <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#man"
                                     role="tab">Man</a></li>
                             <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#women"
                                     role="tab">Woman</a></li>
                             <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#kids"
                                     role="tab">Kids</a></li>
                             <li class="nav-item"><a class="nav-link" data-togglle="tab" href="#accessories"
                                     role="tab">Accessories</a></li>
                             <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#essential"
                                     role="tab">Essential</a></li>
                             <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#prices"
                                     role="tab">Prices</a></li>
                         </ul>
                         <!--/ End Tab Nav -->
                     </div>
                     <div class="tab-content" id="myTabContent">
                         <!-- Start Single Tab -->
                         <div class="tab-pane fade show active" id="man" role="tabpanel">
                             <div class="tab-single">
                                 <div class="row">
                                     @foreach ($products as $product)
                                         <div class="col-xl-3 col-lg-4 col-md-4  ">
                                             <div class="single-product">
                                                 <div class="product-img">
                                                     <a href="{{ route('product.details', ['id' => $product->id]) }}">
                                                         <img class="default-img"
                                                             src="{{ asset('products/img/' . $product->image) }}"
                                                             src="" alt="#">
                                                         <img class="hover-img" src="" <img class="hover-img"
                                                             src="{{ asset('products/img/' . $product->image) }}"
                                                             alt="#">

                                                     </a>
                                                     <div class="button-head">
                                                         <div class="product-action">
                                                             <a data-toggle="modal" data-target="#exampleModal"
                                                                 title="Quick View" href="#"><i
                                                                     class=" ti-eye"></i><span>Quick Shop</span></a>
                                                             <a title="Wishlist" href="#"><i
                                                                     class=" ti-heart "></i><span>Add to
                                                                     Wishlist</span></a>
                                                             <a title="Compare" href="#"><i
                                                                     class="ti-bar-chart-alt"></i><span>Add to
                                                                     Compare</span></a>
                                                         </div>
                                                         <div class="product-action-2">

                                                                 <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                                                 @csrf
                                                                 <input type="hidden" value="{{ $product->id }}" name="id">
                                                                 <input type="hidden" value="{{ $product->title }}" name="name">
                                                                 <input type="hidden" value="{{ $product->price }}" name="price">
                                                                <input type="hidden" value="{{ $product->discounted_price }}" name="price">
                                                                {{-- <input type="hidden" value="{{ $product->Description}}" name="desc"> --}}
                                                                 <input type="hidden" value="{{ $product->image }}" name="image">
                                                                 <input type="hidden" value="1" name="quantity">
                                                                 <button
                                                                     class="px-4 py-2 text-white bg-dark rounded">Add
                                                                     To Cart</button>
                                                                 {{-- <a title="Add to cart" href="">Add to cart</a> --}}
                                                             </form>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="product-content">
                                                     <h3><a href="product-details.html">{{ $product->title }}</a></h3>
                                                     <span class="line-through">${{ $product->price }}</span><br>
                                                     <span>${{ $product->discounted_price }}</span>
                                                 </div>
                                             </div>
                                         </div>
                                         @endforeach
                                 </div>
                             </div>

                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>



     <!-- Start Shop Home List  -->
     <section class="shop-home-list section">
         <div class="container">
             <div class="row">
                 <div class="col-lg-4 col-md-6 col-12">
                     <div class="row">
                         <div class="col-12">
                             <div class="shop-section-title">
                                 <h1>On sale</h1>
                             </div>
                         </div>
                     </div>
                     <!-- Start Single List  -->
                     <div class="single-list">
                         <div class="row">
                             <div class="col-lg-6 col-md-6 col-12">
                                 <div class="list-image overlay">
                                     <img src="{{ 'asset/images/shop-list1.jpg' }}" alt="#">
                                     <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                 </div>
                             </div>
                             <div class="col-lg-6 col-md-6 col-12 no-padding">
                                 <div class="content">
                                     <h4 class="title"><a href="#">Licity jelly leg flat Sandals</a>
                                     </h4>
                                     <p class="price with-discount">$59</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- End Single List  -->
                     <!-- Start Single List  -->
                     <div class="single-list">
                         <div class="row">
                             <div class="col-lg-6 col-md-6 col-12">
                                 <div class="list-image overlay">
                                     <img src="{{ 'asset/images/shop-list2.jpg' }}" alt="#">
                                     <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                 </div>
                             </div>
                             <div class="col-lg-6 col-md-6 col-12 no-padding">
                                 <div class="content">
                                     <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a>
                                     </h5>
                                     <p class="price with-discount">$44</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- End Single List  -->
                     <!-- Start Single List  -->
                     <div class="single-list">
                         <div class="row">
                             <div class="col-lg-6 col-md-6 col-12">
                                 <div class="list-image overlay">
                                     <img src="{{ 'asset/images/shop-list3.jpg' }}" alt="#">
                                     <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                 </div>
                             </div>
                             <div class="col-lg-6 col-md-6 col-12 no-padding">
                                 <div class="content">
                                     <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a>
                                     </h5>
                                     <p class="price with-discount">$89</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- End Single List  -->
                 </div>
                 <div class="col-lg-4 col-md-6 col-12">
                     <div class="row">
                         <div class="col-12">
                             <div class="shop-section-title">
                                 <h1>Best Seller</h1>
                             </div>
                         </div>
                     </div>
                     <!-- Start Single List  -->
                     <div class="single-list">
                         <div class="row">
                             <div class="col-lg-6 col-md-6 col-12">
                                 <div class="list-image overlay">
                                     <img src="{{ 'asset/images/shop-list4.jpg' }}" alt="#">
                                     <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                 </div>
                             </div>
                             <div class="col-lg-6 col-md-6 col-12 no-padding">
                                 <div class="content">
                                     <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a>
                                     </h5>
                                     <p class="price with-discount">$65</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- End Single List  -->
                     <!-- Start Single List  -->
                     <div class="single-list">
                         <div class="row">
                             <div class="col-lg-6 col-md-6 col-12">
                                 <div class="list-image overlay">
                                     <img src="{{ 'asset/images/shop-list5.jpg' }}" alt="#">
                                     <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                 </div>
                             </div>
                             <div class="col-lg-6 col-md-6 col-12 no-padding">
                                 <div class="content">
                                     <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a>
                                     </h5>
                                     <p class="price with-discount">$33</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- End Single List  -->
                     <!-- Start Single List  -->
                     <div class="single-list">
                         <div class="row">
                             <div class="col-lg-6 col-md-6 col-12">
                                 <div class="list-image overlay">
                                     <img src="{{ 'asset/images/shop-list6.jpg' }}" alt="#">
                                     <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                 </div>
                             </div>
                             <div class="col-lg-6 col-md-6 col-12 no-padding">
                                 <div class="content">
                                     <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a>
                                     </h5>
                                     <p class="price with-discount">$77</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- End Single List  -->
                 </div>
                 <div class="col-lg-4 col-md-6 col-12">
                     <div class="row">
                         <div class="col-12">
                             <div class="shop-section-title">
                                 <h1>Top viewed</h1>
                             </div>
                         </div>
                     </div>
                     <!-- Start Single List  -->
                     <div class="single-list">
                         <div class="row">
                             <div class="col-lg-6 col-md-6 col-12">
                                 <div class="list-image overlay">
                                     <img src="{{ 'asset/images/shop-list7.jpg' }}" alt="#">
                                     <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                 </div>
                             </div>
                             <div class="col-lg-6 col-md-6 col-12 no-padding">
                                 <div class="content">
                                     <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a>
                                     </h5>
                                     <p class="price with-discount">$22</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- End Single List  -->
                     <!-- Start Single List  -->
                     <div class="single-list">
                         <div class="row">
                             <div class="col-lg-6 col-md-6 col-12">
                                 <div class="list-image overlay">
                                     <img src="{{ 'asset/images/shop-list8.jpg' }}" alt="#">
                                     <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                 </div>
                             </div>
                             <div class="col-lg-6 col-md-6 col-12 no-padding">
                                 <div class="content">
                                     <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a>
                                     </h5>
                                     <p class="price with-discount">$35</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- End Single List  -->
                     <!-- Start Single List  -->
                     <div class="single-list">
                         <div class="row">
                             <div class="col-lg-6 col-md-6 col-12">
                                 <div class="list-image overlay">
                                     <img src="{{ 'asset/images/shop-list9.jpg' }}" alt="#">
                                     <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                 </div>
                             </div>
                             <div class="col-lg-6 col-md-6 col-12 no-padding">
                                 <div class="content">
                                     <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a>
                                     </h5>
                                     <p class="price with-discount">$99</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- End Single List  -->
                 </div>
             </div>
         </div>
     </section>
     <!-- End Shop Home List  -->

     <!-- Start Cowndown Area -->
     <section class="cown-down">
         <div class="section-inner ">
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-lg-6 col-12 padding-right">
                         <div class="image">
                             <img src="{{ 'asset/images/p00.avif' }}" alt="#">
                         </div>
                     </div>
                     <div class="col-lg-6 col-12 padding-left">
                         <div class="content">
                             <div class="heading-block">
                                 <p class="small-title">Deal of day</p>
                                 <h3 class="title">Beatutyful dress for women</h3>
                                 <p class="text">Suspendisse massa leo, vestibulum cursus nulla sit amet,
                                     frungilla placerat lorem. Cars fermentum, sapien. </p>
                                 <h1 class="price">$1200 <s>$1890</s></h1>
                                 <div class="coming-time">
                                     <div class="clearfix" data-countdown="2021/02/30"></div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <!-- /End Cowndown Area -->

     <!-- Start Shop Blog  -->
     <section class="shop-blog section">
         <div class="container">
             <div class="row">
                 <div class="col-12">
                     <div class="section-title">
                         <h2>From Our Blog</h2>
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-lg-4 col-md-6 col-12">
                     <!-- Start Single Blog  -->
                     <div class="shop-single-blog">
                         <img src="{{ 'asset/images/blog1.jpg' }}" alt="#">
                         <div class="content">
                             <p class="date">22 July , 2020. Monday</p>
                             <a href="#" class="title">Sed adipiscing ornare.</a>
                             <a href="#" class="more-btn">Continue Reading</a>
                         </div>
                     </div>
                     <!-- End Single Blog  -->
                 </div>
                 <div class="col-lg-4 col-md-6 col-12">
                     <!-- Start Single Blog  -->
                     <div class="shop-single-blog">
                         <img src="{{ 'asset/images/blog2.jpg' }}" alt="#">
                         <div class="content">
                             <p class="date">22 July, 2020. Monday</p>
                             <a href="#" class="title">Man’s Fashion Winter Sale</a>
                             <a href="#" class="more-btn">Continue Reading</a>
                         </div>
                     </div>
                     <!-- End Single Blog  -->
                 </div>
                 <div class="col-lg-4 col-md-6 col-12">
                     <!-- Start Single Blog  -->
                     <div class="shop-single-blog">
                         <img src="{{ 'asset/images/blog3.jpg' }}" alt="#">
                         <div class="content">
                             <p class="date">22 July, 2020. Monday</p>
                             <a href="#" class="title">Women Fashion Festive</a>
                             <a href="#" class="more-btn">Continue Reading</a>
                         </div>
                     </div>
                     <!-- End Single Blog  -->
                 </div>
             </div>
         </div>
     </section>
     <!-- End Shop Blog  -->
