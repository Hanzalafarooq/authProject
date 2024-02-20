<x-front-component.main />
<x-front-component.header-sep />

<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="{{ url('/hom') }}">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="{{ url('/cart') }}">Cart</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Shopping Cart -->
<div class="shopping-cart section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Shopping Summery -->
                <table class="table shopping-summery">
                    @if ($cartItems->isEmpty())
                        <p>Your cart is empty.</p>
                    @else
                        <thead>
                            <tr class="main-hading">
                                <th>PRODUCT</th>
                                <th>NAME</th>
                                <th class="text-center">UNIT PRICE</th>
                                <th class="text-center">QUANTITY</th>
                                <th class="text-center">TOTAL</th>
                                <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                            </tr>
                        </thead>
                        {{-- @php --}}
                        {{-- //  echo "<pre>"; --}}
                        {{-- // print_r($cartItems);       // return $request->all();die; --}}

                        {{-- echo "</pre>";die; --}}
                        {{-- @endphp --}}
                        @foreach ($cartItems as $item)
                            <tbody>
                                <tr>
                                    <td class="image" data-title="No"><img
                                            src=" {{ 'products/img/' . $item->attributes->image }} "style="height:9pc;"
                                            alt="#">
                                    </td>
                                    <td class="product-des" data-title="Description">
                                        <p class="product-name"><a href="#">{{ $item->name }}</a></p>
                                        <p class="product-des">{{ $item->attributes->description }}</p>
                                    </td>
                                    <td class="price" data-title="Price"><span>${{ $item->price }} </span>
                                    </td>
                                    {{-- <td class="qty" data-title="Qty"></td> --}}
                                    <td class=" ">
                                        <div class="h-10 w-28">
                                            <div class="relative flex flex-row w-full h-8">


                                                <form action="{{ route('cart.update') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                    <input type="number" name="quantity" value="{{ $item->quantity }}"
                                                        class="w-6 text-center bg-gray-300" style="width: 5pc;" />
                                                    <button type="submit" class="btn">update</button>
                                                </form>


                                            </div>
                                        </div>
                                    </td>

                                    <td class="total-amount" data-title="Total">
                                        <span>{{ $item->price * $item->quantity }}</span>
                                    </td>
                                    {{-- <td class="total-amount" data-title="Total">
                                        <span>{{ $item->quantity }}</span>
                                    </td> --}}
                                    <td class="hidden text-right md:table-cell">
                                        <form action="{{ route('cart.remove') }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $item->id }}" name="id">
                                            <button class="px-4 py-2 text-white bg-dark">x</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                        <form action="{{ route('cart.clear') }}" method="post">
                            @csrf
                            <button type="submit" class="btn">Clear Cart</button>
                        </form>
                </table>
                @endif
                <!--/ End Shopping Summery -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- Total Amount -->
                <div class="total-amount">
                    <div class="row">
                        <div class="col-lg-8 col-md-5 col-12">
                            <div class="left">
                                <div class="coupon">
                                    <form action="{{ route('apply-discount') }}" method="post">
                                        @csrf
                                        <input name="discount" placeholder="Discount Price">
                                        <button class="btn">Apply</button>
                                    </form>
                                </div>
                                <div class="checkbox">
                                    <label class="checkbox-inline" for="2"><input name="news" id="2"
                                            type="checkbox"> Shipping (+10$)</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-7 col-12">
                            <div class="right">

                                <ul>
                                    {{-- <li>Cart Subtotal<span> Total: ${{ Cart::getTotal() }}</span></li> --}}
                                    <li>Cart Subtotal<span>Total:
                                            ${{ number_format(Cart::getContent()->sum(function ($item) {
                                                return $item->price * $item->quantity;
                                            })) }}</span>
                                    </li>
                                    <li>Shipping<span>Free</span></li>

                                    @if (session('discount'))
                                        {{-- <li>You Save<span> {{ session('discount') }}</span></li>
                                        <li class="last">You Pay<span>
                                                ${{ Cart::getTotal() - session('discount') }}</span></li>
                                    @else
                                        <li class="last">You Pay<span> ${{ Cart::getTotal() }}</span></li>
                                    @endif
                                </ul> --}}
                                {{-- @php
                                    $request->session()->put('key', $value);
                                @endphp --}}
                                        <li>You Save<span>{{number_format( session('discount')) }}</span></li>
                                        <li class="last">You Pay<span>
                                                ${{ number_format(Cart::getTotal() - session('discount')) }}</span>
                                        </li>
                                    @else
                                        <li class="last">You
                                            Pay<span>${{ number_format(Cart::getTotal() - session('discount')) }}</span>
                                        </li>
                                    @endif
                                    <div class="button5">
                                        <form action="{{ route('checkout.view') }}" method="POST">
                                            @csrf
                                            @foreach ($cartItems as $item)
                                                <input type="hidden" name="item_ids[]" value="{{ $item->id }}">
                                                <input type="hidden" name="quantities[]"
                                                    value="{{ $item->quantity }}">
                                                <input type="hidden" name="prices[]"
                                                    value="{{ $item->price }}">
                                            @endforeach
                                            <button type="submit" class="btn">Checkout</button>
                                        </form>
                                        <a href="{{ route('products.list') }}" class="btn">Continue shopping</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ End Total Amount -->
            </div>
        </div>
    </div>
</div>
<!--/ End Shopping Cart -->
<x-front-component.newsletter-inner />
<x-front-component.footer />
