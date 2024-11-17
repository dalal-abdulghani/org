@extends('layouts.main')

@section('head')

<link rel="stylesheet" href="{{ asset('css/style2.css') }}">
@endsection

@section('content')

<!-- site wrapper -->
<div class="site-wrapper" style="margin-top: 130px">
    <div class="main-overlay"></div>

    <!-- section main content -->
    <section class="main-content mt-3">
        <div class="container-xl">
            <div class="row gy-4">
                <div class="col-lg-8">
                    <!-- post single -->
                    <div class="post post-single">
                        <!-- post header -->
                        <div class="post-header" style="margin-right: 10px; margin-left:10px">
                            <h1 class="title mt-0 mb-3" style="color: #203656"> {{ $work->name }} </h1>
                        </div>
                        <!-- featured image -->
                        <div class="featured-image">
                            <img src="{{ asset($work->cover_image) }}" alt="project-title" width="100%" />
                        </div>
                        <!-- post content -->
                        <div class="post-content clearfix">
                            <p class="project-content" style="width: 100%; text-align: justify;">{{ $work->description
                                }}</p>
                        </div>

                        <div class="post-bottom">
                            <div class="row d-flex align-items-center">

                                <div class="col-md-6 col-12">
                                    <!-- social icons -->
                                    <ul class="social-icons list-unstyled list-inline mb-0 float-md-end"
                                        style="margin-left: 10px">



                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="spacer" data-height="50"></div>
                </div>

                <div class="col-lg-4">
                    <!-- sidebar -->
                    <div class="sidebar">
                        <!-- widget popular projects -->
                        <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">المشاريع ذات الصلة</h3>
                            </div>
                            <div class="widget-content">
                                @foreach ($relatedProjects as $item)
                                <div class="post post-list-sm circle">
                                    <div class="thumb circle">
                                        <span class="number">
                                            <i
                                                class="{{app(\App\Http\Controllers\WorkFieldController::class)->getCategoryIcon($work->category->name)}}"></i>

                                        </span>
                                        <a href="{{ route('work_fields.show', $item->id) }}">
                                            <div class="inner">
                                                <img src="{{ asset( $item->cover_image) }}"
                                                    alt="{{ $item->name }}" width="50px" height="50px"
                                                    style="border-radius: 50%" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0">
                                            <a href="{{ route('work_fields.show', $item->id) }}">{{
                                                Str::limit($item->name, 20) }}</a>
                                        </h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">{{ $item->created_at->format('d F Y') }}</li>
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">للتبرع تواصل معنا</h3>
                            </div>
                            <div class="widget-content text-center">
                              <a href="{{ route('contact.index') }}"> <button class="btn btn-default" style="    border: none;
    border-radius: 30px;
    color: white;
    padding: 5px 40px 8px 40px;
    font-size: 18px;
    width: max-content;"> تواصل معنا </button></a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
</div>




@endsection

@section('script')

<script>
    function copyText(button) {
        var text = document.querySelector(".news-content").textContent;
        var copyMessage = document.getElementById("copyMessage");
        var copyIcon = button.querySelector("#copy-icon");

        navigator.clipboard.writeText(text).then(function() {
            copyIcon.style.display = "none";
            copyMessage.innerHTML = "<span style='color: green;'>✔️</span>";
            copyMessage.style.display = "block";
            copyMessage.style.backgroundColor = "white";
            copyMessage.style.color = "black";
        }, function() {
            copyMessage.textContent = "فشل في نسخ النص";
            copyMessage.style.display = "block";
            copyMessage.style.backgroundColor = "rgba(0, 0, 0, 0.5)";
        });

        setTimeout(function() {
            copyMessage.style.display = "none";
            copyIcon.style.display = "inline";
        }, 3000);
    }

</script>


@endsection
