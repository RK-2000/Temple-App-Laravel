<!doctype html>
<html lang="en">

<head>
    <!-- this site design by Nitesh Malviya -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style_temple.css?v=947477448.3">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link href="assets/aos/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />

    <title>Khidkaleshwar Mandir</title>
</head>

<body>
    <!-- header start here -->
    <nav class="navbar navbar-expand-lg py-3 navbar-light bg-white">
        <div class="container px-3">
            <a class="navbar-brand" href="#">
                <img src="assets/images/tmpl-logo.PNG" class="img-fluid">
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <!-- <span class="navbar-toggler-icon"></span> -->
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-between align-items-center w-100"
                id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-lg-0">
                    <li class="nav-item px-2">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="#">Temple</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="#">Gallery</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="#">Upcoming Events</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav flex-row justify-content-md-center flex-nowrap">
                    <li class="nav-item"><a class="nav-link btn btn-danger" href="">Donate Now</a> </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- header end here -->
    <div class="container-fluid px-0">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row d-flex justify-content-center align-items-center slider-l-bg">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-4 py-4 px-5">
                            <h2>{{ $temple_data->temple_name ?? ""}}, <span>Mandir</span></h2>
                            <p><?php echo $temple_data->about_us;  ?> </p>
                            <a class="btn btn-danger btn-lider-one">Know More</a>
                        </div>
                        <div class="col-lg-6">
                            <img src="assets/images/slider-1.PNG" class="d-block w-100" alt="...">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row d-flex justify-content-center align-items-center slider-l-bg">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-4 py-4 px-5">
                            <h2>Ancient city <span>ujjain</span></h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry. Lorem Ipsum has been the industry's
                                standard dummy text ever since the 1500s, when an unknown </p>
                            <a class="btn btn-danger btn-lider-one">Know More</a>
                        </div>
                        <div class="col-lg-6">
                            <img src="assets/images/slider-1.PNG" class="d-block w-100" alt="...">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row d-flex justify-content-center align-items-center slider-l-bg">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-4 py-4 px-5">
                            <h2>Ancient city <span>ujjain</span></h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry. Lorem Ipsum has been the industry's
                                standard dummy text ever since the 1500s, when an unknown </p>
                            <a class="btn btn-danger btn-lider-one">Know More</a>
                        </div>
                        <div class="col-lg-6">
                            <img src="assets/images/slider-1.PNG" class="d-block w-100" alt="...">
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="container-fluid py-5 tmpl-upcoming-ev">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="tmpl-w-hd-1">Upcoming <span>Event</span></h2>
                <p>Ujjain is one of those divine lands in Madhya Pradesh where you not just feel <br>
                    the peace but also sink in the divinity that calms your soul from within. </p>
            </div>
        </div>
        <div class="row d-flex justify-content-center align-items-center mt-5">
            <div class="col-lg-2 mb-3" data-aos="fade-up" data-aos-delay="100">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 text-center px-0 col-sm col-3">
                                <div class="tml-ev-ic-dv">
                                    <i class="fa fa-clone" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-lg-9 px-0 col-sm col-9">
                                <h6>legend of Simhastha</h6>
                                <p class="text-justify">We’ve helped over 2,500 job
                                    seekers to get into the most
                                    popular tech teams.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 mb-3" data-aos="fade-up" data-aos-delay="200">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 text-center px-0 col-sm col-3">
                                <div class="tml-ev-ic-dv">
                                    <i class="fa fa-clone" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-lg-9 px-0 col-sm col-9">
                                <h6>legend of Simhastha</h6>
                                <p class="text-justify">We’ve helped over 2,500 job
                                    seekers to get into the most
                                    popular tech teams.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 mb-3" data-aos="fade-up" data-aos-delay="300">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 text-center px-0 col-sm col-3">
                                <div class="tml-ev-ic-dv">
                                    <i class="fa fa-clone" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-lg-9 px-0 col-sm col-9">
                                <h6>legend of Simhastha</h6>
                                <p class="text-justify">We’ve helped over 2,500 job
                                    seekers to get into the most
                                    popular tech teams.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 mb-3" data-aos="fade-up" data-aos-delay="400">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 text-center px-0 col-sm col-3">
                                <div class="tml-ev-ic-dv">
                                    <i class="fa fa-clone" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-lg-9 px-0 col-sm col-9">
                                <h6>legend of Simhastha</h6>
                                <p class="text-justify">We’ve helped over 2,500 job
                                    seekers to get into the most
                                    popular tech teams.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 mb-3" data-aos="fade-up" data-aos-delay="500">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 text-center px-0 col-sm col-3">
                                <div class="tml-ev-ic-dv">
                                    <i class="fa fa-clone" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-lg-9 px-0 col-sm col-9">
                                <h6>legend of Simhastha</h6>
                                <p class="text-justify">We’ve helped over 2,500 job
                                    seekers to get into the most
                                    popular tech teams.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-12 text-center">
                <a href="#" class="btn btn-danger">View all Events</a>
            </div>
        </div>

    </div>

    <!-- service section start here -->
    <section class="tmpl-service-sec-hm">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-6 tmpl-svce-rw-desc">
                    <a href="#" class="btn btn-secondary banner-section d-none d-lg-block d-xl-block d-md-block" style="width: 30%;">Our Services</a>
                    <h1 class="mt-5">Our Services</h1>
                    <p>Lorem Ipsum is simply dummy text of the printing and
                        typesetting industry. Lorem Ipsum has been the industry's
                        standard dummy text ever since the 1500s, when an unknown
                        printer took a galley of type and scrambled it to make a type </p>
                    <a class="a-link" href="#">Jump to the Information </a>
                    <a href="#" class="btn btn-secondary banner-section d-block d-lg-none d-xl-none d-md-none w-50%" style="top: 40px;width: 40%;">Our Services</a>
                </div>
                <div class="col-lg-5">
                    <div class="row tmpl-svce-crd-rw">
                        <div class="col-lg-6 col-sm col-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="card border-0 tmpl-svce-crd-one">
                                <img src="assets/images/service-hm-1.PNG" class="img-fluid">
                                <div class="card-body">
                                    <h5 class="">Pooja</h5>
                                    <p>Assertively redefine end end</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm col-6" data-aos="fade-up" data-aos-delay="200">
                            <div class="card border-0 tmpl-svce-crd-two">
                                <img src="assets/images/service-hm-2.PNG" class="img-fluid">
                                <div class="card-body">
                                    <h5 class="">Darshon</h5>
                                    <p>Assertively redefine end end</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm col-6" data-aos="fade-up" data-aos-delay="300">
                            <div class="card border-0 tmpl-svce-crd-three shadow">
                                <img src="assets/images/service-hm-2.PNG" class="img-fluid">
                                <div class="card-body">
                                    <h5 class="">Car Pooja</h5>
                                    <p>Assertively redefine end end</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm col-6" data-aos="fade-up" data-aos-delay="400">
                            <div class="card border-0 tmpl-svce-crd-four shadow">
                                <img src="assets/images/service-hm-2.PNG" class="img-fluid">
                                <div class="card-body">
                                    <h5 class="">Prashad</h5>
                                    <p>Assertively redefine end end</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service section end here -->

    <div class="container-fluid py-5 mt-5 tmpl-upcoming-ev">
        <div class="row mt-5">
            <div class="col-lg-12 text-center mt-3">
                <h2 class="tmpl-w-hd-1">POINTS OF <span>INTEREST</span></h2>
                <p>Ujjain is one of those divine lands in Madhya Pradesh where you not just feel <br>
                    the peace but also sink in the divinity that calms your soul from within. </p>
            </div>
        </div>
    </div>

    <section class="tmpl-points">
        <div class="container-fluid py-5 tmpl-upcoming-ev">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-2 banner-section d-none d-lg-block d-xl-block d-md-block">
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="assets/images/temple-5.jpg" class="fancylight popup-btn"
                                data-fancybox-group="light">
                                <img class="img-fluid w-100 h-100" src="assets/images/temple-5.jpg">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-sm col-12">
                    <div class="row">
                        <div class="col-lg-6 p-0 col-sm col-6">
                            <a href="assets/images/temple-2.jpg" class="fancylight popup-btn"
                                data-fancybox-group="light">
                                <img class="img-fluid w-100 h-100 px-1 pb-2" src="assets/images/temple-2.jpg">
                            </a>
                        </div>
                        <div class="col-lg-6 p-0 col-sm col-6">
                            <a href="assets/images/temple-3.jpg" class="fancylight popup-btn"
                                data-fancybox-group="light">
                                <img class="img-fluid  w-100 h-100 px-1 pb-2" src="assets/images/temple-3.jpg">
                            </a>
                        </div>
                        <div class="col-lg-6 p-0 col-sm col-6">
                            <a href="assets/images/temple-4.jpg" class="fancylight popup-btn"
                                data-fancybox-group="light">
                                <img class="img-fluid  w-100 h-100 px-1" src="assets/images/temple-4.jpg">
                            </a>
                        </div>
                        <div class="col-lg-6 p-0 col-sm col-6">
                            <a href="assets/images/temple-2.jpg" class="fancylight popup-btn"
                                data-fancybox-group="light">
                                <img class="img-fluid  w-100 h-100 px-1" src="assets/images/temple-2.jpg">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tmpl-dnt-hm my-5">
        <div class="container-fluid py-5 tmpl-upcoming-ev">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-body">
                            <p class="d-inline">
                                Lorem Ipsum is simply dummy text of the <br>
                                printing and typesetting industry.
                            </p>
                            <a class="btn btn-danger pull-right d-inline">Donate Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- news section start here -->
    <section class="tmpl-news">
        <div class="container-fluid py-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <h2 class="tmpl-w-hd-1 mb-5 fw-bolder">Latest <span>news</span></h2>
                            <div class="card shadow-sm" data-aos="fade-right">
                                <div class="card-body pb-1">
                                    <div class="row">
                                        <div class="col-lg-3 col-sm col-3 mb-3 pe-0">
                                            <img src="assets/images/temple-2.jpg" class="img-fluid w-100 h-100">
                                        </div>
                                        <div class="col-lg-9 col-sm col-9 mb-3 py-2">
                                            <h6>
                                                Lorem Ipsum is simply dummy text of the printing and
                                            </h6>
                                            <a class="tmpl-days-ago pull-left" href="#"><i class="fa fa-clock-o"></i> 2
                                                days ago</a>
                                            <a class="tmpl-min-read pull-right me-3" href="#"><i
                                                    class="fa fa-clock-o"></i> 6 min read</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card shadow-sm" data-aos="fade-left">
                                <div class="card-body pb-1">
                                    <div class="row">
                                        <div class="col-lg-3 col-sm col-3 mb-3 pe-0">
                                            <img src="assets/images/temple-2.jpg" class="img-fluid w-100 h-100">
                                        </div>
                                        <div class="col-lg-9 col-sm col-9 mb-3 py-2">
                                            <h6>
                                                Lorem Ipsum is simply dummy text of the printing and
                                            </h6>
                                            <a class="tmpl-days-ago pull-left" href="#"><i class="fa fa-clock-o"></i> 2
                                                days ago</a>
                                            <a class="tmpl-min-read pull-right me-3" href="#"><i
                                                    class="fa fa-clock-o"></i> 6 min read</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card shadow-sm" data-aos="fade-right">
                                <div class="card-body pb-1">
                                    <div class="row">
                                        <div class="col-lg-3 col-sm col-3 mb-3 pe-0">
                                            <img src="assets/images/temple-2.jpg" class="img-fluid w-100 h-100">
                                        </div>
                                        <div class="col-lg-9 col-sm col-9 mb-3 py-2">
                                            <h6>
                                                Lorem Ipsum is simply dummy text of the printing and
                                            </h6>
                                            <a class="tmpl-days-ago pull-left" href="#"><i class="fa fa-clock-o"></i> 2
                                                days ago</a>
                                            <a class="tmpl-min-read pull-right me-3" href="#"><i
                                                    class="fa fa-clock-o"></i> 6 min read</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 tmpl-nws-lst-dv">
                            <div class="card shadow-sm" data-aos="fade-left">
                                <div class="card-body pb-1">
                                    <div class="row">
                                        <div class="col-lg-3 col-sm col-3 mb-3 pe-0">
                                            <img src="assets/images/temple-2.jpg" class="img-fluid w-100 h-100">
                                        </div>
                                        <div class="col-lg-9 col-sm col-9 mb-3 py-2">
                                            <h6>
                                                Lorem Ipsum is simply dummy text of the printing and
                                            </h6>
                                            <a class="tmpl-days-ago pull-left" href="#"><i class="fa fa-clock-o"></i> 2
                                                days ago</a>
                                            <a class="tmpl-min-read pull-right me-3" href="#"><i
                                                    class="fa fa-clock-o"></i> 6 min read</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center mt-5">
                                <a href="#" class="web-t-color td-none fw-bolder">See all News</a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- news section end here -->



    <!-- footer start here -->
    <section class="tmpl-ftr pt-5">
        <div class="container-fluid pt-4">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-5 pb-4">
                            <h4>VIHARA</h4>
                            <p>
                                Lorem Ipsum is simply dummy text of <br>
                                the printing and typesetting industry
                            </p>
                            <a href="#" class="btn btn-danger">Ask Question</a>
                        </div>
                        <div class="col-lg-2 col-sm col-4 pb-4">
                            <ul class="list-unstyled">
                                <li class="mb-4">Lorem Ipsum</li>
                                <li><a href="#">About US</a></li>
                                <li><a href="#">Temple History</a></li>
                                <li><a href="#">Photo Gallery</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-2 col-sm col-4 pb-4">
                            <ul class="list-unstyled">
                                <li class="mb-4">Resources</li>
                                <li><a href="#">Video Gallery</a></li>
                                <li><a href="#">Upcoming Events</a></li>
                                <li><a href="#">Contact US</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-2 col-sm col-4 pb-4">
                            <ul class="list-unstyled">
                                <li class="mb-4">Support</li>
                                <li><a href="#">Lorem Ipsum</a></li>
                                <li>
                                    <span>
                                        +1-301-340-3946 <br>
                                        info@vihara.com
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row tmpl-footer-bottom mt-5">
                        <div class="col-lg-6">
                            <p class="pt-3 pb-2 text-muted">Designed & Devlopment by <span><a class="web-t-color td-none" href="https://agnitotechnologies.com/">Agnito Technologies</a></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- footer end here -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/aos/aos.js" rel="stylesheet"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
    <script>
        $('#carousel02').owlCarousel({
            // stagePadding: 50,
            loop: true,
            // margin: 50,
            nav: false,
            dots: false,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            autoplay: false,
            smartSpeed: 600,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                768: {
                    items: 1
                },
                1150: {
                    items: 1
                }
            }
        });
        $('#carousel03').owlCarousel({
            // stagePadding: 50,
            loop: true,
            // margin: 50,
            nav: false,
            dots: false,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            autoplay: true,
            // smartSpeed: 600,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                768: {
                    items: 1
                },
                1150: {
                    items: 1
                }
            }
        });
        $('#carouse-fearured').owlCarousel({
            // stagePadding: 50,
            loop: true,
            margin: 10,
            nav: false,
            dots: false,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            autoplay: true,
            // smartSpeed: 600,
            responsive: {
                0: {
                    items: 2
                },
                480: {
                    items: 2
                },
                768: {
                    items: 4
                },
                1150: {
                    items: 4
                }
            }
        });


        AOS.init({
            duration: 1000,
            easing: "ease-in-out-back"
        });


        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }

        $(document).ready(function () {
            var popup_btn = $('.popup-btn');
            popup_btn.magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        });

    </script>
</body>

</html>