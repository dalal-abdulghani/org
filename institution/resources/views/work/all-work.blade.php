@extends('layouts.main')


@section('haed')

<link rel="stylesheet" href="{{ asset('css/style2.css') }}">

@section('title', $settings['site_name'] . ' - مجالات عملنا')



<style>
    .post-grid {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .post-grid .details {
        flex-grow: 1;
    }

    .post-grid .thumb .inner img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .post-grid {
        height: 100%;
    }

    .custom-pagination {
        display: flex;
        list-style: none;
        padding: 0;
    }

    .custom-pagination li {
        margin: 0 5px;
    }

    .custom-pagination li a,
    .custom-pagination li span {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #93b85f;
        color: white;
        text-decoration: none;
        font-size: 16px;
        font-weight: bold;
        transition: background-color 0.3s;
    }

    .custom-pagination li a:hover {
        background-color: #afd47a;
    }

    .custom-pagination li.active span {
        background-color: #c3c7c4;
    }

    .custom-pagination li.disabled span {
        background-color: #6c757d;
    }

</style>








@endsection

@section('content')







<!-- site wrapper -->
<div class="site-wrapper">

    <div class="main-overlay"></div>




    <section class="page-header" style="margin-top: 100px">
        <div class="container-xl">
            <div class="text-center">
                <h1 class="mt-0 mb-2">مجالات عملنا</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">مجالات عملنا</li>
                        <li class="breadcrumb-item active" aria-current="page">مجالات عملنا</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <!-- section main content -->
    <section class="main-content">
        <div class="container-xl">

            <div class="row gy-4">

                <div class="col-lg-8">
                    <div class="row gy-4">
                        @foreach($works as $work)
                        <div class="col-sm-6">
                            <div class="post post-grid rounded bordered">
                                <div class="thumb top-rounded">
                                    <a href="#" class="category-badge position-absolute">
                                        {{ $work->category->name }}
                                    </a>
                                    <span class="post-format">
                                        <i class="{{app(\App\Http\Controllers\WorkFieldController::class)->getCategoryIcon($work->category->name)}}"></i>
                                    </span>
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="{{ asset('storage/' . $work->cover_image) }}" alt="{{ $work->title }}" width="100%" height="200px" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details">
                                    <ul class="meta list-inline mb-0">
                                        <li class="list-inline-item">مؤسسة رواسخ</li>
                                        <li class="list-inline-item">{{ $work->created_at->format('d M Y') }}</li>
                                    </ul>
                                    <h5 class="post-title mb-3 mt-3"><a href="{{ route('work_fields.show',  $work->id) }}">{{Str::limit($work->name , 20) }}</a></h5>
                                    <p class="excerpt mb-0">{{ Str::limit($work->description, 50) }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                    <nav>
                        @if ($works->total() > 6)
                        <ul class="pagination justify-content-center custom-pagination">
                            @if ($works->onFirstPage())
                            <li class="disabled" aria-disabled="true"><span>&laquo;</span></li>
                            @else
                            <li><a href="{{ $works->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                            @endif

                            @foreach ($works->links() as $page => $url)
                            @if ($page == $works->currentPage())
                            <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                            @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                            @endforeach

                            @if ($works->hasMorePages())
                            <li><a href="{{ $works->nextPageUrl() }}" rel="next">&raquo;</a></li>
                            @else
                            <li class="disabled" aria-disabled="true"><span>&raquo;</span></li>
                            @endif
                        </ul>
                        @endif
                    </nav>
                </div>

                <div class="col-lg-4">

                    <!-- sidebar -->
                    <div class="sidebar">
                        <!-- widget about -->
                        <div class="widget rounded">
                            <div class="widget-about data-bg-image text-center">
                                <img class="logo" loading="lazy" src="{{ isset($settings['site_logo']) ? asset($settings['site_logo']) : asset('images/٢٠٢٤١٠٠٣_٢٠٠٩٣٦-removebg-preview.png') }}" width="200" alt="شعار الموقع">
                                <p class="mb-4">
                                    {{ $settings['site_description'] ?? ' مؤسسة الرواسخ التنموية هي منظمة غير ربحية تسعى
                                    إلى تحقيق التنمية المستدامة في مختلف المجتمعات من خلال تنفيذ المشاريع والبرامج التي
                                    تعزز التعليم، تمكين الشباب، ودعم الفئات الأكثر احتياجًا. تسعى المؤسسة إلى تقديم حلول
                                    مبتكرة تهدف إلى تحسين جودة الحياة وتحقيق التقدم الاجتماعي والاقتصادي.
                                    ' }}
                                </p>
                                <ul class="social-icons list-unstyled list-inline mb-0">
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    {{-- <li class="list-inline-item"><a href="#"><i class="fab fa-whatsapp"></i></a>
                                    </li> --}}
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>










                        <!-- widget tags -->
                        <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">للتبرع تواصل معنا</h3>
                            </div>
                            <div class="widget-content text-center">
                                <button class="btn btn-default" style="    border: none;
    border-radius: 30px;
    color: white;
    padding: 5px 40px 8px 40px;
    font-size: 18px;
    width: max-content;"> تواصل معنا </button>
                            </div>
                        </div>


                    </div>

                </div>

            </div>

        </div>
    </section>




</div>















@endsection
