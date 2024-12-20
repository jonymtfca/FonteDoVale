<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Restaurante Fonte do Vale</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/favicon.ico" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Restaurantly
    * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
    * Updated: Aug 07 2024 with Bootstrap v5.3.3
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body class="index-page">

<header id="header" class="header fixed-top">

    <div class="topbar d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">rfontedovale@gmail.com</a></i>
                <i class="bi bi-phone d-flex align-items-center ms-4"><span>+351 282 997 334</span></i>
            </div>
            <div class="languages d-none d-md-flex align-items-center">
                <ul>
                    <li><a href="{{ route('switchLanguage', 'pt') }}">Pt</a></li>
                    <li><a href="{{ route('switchLanguage', 'en') }}">En</a></li>
                    <li><a href="/login">Login</a></li>
                </ul>
            </div>
        </div>
    </div><!-- End Top Bar -->

    <div class="branding d-flex align-items-cente">

        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="/" class="logo d-flex align-items-center me-auto me-xl-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="assets/img/logo.jpg" alt="">
                {{--<h1 class="sitename">Fonte do Vale</h1>--}}
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">{{ __('welcome.home') }}<br></a></li>
                    <li><a href="#about">{{ __('welcome.about') }}</a></li>
                    <li><a href="#menu">{{ __('welcome.menu') }}</a></li>
                    <li><a href="#gallery">{{ __('welcome.gallery') }}</a></li>
                    <li><a href="#contact">{{ __('welcome.contact') }}</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-book-a-table d-none d-xl-block" href="#book-a-table">{{ __('welcome.booktable') }}</a>


        </div>

    </div>

</header>

<main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">


            <img src="assets/img/sofia.jpeg" id="home_img" alt="" data-aos="fade-in" class="homebg">


        <div class="container">
            <div class="row">
                <div class="col-lg-8 d-flex flex-column align-items-center align-items-lg-start">
                    @if(App::getLocale() == 'pt')
                        <h2 data-aos="fade-up" data-aos-delay="100"> {{ __('welcome.restaurant') }} <span>{{ __('welcome.welcome') }}</span></h2>
                    @else
                        <h2 data-aos="fade-up" data-aos-delay="100"><span>{{ __('welcome.welcome') }}</span> {{ __('welcome.restaurant') }}</h2>
                    @endif

                    <p data-aos="fade-up" data-aos-delay="200">{{ __('welcome.greeting') }}</p>

                    <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
                        <a href="#menu" class="cta-btn">{{ __('welcome.ourmenu') }}</a>
                        <a href="#book-a-table" class="cta-btn">{{ __('welcome.booktable') }}</a>
                    </div>
                </div>
                <div class="col-lg-4 d-flex align-items-center justify-content-center mt-5 mt-lg-0">
{{--                    <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a>--}}
                </div>
            </div>
        </div>

    </section><!-- /Hero Section -->

    <!-- Why Us Section -->
    <section id="why-us" class="why-us section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>This week</h2>
            <p>Check our courses for the current week</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row g-4">


                    @foreach($foodsGroupedByDate as $date => $foods)
                        <div class="col-2 text-center" data-aos="fade-up" data-aos-delay="100">
                            <div class="content">
                                @if(App::getLocale() == 'pt')
                                    <h6>{{ \Carbon\Carbon::parse($date)->locale('pt_PT')->isoFormat('dddd, D [de] MMMM [de] YYYY') }}</h6> <!-- Date in PT-PT -->
                                @else
                                    <h6>{{ \Carbon\Carbon::parse($date)->format('l, d F Y') }}</h6> <!-- Display formatted date -->
                                @endif

                                <ul class="list-group pt-4">
                                    @foreach($foods as $food)
                                        <li class="list-group-item li_cst">
                                            <img src="{{ asset('storage/food/'.$food->path)  }}" alt="{{ $food->name }}" class=" rounded-circle" style="height: 30px; width: 30px;"> <!-- Food image -->
                                            <span class="small">@if(App::getLocale() == 'pt'){{ $food->name_pt }} @else {{ $food->name_pt }}@endif</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div><!-- Card Item -->
                    @endforeach

            </div>

        </div>

    </section><!-- /Why Us Section -->

    <!-- Book A Table Section -->
    <section id="book-a-table" class="book-a-table section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>RESERVATION</h2>
            <p>Book a Table</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

