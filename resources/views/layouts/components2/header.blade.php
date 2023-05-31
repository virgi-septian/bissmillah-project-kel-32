<header class="header navbar-area">
    <!-- Start Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-middle">
                        <ul class="useful-links">
                            <li><a href="index.html"></a></li>
                            <li><a href="about-us.html"></a></li>
                            <li><a href="contact.html"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-middle">
                        <ul class="useful-links">
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-end">
                        
                        <ul class="user-login">

                            @guest
                            <li>
                                <div class="user">
                                    <i class="lni lni-user"></i>
                                    Hello
                                </div>
                            </li>
                            @else
                            <li>
                                <div class="user">
                                    <i class="lni lni-user avatar"></i>
                                    <i style="color: rgb(0, 214, 0)" class="bi bi-circle-fill"></i>
                                    {{ Auth::user()->name }}
                                </div>
                            </li>
                           
                            <li>
                                <a class="" role="button" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-arrow-right-square"></i>&nbsp;
                                    {{ __('Logout') }}
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                    </form>
                                </a>
                            </li>    
                            
                            @endguest
                            @guest
                                @if(Route::has('login'))
                                    <li>
                                    <a class="" href="{{route('login')}}">
                                        <i class="bi bi-box-arrow-in-right me-2"></i> {{ __('Login')}}
                                    </a>
                                    </li>
                                    
                                    @endif
                                    @if(Route::has('register'))
                                    <li>
                                    <a class="" href="{{route('register')}}">
                                        <i class="bi bi-person-lines-fill me-2"></i>
                                        {{ __('Register')}}
                                    </a>
                                    </li>
                                    @endif
                                @else
                            @endguest



                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <!-- Start Header Middle -->
    <div class="header-middle">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-3 col-7">
                    <!-- Start Header Logo -->
                    <a class="navbar-brand" href="index.html">
                        <img src="{{ asset('assets3/images/logo/logo.svg') }}" alt="Logo">
                    </a>
                    <!-- End Header Logo -->
                </div>
                <div class="col-lg-5 col-md-7 d-xs-none">
                    <!-- Start Main Menu Search -->
                    <div class="main-menu-search">
                        <!-- navbar search start -->
                        <div class="navbar-search search-style-5">
                            <div class="search-select">
                                <div class="select-position">
                                    <select id="select1">
                                        <option selected>Search</option>
                                    </select>
                                </div>
                            </div>
                            <div class="search-input">
                                <input type="text">
                            </div>
                            <div class="search-btn">
                                <button><i class="lni lni-search-alt"></i></button>
                            </div>
                        </div>
                        <!-- navbar search Ends -->
                    </div>
                    <!-- End Main Menu Search -->
                </div>
                <div class="col-lg-4 col-md-2 col-5">
                    <div class="middle-right-area">
                        <div class="nav-hotline">
                        </div>
                        <div class="navbar-cart">
                            <div class="nav-hotline">
                                <i class="lni lni-phone"></i>
                                <h3>Hotline:
                                    <span>(+100) 123 456 7890</span>
                                </h3>
                            </div>
                            <div class="cart-items">
                                
                                <!-- Shopping Item -->
                                <div class="shopping-item">
                                    <div class="dropdown-cart-header">
                                        <span>2 Items</span>
                                        <a href="cart.html">View Cart</a>
                                    </div>
                                    <ul class="shopping-list">
                                        <li>
                                            <a href="javascript:void(0)" class="remove" title="Remove this item"><i
                                                    class="lni lni-close"></i></a>
                                            <div class="cart-img-head">
                                                <a class="cart-img" href="product-details.html"><img
                                                        src="assets3/images/header/cart-items/item1.jpg" alt="#"></a>
                                            </div>

                                            <div class="content">
                                                <h4><a href="product-details.html">
                                                        Apple Watch Series 6</a></h4>
                                                <p class="quantity">1x - <span class="amount">$99.00</span></p>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" class="remove" title="Remove this item"><i
                                                    class="lni lni-close"></i></a>
                                            <div class="cart-img-head">
                                                <a class="cart-img" href="product-details.html"><img
                                                        src="assets3/images/header/cart-items/item2.jpg" alt="#"></a>
                                            </div>
                                            <div class="content">
                                                <h4><a href="product-details.html">Wi-Fi Smart Camera</a></h4>
                                                <p class="quantity">1x - <span class="amount">$35.00</span></p>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="bottom">
                                        <div class="total">
                                            <span>Total</span>
                                            <span class="total-amount">$134.00</span>
                                        </div>
                                        <div class="button">
                                            <a href="checkout.html" class="btn animate">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                                <!--/ End Shopping Item -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Middle -->
    <!-- Start Header Bottom -->
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-6 col-12">
                <div class="nav-inner">
                    <!-- Start Mega Category Menu -->
                    <div class="mega-category-menu">
                        <span class="cat-button"><i class="lni lni-menu"></i>All Categories</span>
                        <ul class="sub-category">
                            <li><a href="{{ route('allcategory.index') }}">All Category</a></li>
                            <li><a href="product-grids.html">cc</a></li>
                        </ul>
                    </div>
                    <!-- End Mega Category Menu -->
                    <!-- Start Navbar -->
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a href="{{ route('dashboard') }}" class="active" aria-label="Toggle navigation">Home</a>
                                </li>
                               
                                <li class="nav-item">
                                    <a href="contact.html" aria-label="Toggle navigation">Contact Us</a>
                                </li>
                            </ul>
                        </div> <!-- navbar collapse -->
                    </nav>
                    <!-- End Navbar -->
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Nav Social -->
                <div class="nav-social">
                    <h5 class="title">Follow Us:</h5>
                    <ul>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-instagram"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-skype"></i></a>
                        </li>
                    </ul>
                </div>
                <!-- End Nav Social -->
            </div>
        </div>
    </div>
    <!-- End Header Bottom -->
</header>