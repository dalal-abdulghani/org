<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>
        @yield('title', ($settings['site_name'] ?? 'مؤسسة رواسخ التنموية') . ' - الرئيسية')
    </title>

    <meta name="description" content=" مؤسسة رواسخ التنموية" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/mobile_responsive.css') }}" />



</head>

@yield('head')
<body>
    <header class="fixed-top" style="z-index: 9999; ">
        <div class="nav-top d-none d-md-block position-relative">
            <div class="fluid-container position-relative d-flex justify-content-between top-nav">
                <a href="/" class="navbar-brand" style="
              background-color: white;
              border-bottom-left-radius: 20px;
              border-bottom-right-radius: 20px;
              z-index: 9999;
            ">
                    <img class="logo" loading="lazy" src="{{ isset($settings['site_logo']) ? asset($settings['site_logo']) : asset('images/٢٠٢٤١٠٠٣_٢٠٠٩٣٦-removebg-preview.png') }}" width="500" alt="شعار الموقع">

                </a>

                <div class="nav nav-underline align-items-center justify-content-end position-relative" style="height: max-content; margin: 13px">
                    @auth
                    <a class="nav-link p-0 mt-1 pe-3 d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-circle-user" style="font-size: 20px; color: #263676"></i>
                        <span style="margin-right: 10px; color: black; font-weight: bold">تسجيل الخروج</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                    @if(auth()->user()->isAdmin())
                    <a class="nav-link p-0 mt-1 pe-3" href="{{ route('admin.index') }}">
                        <i class="fa-solid fa-key" style="font-size: 20px; color: #263676"></i>
                        <span style="margin-right: 10px; color: black; font-weight: bold">لوحة التحكم</span>
                    </a>
                    @endif
                    @endauth

                    @guest
                    <a class="nav-link p-0 mt-1 pe-3 d-flex align-items-center" href="{{ route('login') }}">
                        <i class="fa-solid fa-circle-user" style="font-size: 20px; color: #263676"></i>
                        <span style="margin-right: 10px; color: black; font-weight: bold">تسجيل الدخول</span>
                    </a>
                    @endguest

                    <a class="nav-link p-0 ps-3" href="{{ route('contact.index') }}" id="search">
                        <i class="fa-solid fa-phone-flip" style="color: #263676; font-size:20px"></i> </a>
                </div>
            </div>
        </div>


        <div class="navbar-expand-md navbar-light bg-white p-0">
            <div class="fluid-container">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <button class="navbar-toggler col-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <a href="/" class="navbar-brand d-block d-md-none me-0 ps-3" style="
                  
                ">
                            <img class="logo" loading="lazy" src="images/٢٠٢٤١٠٢٢_١١٥٧٢٤.jpg" alt="" width="50" />
                        </a>

                        <div class="d-block d-md-none d-flex align-items-end me-3" style="height: max-content; margin: 13px">
                            <a class="nav-link p-0 mt-1 pe-3 d-flex align-items-center" href="/">
                                <i class="fa-solid fa-circle-user" style="font-size: 20px; color: #263676"></i>
                            </a>

                            <a class="nav-link p-0 ps-3" href="" id="search">
                                <i class="fa-solid fa-magnifying-glass" style="font-size: 18px; color: black"></i>
                            </a>
                        </div>

                        <div class="collapse navbar-collapse" id="navbarScroll">
                            <ul class="navbar-nav me-auto my-10 my-lg-0 navbar-nav-scroll" style="margin-right: auto; z-index: 9999" aria-owns="extraMenuItem1 extraMenuItem2 extraMenuItem3">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ url('/') }}">الرئيسية</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('about') }}">عن رواسخ</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        مجالات عملنا
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                        <li>
                                            @foreach ($categories as $category)
                                            <a class="dropdown-item" href="{{ route('work.category', $category->id) }}">
                                                {{ $category->name }} <br>
                                            </a>
                                            @endforeach
                                        </li>


                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('news.all') }}"> الأخبار</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('contact.index') }}"> تواصل معنا</a>
                                </li>


                            </ul>

                            <a class="btn btn-gradient d-none d-md-block" href="/all" style="
                    background: linear-gradient(to right, #263676, #6175c5);
                    border: none;
                    border-radius: 30px;
                    color: white;
                    padding: 5px 40px 10px 40px;
                    font-size: 18px;
                    display: inline-block;
                    margin-left: 90px;
                  ">
                                تبرع الآن
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>


    @yield('content')




    <footer>
        <div class="footer_section layout_padding">
            <div class="container">
                <div class="footer_logo">
                    <a href="index.html"><img src="{{ asset('images/new-removebg-preview.png') }}" width="200" /></a>
                </div>
                <div class="footer_menu">
                    <ul>
                        <li><a href="#"> اتفاقية مستوى الخدمة</a></li>
                        <li><a href="#"> الأسئلة الشائعة </a></li>
                        <li><a href="#"> سياسة الخصوصية </a></li>
                        <li><a href="#">إمكانية الوصول </a></li>
                        <li><a href="#">التبرع بالرسائل النصية</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="copyright_section">
            <div class="container">
                <p class="text-center">جميع الحقوق محفوظة لمؤسسة رواسخ</p>
            </div>
        </div>
    </footer>

    <div id="searchModal" class="search-modal" style="display: none;">
        <div class="search-modal-content">
            <span class="close">&times;</span>
            <h2>بحث</h2>
            <input type="text" id="searchInput" placeholder="أدخل مصطلح البحث...">
            <button id="searchButton">بحث</button>
        </div>
    </div>

   

    <script src="{{ asset('particles.js') }}"></script>
    <script src="{{ asset('app.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://kit.fontawesome.com/7198aa0602.js" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const counters = document.querySelectorAll('.stat-number');
            const speed = 500;

            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counter = entry.target;
                        const updateCount = () => {
                            const target = +counter.getAttribute('data-target');
                            const count = +counter.innerText;
                            const increment = target / speed;

                            if (count < target) {
                                counter.innerText = Math.ceil(count + increment);
                                setTimeout(updateCount, 1);
                            } else {
                                counter.innerText = target;
                            }
                        };
                        updateCount();
                        observer.unobserve(counter);
                    }
                });
            });

            counters.forEach(counter => {
                observer.observe(counter);
            });
        });

    </script>

    <script>
        $(document).ready(function() {
            "use strict";
            $('.post-carousel-twoCol').slick({
                dots: false
                , arrows: false
                , slidesToShow: 3
                , slidesToScroll: 1
                , responsive: [{
                        breakpoint: 768
                        , settings: {
                            slidesToShow: 2
                            , slidesToScroll: 2
                            , dots: false
                            , arrows: false
                        , }
                    }
                    , {
                        breakpoint: 576
                        , settings: {
                            slidesToShow: 1
                            , slidesToScroll: 1
                            , dots: false
                            , arrows: false
                        , }
                    }
                ]
            });
            $('.carousel-topNav-prev').click(function() {
                $('.post-carousel-twoCol').slick('slickPrev');
            });
            $('.carousel-topNav-next').click(function() {
                $('.post-carousel-twoCol').slick('slickNext');
            });

        });

    </script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


    @yield('script')

</body>

</html>
