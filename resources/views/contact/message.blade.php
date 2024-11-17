@extends('layouts.main')

@section('head')
@section('title', $settings['site_name'] . ' - تواصل معنا')
<link rel="stylesheet" href="{{ asset('css/style2.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM2Jz6DgKfFJWMD+4D19F2mI4p0E+ZV0ViQR4f" crossorigin="anonymous">
@endsection

@section('content')

<div class="site-wrapper">

    <div class="main-overlay"></div>

    <!-- page header -->
    <section class="page-header" style="margin-top: 100px">
        <div class="container-xl">
            <div class="text-center">
                <h1 class="mt-0 mb-2">تواصل معنا</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">تواصل معنا</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <section class="main-content" dir="rtl">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-4">
                    <!-- contact info item -->
                    <div class="contact-item bordered rounded d-flex align-items-center">
                        <i class="fas fa-phone-alt fa-2x  me-3" style="color: #93b85f"></i>
                        <div class="details">
                            <h3 class="mb-0 mt-0">رقم التلفون</h3>
                            <p class="mb-0"> 77777777 +967</p>
                        </div>
                    </div>
                    <div class="spacer d-md-none d-lg-none" data-height="30"></div>
                </div>

                <div class="col-md-4">
                    <!-- contact info item -->
                    <div class="contact-item bordered rounded d-flex align-items-center">
                        <i class="fas fa-envelope fa-2x me-3" style="color: #93b85f"></i>
                        <div class="details">
                            <h3 class="mb-0 mt-0">الإيميل</h3>
                            <p class="mb-0">rwaskh@example.com</p>
                        </div>
                    </div>
                    <div class="spacer d-md-none d-lg-none" data-height="30"></div>
                </div>

                <div class="col-md-4">
                    <!-- contact info item -->
                    <div class="contact-item bordered rounded d-flex align-items-center">
                        <i class="fas fa-map-marker-alt fa-2x me-3" style="color: #93b85f"></i>
                        <div class="details">
                            <h3 class="mb-0 mt-0" >العنوان</h3>
                            <p class="mb-0">تعز - شارع المظفر</p>
                        </div>
                    </div>
                </div>
            </div>

            @if(session('success'))
            <div class="alert alert-success text-left mt-5">
                {{ session('success') }}
            </div>
            @endif

            <!-- section header -->
            <div class="section-header" style="margin-top: 50px">
                <h3 class="section-title"> لإرسال رسالتك</h3>
            </div>

            <!-- Contact Form -->
            <form id="contact-form" action="{{ route('contact.store') }}"  method="POST" class="contact-form" method="post">
                @csrf
                <div class="messages"></div>
                <div class="row">
                    <div class="column col-md-6">
                        <!-- Name input -->
                        <div class="form-group">
                            <input type="text" class="form-control" name="InputName" id="InputName" placeholder="اسمك " required="required" data-error="Name is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="column col-md-6">
                        <!-- Email input -->
                        <div class="form-group">
                            <input type="email" class="form-control" id="InputEmail" name="InputEmail" placeholder="الايميل" required="required" data-error="Email is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="column col-md-12">
                        <!-- Message textarea -->
                        <div class="form-group">
                            <textarea name="InputMessage" id="InputMessage" class="form-control" rows="4" placeholder="اترك رسالتك هنا  ..." required="required" data-error="Message is required."></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>

                <button type="submit" name="submit" id="submit" value="Submit" class="btn btn-default" style="width: auto">ارسال الرسالة </button><!-- Send Button -->
            </form>
            <!-- Contact Form end -->
        </div>
    </section>

</div>

@endsection
