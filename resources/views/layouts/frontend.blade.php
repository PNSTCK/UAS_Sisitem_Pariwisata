<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>Forest</title> --}}
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        /* #header {
            background: url(https://images.unsplash.com/photo-1415795854641-f4a487a0fdc8?ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80) center center / cover no-repeat;
        } */

        .card {
            height: 100%;
            display: flex;
            flex-direction: column;
            max-width: 900px;
            /* Adjust this value to change the card width */
            margin: 0 auto;
            /* Center the card horizontally */
        }

        .card-body {
            flex: 1;
        }

        .dark-theme {
            background-color: #333;
            color: #fff;
        }

        .dark-theme .card {
            background-color: #444;
        }

        .dark-theme .card-title,
        .dark-theme .card-text,
        .dark-theme .card-body p {
            color: #fff;
        }

        .dark-theme .btn-outline-success {
            color: #fff;
            border-color: #fff;
        }

        .dark-theme .btn-outline-success:hover {
            background-color: #fff;
            color: #444;
        }

        .dark-theme .btn-outline-danger {
            color: #fff;
            border-color: #fff;
        }

        .dark-theme .btn-outline-danger:hover {
            background-color: #fff;
            color: #444;
        }
    </style>


    <!--=============== BOXICONS ===============-->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="{{ asset('/frontend/assets/libraries/swiper-bundle.min.css') }}" />

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('/frontend/assets/css/style.css') }}" />
    @stack('style-alt')
    <title>Travel Website - rio Febriyan</title>
</head>

<body>
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="{{ route('homepage') }}" class="nav__logo">G<i class="bx bxs-map"></i> LOMBOK</a>

            <div class="nav__menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="{{ route('homepage') }}"
                            class="nav__link {{ request()->is('/') ? ' active-link' : '' }}">
                            <i class="bx bx-home-alt"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href=""
                            class="nav__link {{ request()->is('travel-packages') || request()->is('travel-packages/*') ? ' active-link' : '' }}">
                            <i class="bx bx-building-house"></i>
                            <span>Package Travel</span>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href=""
                            class="nav__link {{ request()->is('blogs') || request()->is('blogs/*') ? ' active-link' : '' }}">
                            <i class="bx bx-award"></i>
                            <span>Blog</span>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="" class="nav__link {{ request()->is('contact') ? ' active-link' : '' }}">
                            <i class="bx bx-phone"></i>
                            <span>Contact</span>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="{{ route('login') }}"
                            class="nav__link {{ request()->is('login') ? ' active-link' : '' }}">
                            <i class="bx bx-log-in"></i>
                            {{-- <span>Login</span> --}}
                        </a>
                    </li>

                </ul>


            </div>
            <i class="bx bx-moon change-theme" id="theme-button"></i>

            <!-- theme -->

            {{-- dibawah logika untuk login --}}

            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        @if (Auth::user()->hak_akses === 'admin')
                            <a href="{{ route('dashboard') }}" class="button nav__button">Dashboard Admin</a>
                        @elseif (Auth::user()->hak_akses === 'driver')
                            <a href="{{ route('driver.dashboard') }}" class="button nav__button">Dashboard Driver</a>
                        @elseif (Auth::user()->hak_akses === 'client')
                            <a href="{{ route('client.dashboard') }}" class="button nav__button">Dashboard Client</a>
                        @else
                            <a href="{{ route('dashboard') }}" class="button nav__button">Dashboard</a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="button nav__button">Login</a>
                    @endauth
                </div>
            @endif





            {{-- <a target="_blank" href="{{ route('login') }}" class="button nav__button">Login Now</a> --}}
        </nav>
    </header>

    <!--==================== MAIN ====================-->
    <main class="main">
        @yield('content')
    </main>

    <!--==================== FOOTER ====================-->
    <footer class="footer section">
        <div class="footer__container container grid">
            <div>
                <a href="{{ route('homepage') }}" class="footer__logo">
                    <i class="bx bxs-map"></i> LOMBOK
                </a>
                <p class="footer__description">
                    Our vision is to help people find the <br />
                    best places to travel with high security
                </p>
            </div>

            <div class="footer__content">
                <div>
                    <h3 class="footer__title">About</h3>

                    <ul class="footer__links">
                        <li>
                            <a href="#" class="footer__link">About Us</a>
                        </li>
                        <li>
                            <a href="#" class="footer__link">Features </a>
                        </li>
                        <li>
                            <a href="#" class="footer__link">News & Blog</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="footer__title">Company</h3>

                    <ul class="footer__links">
                        <li>
                            <a href="#" class="footer__link">How We Work?
                            </a>
                        </li>
                        <li>
                            <a href="#" class="footer__link">Capital </a>
                        </li>
                        <li>
                            <a href="#" class="footer__link"> Security</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="footer__title">Support</h3>

                    <ul class="footer__links">
                        <li>
                            <a href="#" class="footer__link">FAQs </a>
                        </li>
                        <li>
                            <a href="#" class="footer__link">Support center
                            </a>
                        </li>
                        <li>
                            <a href="#" class="footer__link"> Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="footer__title">Follow us</h3>

                    <ul class="footer__social">
                        <a href="#" class="footer__social-link">
                            <i class="bx bxl-facebook-circle"></i>
                        </a>
                        <a href="#" class="footer__social-link">
                            <i class="bx bxl-instagram-alt"></i>
                        </a>
                        <a href="#" class="footer__social-link">
                            <i class="bx bxl-pinterest"></i>
                        </a>
                    </ul>
                </div>
            </div>
        </div>

        <div class="footer__info container">
            <span class="footer__copy">
                &#169; ypcode. Riofebriyan
            </span>
            <div class="footer__privacy">
                <a href="#">Terms & Agreements</a>
                <a href="#">Privacy Policy</a>
            </div>
        </div>
    </footer>

    <!--========== SCROLL UP ==========-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class="bx bx-chevrons-up"></i>
    </a>

    <!--=============== SCROLLREVEAL ===============-->
    <script src="{{ asset('/frontend/assets/libraries/scrollreveal.min.js') }}"></script>

    <!--=============== SWIPER JS ===============-->
    <script src="{{ asset('/frontend/assets/libraries/swiper-bundle.min.js') }}"></script>

    <!--=============== MAIN JS ===============-->
    <script src="{{ asset('/frontend/assets/js/main.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    {{-- <script>
        document.getElementById('theme-button').addEventListener('click', function() {
            document.body.classList.toggle('dark-theme');
        });
    </script> --}}

    @stack('script-alt')
</body>

</html>
