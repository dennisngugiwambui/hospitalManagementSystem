<header>
    <!--? Header Start -->
    <div class="header-area">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="col-xl-2 col-lg-2 col-md-1">
                        <div class="logo">
                            <a href="/"><img src="{{ asset('homepages/assets/img/logo/logo.png') }}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-10">
                        <div class="menu-main d-flex align-items-center justify-content-end">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="/">Home</a></li>
                                        <li><a href="/about">About</a></li>
                                        <li><a href="/doctors">Doctors</a></li>
                                        <li><a href="/department">Department</a></li>
                                        <li><a href="/contact">Contact</a></li>
                                        <li><a href="#"><i class="fa fa-user">ACCOUNT</i></a>
                                            <ul class="submenu">
                                             @if (Route::has('login'))
                                              @auth
                                              <li><a href="{{ url('/home') }}">Home</a></li>
                                              @else
                                                <li>
                                                <a href="{{route('login')}}" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">login</a>
                                                
                                                </li>
                                                @if (Route::has('register'))
                                                <li><a href="{{route('register')}}">Register</a></li>
                                                @endif
                                                @endauth
                                                
                                            @endif
                    
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="header-right-btn f-right d-none d-lg-block ml-30">
                                <a href="#" class="btn header-btn">0758024400</a>
                            </div>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