{{--            <form action="forms/book-a-table.php" method="post" role="form" class="php-email-form">--}}
            <form  method="POST" action="/reservation" class="php-email-form">
                    <x-honeypot />
                    @csrf
                <div class="row gy-4">
                    <div class="col-lg-4 col-md-6">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required="">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required="">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone" required="">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <input type="date" name="date" class="form-control" id="date" placeholder="Date" required="">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <input type="time" class="form-control" name="time" id="time" placeholder="Time" required="">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <input type="number" class="form-control" name="people" id="people" placeholder="# of people" required="">
                    </div>
                </div>

                <div class="form-group mt-3">
                    <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
                </div>

                @if(session('emailsent'))
                    <div class="alert alert-success mt-3 text-center">
                        {{ session('emailsent') }}
                    </div>
                @endif

                <div class="text-center mt-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</div>
                    <button type="submit">Book a Table</button>
                </div>
            </form><!-- End Reservation Form -->

        </div>

    </section><!-- /Book A Table Section -->

    <!-- About Section -->
    <section id="about" class="about section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
                <div class="col-lg-6 order-1 order-lg-2 text-center">
                    <img src="assets/img/IMG_1957.jpg" class="img-fluid about-img" alt="">
                </div>
                <div class="col-lg-6 order-2 order-lg-1 content">

                    <h3 class="pb-4">Authentic Flavors of Aljezur</h3>

                    <p class="fst-italic pb-4">
                        Nestled in the heart of Aljezur, Algarve, our restaurant offers an unforgettable dining experience where the freshest local ingredients meet traditional Portuguese cuisine.
                    </p>
                    <ul>
                        <li><i class="bi bi-check2-all"></i> <span>Fresh, locally sourced ingredients</span></li>
                        <li><i class="bi bi-check2-all"></i> <span>Traditional Portuguese cuisine:</span></li>
                        <li><i class="bi bi-check2-all"></i> <span>Scenic dining experience:</span></li>
                    </ul>
                    <p class="pt-4">
                        Surrounded by the natural beauty of the southern coast, we provide a perfect setting for both casual meals and special occasions.Whether you're enjoying our signature octopus rice or indulging in a rich almond dessert, every bite is crafted with care and attention to detail. Our chefs take pride in using only the highest quality ingredients, sourced from local farmers and fishermen, to bring you the best the Algarve has to offer.
                    </p>
                    <p class="pt-4">
                        At Fonte do Vale, we believe in the joy of gathering around the table, savoring fresh, locally-sourced ingredients, and creating memories with every bite. Whether you're here for a special celebration or a cozy night out, our team is dedicated to making your visit unforgettable. Join us and let the flavors tell their story — we can’t wait to serve you!
                    </p>
                </div>
            </div>

        </div>

    </section><!-- /About Section -->

    <!-- Menu Section -->
    <section id="menu" class="menu section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Menu</h2>
            <p>Check Our Tasty Menu</p>
        </div><!-- End Section Title -->

        <div class="container isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul class="menu-filters isotope-filters">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-1">Starters</li>
                        <li data-filter=".filter-2">Principal</li>
                        <li data-filter=".filter-3">Desert</li>
                    </ul>
                </div>
            </div><!-- Menu Filters -->

            <div class="row isotope-container" data-aos="fade-up" data-aos-delay="200">

                @foreach($menu as $m)

                <div class="col-lg-6 menu-item isotope-item filter-{{ $m->type }}">
                    <img src="{{ asset('storage/food/'.$m->path)  }}" class="menu-img" alt="">
                    <div class="menu-content">
                        <a href="">{{ $m->name_pt }}</a><span>@if($m->half_price != null) {{ $m->half_price }} / @endif {{ $m->price }}</span>
                    </div>
                    <div class="menu-ingredients">
                        {{ $m->ingredients_pt }}
                    </div>
                </div><!-- Menu Item -->

                @endforeach

