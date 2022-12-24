<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if(isset($master_layout_title))
        <title>{{$master_layout_title}} - {{ config('app.name') }}</title>
    @else
        <title>@yield('title') - {{ config('app.name') }}</title>
    @endif
    {{--        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">--}}
    {{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/LineIcons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tailwindcss.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tiny-slider.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css"/>
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">


    @livewireStyles
    <style>
        [x-cloak] {
            display: none !important;
        }

        .screen-size {

            height: 500px;
        }

        @media (min-width: 1300px) {
            .screen-size {

                height: 700px;
            }

        }
    </style>
    @livewireScripts

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
    <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>


</head>
<body>
<!--[if IE]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
    your browser</a> to improve your experience and security.</p>
<![endif]-->


<!--====== PRELOADER PART START ======-->

<div class="preloader" style="opacity: 0; display: none;">
    <div class="loader">
        <div class="ytp-spinner">
            <div class="ytp-spinner-container">
                <div class="ytp-spinner-rotator">
                    <div class="ytp-spinner-left">
                        <div class="ytp-spinner-circle"></div>
                    </div>
                    <div class="ytp-spinner-right">
                        <div class="ytp-spinner-circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--====== PRELOADER PART ENDS ======-->

<!--====== HEADER PART START ======-->

<section class="header_area ">
    <div class="bg-white">
        <div class="container relative">
            <div class="row items-center">
                <div class="w-full">
                    <nav class="flex items-center py-4 navbar navbar-expand-lg">
                        <a class="navbar-brand mr-5" href="index.html">
                            <img width="55px" src="img/logo.png" alt="Logo">
                        </a>
                        <p><b>Welcome to Interwood Decision Support System</b></p>
                        <!-- navbar collapse -->
                    </nav> <!-- navbar -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- header navbar -->

    <div id="indicators-carousel" class="relative overflow-hidden z-0" data-carousel="static">
        <!-- Carousel wrapper -->
        <div class="relative overflow-hidden z-0  screen-size">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                <img src="img/interwood-banner-1.jpg"
                     class="absolute block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="img/interwood-banner-2.jpg"
                     class="absolute block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="img/interwood-banner-3.png"
                     class="absolute block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                    data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                    data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                    data-carousel-slide-to="2"></button>
        </div>
        <!-- Slider controls -->
        <button type="button"
                class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
        <span
            class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                 stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path
                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            <span class="sr-only">Previous</span>
        </span>
        </button>
        <button type="button" id="next"
                class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
        <span
            class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                 stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path
                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            <span class="sr-only">Next</span>
        </span>
        </button>
    </div>
</section>

<!--====== HEADER PART ENDS ======-->

<!--====== SERVICES PART START ======-->

<section class="services_area pt-120 pb-120">
    <div class="container">
        <div class="row justify-center">
            <div class="w-full lg:w-1/2">
                <div class="section_title text-center pb-6">
                    <h4 class="main_title">Our IT Portals</h4>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class=" flex flex-row justify-center">
            <div class="w-full sm:w-10/12 md:w-6/12 lg:w-4/12">
                <a href="http://192.168.1.40:81">
                    <div class="single_services text-center mt-8 mx-3">
                        <div class="services_icon">
                            <i class="lni lni-school-bench-alt"></i>

                            <svg xmlns="http://www.w3.org/2000/svg" width="94" height="92" viewBox="0 0 94 92">
                                <path class="services_shape" id="Polygon_12" data-name="Polygon 12"
                                      d="M42.212,2.315a11,11,0,0,1,9.576,0l28.138,13.6a11,11,0,0,1,5.938,7.465L92.83,54.018A11,11,0,0,1,90.717,63.3L71.22,87.842A11,11,0,0,1,62.607,92H31.393a11,11,0,0,1-8.613-4.158L3.283,63.3A11,11,0,0,1,1.17,54.018L8.136,23.383a11,11,0,0,1,5.938-7.465Z"></path>
                            </svg>
                        </div>
                        <div class="services_content mt-5">
                            <h3 class="services_title text-black font-semibold text-xl md:text-3xl">IMS</h3>
                            <p class="mt-4">The inventory management system, here we have all the information about our
                                staff, accessories, employees & assets.</p>
                        </div>
                    </div> <!-- single services -->
                </a>
            </div>
            <div class="w-full sm:w-10/12 md:w-6/12 lg:w-4/12">
                <a href="http://192.168.1.40:82">

                    <div class="single_services text-center mt-8 mx-3">
                        <div class="services_icon">
                            <i class="lni lni-write"></i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="94" height="92" viewBox="0 0 94 92">
                                <path class="services_shape" id="Polygon_12" data-name="Polygon 12"
                                      d="M42.212,2.315a11,11,0,0,1,9.576,0l28.138,13.6a11,11,0,0,1,5.938,7.465L92.83,54.018A11,11,0,0,1,90.717,63.3L71.22,87.842A11,11,0,0,1,62.607,92H31.393a11,11,0,0,1-8.613-4.158L3.283,63.3A11,11,0,0,1,1.17,54.018L8.136,23.383a11,11,0,0,1,5.938-7.465Z"></path>
                            </svg>
                        </div>
                        <div class="services_content mt-5">
                            <h3 class="services_title text-black font-semibold text-xl md:text-3xl">TMS</h3>
                            <p class="mt-4">
                                The task management system, here we have assign tasks to our employees, so they can
                                manage
                                their workload comfortably.
                            </p>
                        </div>
                    </div> <!-- single services -->
                </a>
            </div>
            <div class="w-full sm:w-10/12 md:w-6/12 lg:w-4/12">
                <a href="/login">
                    <div class="single_services text-center mt-8 mx-3">
                        <div class="services_icon">
                            <i class="lni lni-checkmark-circle"></i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="94" height="92" viewBox="0 0 94 92">
                                <path class="services_shape" id="Polygon_12" data-name="Polygon 12"
                                      d="M42.212,2.315a11,11,0,0,1,9.576,0l28.138,13.6a11,11,0,0,1,5.938,7.465L92.83,54.018A11,11,0,0,1,90.717,63.3L71.22,87.842A11,11,0,0,1,62.607,92H31.393a11,11,0,0,1-8.613-4.158L3.283,63.3A11,11,0,0,1,1.17,54.018L8.136,23.383a11,11,0,0,1,5.938-7.465Z"></path>
                            </svg>
                        </div>
                        <a class="services_content mt-5">
                            <h3 class="services_title text-black font-semibold text-xl md:text-3xl">SSO</h3>
                            <p class="mt-4">

                                One place to manage and control access of all portals for the employees
                            </p>
                        </a>
                    </div> <!-- single services -->
                </a>
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== SERVICES PART ENDS ======-->

<!--====== ABOUT PART START ======-->

{{--<!--====== ABOUT PART ENDS ======-->--}}

{{--<!--====== SERVICES PART START ======-->--}}

<section id="services" class="services_area pt-120 pb-120">
    <div class="container">
        <div class="row justify-center">
            <div class="w-full lg:w-1/2">
                <div class="section_title text-center pb-6">
                    <h4 class="main_title">We Believe</h4>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="flex flex-row justify-center">
            <div class="w-full sm:w-10/12 md:w-6/12 lg:w-4/12">
                <div class="single_services text-center mt-8 mx-3">
                    <div class="services_content mt-5 xl:mt-10">
                        <p class="mt-4">
                            “Your talent determines what you can do. Your motivation determines how much you’re willing
                            to do. Your attitude determines how well you do it.” —Lou Holtz

                        </p>
                    </div>
                </div> <!-- single services -->
            </div>

            <div class="w-full sm:w-10/12 md:w-6/12 lg:w-4/12">
                <div class="single_services text-center mt-8 mx-3">
                    <div class="services_content mt-5 xl:mt-10">

                        <p class="mt-4"> “Build your own dreams or someone else will hire you to build theirs.” <br>
                            —Farrah
                            Gray </p>
                    </div>
                </div> <!-- single services -->
            </div>

            <div class="w-full sm:w-10/12 md:w-6/12 lg:w-4/12">
                <div class="single_services text-center mt-8 mx-3">
                    <div class="services_content mt-5 xl:mt-10">

                        <p class="mt-4">“Never give up on a dream just because of the time it will take to accomplish
                            it. The time will pass anyway.” —Earl Nightingale</p>
                    </div>
                </div> <!-- single services -->
            </div>


        </div> <!-- row -->
    </div> <!-- container -->
</section>


<!--====== FOOTER PART START ======-->

<footer id="footer" class="footer_area bg-black relative z-10">
    <div class="shape absolute left-0 top-0 opacity-5 h-full overflow-hidden w-1/3">
        <img src="img/footer-shape-left.png" alt="">
    </div>
    <div class="shape absolute right-0 top-0 opacity-5 h-full overflow-hidden w-1/3">
        <img src="img/footer-shape-right.png" alt="">
    </div>
    <div class="container">
        <div class="footer_widget pt-18 pb-120">
            <div class="row justify-center">
                <div class="w-full md:w-1/2 lg:w-3/12">
                    <div class="footer_about mt-13 mx-3">
                        <div class="footer_logo">
                            <a href="#"><img src="img/logo.png" width="55px" alt=""></a>
                        </div>
                        <div class="footer_content mt-8">
                            <p class="text-white">
                                Buy the best furniture online in Pakistan with InterWood.
                                <br>
                                <br>
                                With decades of foothold experience in the furniture industry, InterWood offers
                                affordable wooden furniture at the best prices in Pakistan. Furniture that will make
                                your living spaces look prolific with versatile, high quality, and stylish furniture.
                            </p>
                        </div>
                    </div> <!-- footer about -->
                </div>
                {{--                <div class="w-full md:w-1/2 lg:w-5/12">--}}
                {{--                    <div class="footer_link_wrapper flex flex-wrap mx-3">--}}
                {{--                        <div class="footer_link w-1/2 md:pl-13 mt-13">--}}
                {{--                            <h2 class="footer_title text-xl font-semibold text-white">Quick Links</h2>--}}
                {{--                            <ul class="link pt-4">--}}
                {{--                                <li><a href="#" class="text-white mt-4 hover:text-theme-color">Company</a></li>--}}
                {{--                                <li><a href="#" class="text-white mt-4 hover:text-theme-color">Privacy Policy</a></li>--}}
                {{--                                <li><a href="#" class="text-white mt-4 hover:text-theme-color">About</a></li>--}}
                {{--                            </ul>--}}
                {{--                        </div> <!-- footer link -->--}}
                {{--                        <div class="footer_link w-1/2 md:pl-13 mt-13">--}}
                {{--                            <h2 class="footer_title text-xl font-semibold text-white">Resources</h2>--}}
                {{--                            <ul class="link pt-4">--}}
                {{--                                <li><a href="#" class="text-white mt-4 hover:text-theme-color">Support</a></li>--}}
                {{--                                <li><a href="#" class="text-white mt-4 hover:text-theme-color">Contact</a></li>--}}
                {{--                                <li><a href="#" class="text-white mt-4 hover:text-theme-color">Terms</a></li>--}}
                {{--                            </ul>--}}
                {{--                        </div> <!-- footer link -->--}}
                {{--                    </div> <!-- footer link wrapper -->--}}
                {{--                </div>--}}

            </div> <!-- row -->
        </div> <!-- footer widget -->

    </div> <!-- container -->
</footer>

<!--====== FOOTER PART ENDS ======-->

<!--====== BACK TOP TOP PART START ======-->


<!--====== BACK TOP TOP PART ENDS ======-->

<!--====== PART START ======-->

<!--
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-">

                </div>
            </div>
        </div>
    </section>
-->

<!--====== PART ENDS ======-->


<!--====== Tiny Slider js ======-->
<script src="/js/tiny-slider.js"></script>

<!--====== Wow js ======-->
<script src="/js/wow.min.js"></script>

<!--====== Main js ======-->
<script src="/js/main.js"></script>

<script>

    setInterval(function () {

        document.getElementById("next").click();

    }, 5000)

</script>


</body>
</html>