{{--                <div class="col-lg-6 menu-item isotope-item filter-test">--}}
{{--                    <img src="assets/img/menu/lobster-roll.jpg" class="menu-img" alt="">--}}
{{--                    <div class="menu-content">--}}
{{--                        <a href="#">Lobster Roll</a><span>$12.95</span>--}}
{{--                    </div>--}}
{{--                    <div class="menu-ingredients">--}}
{{--                        Plump lobster meat, mayo and crisp lettuce on a toasted bulky roll--}}
{{--                    </div>--}}
{{--                </div><!-- Menu Item -->--}}

            </div><!-- Menu Container -->

        </div>

    </section><!-- /Menu Section -->


    <!-- Gallery Section -->
    <section id="gallery" class="gallery section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Gallery</h2>
            <p>Some photos from Our Restaurant</p>
        </div><!-- End Section Title -->

        <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-0">

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="assets/img/gallery/1.jpg" class="glightbox" data-gallery="images-gallery">
                            <img src="assets/img/gallery/1.jpg" alt="" class="img-fluid">
                        </a>
                    </div>
                </div><!-- End Gallery Item -->

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="assets/img/gallery/2.jpg" class="glightbox" data-gallery="images-gallery">
                            <img src="assets/img/gallery/2.jpg" alt="" class="img-fluid">
                        </a>
                    </div>
                </div><!-- End Gallery Item -->

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="assets/img/gallery/3.jpg" class="glightbox" data-gallery="images-gallery">
                            <img src="assets/img/gallery/3.jpg" alt="" class="img-fluid">
                        </a>
                    </div>
                </div><!-- End Gallery Item -->

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="assets/img/gallery/4.jpg" class="glightbox" data-gallery="images-gallery">
                            <img src="assets/img/gallery/4.jpg" alt="" class="img-fluid">
                        </a>
                    </div>
                </div><!-- End Gallery Item -->

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="assets/img/gallery/5.jpg" class="glightbox" data-gallery="images-gallery">
                            <img src="assets/img/gallery/5.jpg" alt="" class="img-fluid">
                        </a>
                    </div>
                </div><!-- End Gallery Item -->

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="assets/img/gallery/6.jpg" class="glightbox" data-gallery="images-gallery">
                            <img src="assets/img/gallery/6.jpg" alt="" class="img-fluid">
                        </a>
                    </div>
                </div><!-- End Gallery Item -->

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="assets/img/gallery/7.jpg" class="glightbox" data-gallery="images-gallery">
                            <img src="assets/img/gallery/7.jpg" alt="" class="img-fluid">
                        </a>
                    </div>
                </div><!-- End Gallery Item -->

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="assets/img/gallery/8.jpg" class="glightbox" data-gallery="images-gallery">
                            <img src="assets/img/gallery/8.jpg" alt="" class="img-fluid">
                        </a>
                    </div>
                </div><!-- End Gallery Item -->

            </div>

        </div>

    </section><!-- /Gallery Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Contact</h2>
            <p>Contact Us</p>
        </div><!-- End Section Title -->

        <div class="mb-5" data-aos="fade-up" data-aos-delay="200">

            <iframe style="border:0; width: 100%; height: 400px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3643.5638718059!2d-8.852790003335357!3d37.30427621830754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd1b401c4bb70eb3%3A0xad785c9c5d47d36c!2sFonte%20Do%20Vale!5e1!3m2!1spt-PT!2spt!4v1731598877162!5m2!1spt-PT!2spt" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
{{--            <iframe style="border:0; width: 100%; height: 400px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>--}}
        </div><!-- End Google Maps -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-4">
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h3>Location</h3>
                            <p>Urbanização Vale da Telha 1 3, 8670-156 Aljezur</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-calendar flex-shrink-0"></i>
                        <div>
                            <h3>Open Hours</h3>
                            <p>Tuesday-Sunday:<br>10:00 AM - 23:00 PM</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-telephone flex-shrink-0"></i>
                        <div>
                            <h3>Call Us</h3>
                            <p>+351 282 997 334</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h3>Email Us</h3>
                            <p>rfontedovale@gmail.com</p>
                        </div>
                    </div><!-- End Info Item -->

                </div>

                <div class="col-lg-8">
{{--                    <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">--}}
                    <form  method="POST" action="/contactform" class="php-email-form">
                        <x-honeypot />
                        @csrf
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                            </div>

                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>

                                <button type="submit">Send Message</button>
                            </div>

                        </div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>

    </section><!-- /Contact Section -->

</main>

<footer id="footer" class="footer">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="index.html" class="logo d-flex align-items-center">
                    <span class="sitename">Fonte do Vale</span>
                </a>
                <div class="footer-contact pt-3">
                    <p>Urbanização Vale da Telha 1 3</p>
                    <p>8670-156 Aljezur</p>
                    <p class="mt-3"><strong>Phone:</strong> <span>+351 282 997 334</span></p>
                    <p><strong>Email:</strong> <span>rfontedovale@gmail.com</span></p>
                </div>

            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Useful Links</h4>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Terms of service</a></li>
                    <li><a href="#">Privacy policy</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Useful Links</h4>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Terms of service</a></li>
                    <li><a href="#">Privacy policy</a></li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-12 footer-links">
                <h4>Social</h4>
                <div class="social-links d-flex mt-4">
                    <a href=""><i class="bi bi-twitter-x"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">Fonte do Vale</strong> <span>All Rights Reserved</span></p>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you've purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
            Built with <i class="bi bi-heart-fill"></i> by <a href="https://www.linkedin.com/in/jonyr/">jonyr</a>
        </div>
    </div>

</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
{{--<script src="assets/vendor/php-email-form/validate.js"></script>--}}
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>
