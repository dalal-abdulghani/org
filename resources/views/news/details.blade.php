@extends('layouts.main')

@section('head')

{{-- @section('title',($settings['site_name'] ?? 'مؤسسة رواسخ التنموية') . ' -' $news->title) --}}

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
                    <div class="post post-single" style="margin-left: 10px; margin-right:10px">
                        <!-- post header -->
                        <div class="post-header">
                            <h1 class="title mt-0 mb-3" style="color: #203656"> {{ $news->title }} </h1>
                        </div>
                        <!-- featured image -->
                        <div class="featured-image">
                            <img src="{{ asset( $news->cover_image) }}" alt="post-title" width="100%" />
                        </div>
                        <!-- post content -->
                        <div class="post-content clearfix">
                              <p class="news-content" style="width: 100%; text-align: justify;" >{{ $news->content }}</p>
                        </div>

                        <!-- post bottom section -->
                        <div class="post-bottom">
                            <div class="row d-flex align-items-center">
                                <div class="col-md-6 col-12 text-start">
                                    <!-- tags -->
                                    <a href="#" class="tag"># {{ $news->tags }}</a>
                                </div>
                                <div class="col-md-6 col-12">
                                    <!-- social icons -->
                                    <ul class="social-icons list-unstyled list-inline mb-0 float-end" style="margin-left: 10px">
                                        <!-- Like button -->
                                        <li class="list-inline-item">
                                            <a href="{{ route('news.like', ['news' => $news->id]) }}" id="like-btn" data-post-id="{{ $news->id }}">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                            <span id="likes-count">{{ $news->likes_count }}</span>
                                        </li>


                                        <li class="list-inline-item">
                                            @auth

                                            <button class="btn-copy" style="background-color: #fff" onclick="copyText(this)">
                                                <i class="fa-regular fa-copy" style="color: #000" id="copy-icon"></i>
                                                <div id="copyMessage" class="copy-message"></div>
                                            </button>
                                            @else

                                            <button class="btn-copy" style="background-color: #fff" onclick="window.location.href='{{ route('login') }}'">
                                                <i class="fa-regular fa-copy" style="color: #000" id="copy-icon"></i>
                                                <div id="copyMessage" class="copy-message"></div>
                                            </button>
                                            @endauth
                                        </li>

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
                        <!-- widget popular posts -->
                        <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">الأخبار الأكثر إعجابًا</h3>
                            </div>
                            <div class="widget-content">
                                @foreach ($popularNews as $item)
                                    <div class="post post-list-sm circle">
                                        <div class="thumb circle">
                                            <span class="number">{{ $item->likes_count }}</span>
                                            <a href="{{ route('news.details', $item->id) }}">
                                                <div class="inner">
                                                    <img src="{{ asset($item->cover_image) }}" alt="{{ $item->title }}" width="50px" height="50px" style="border-radius: 50%" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0">
                                                <a href="{{ route('news.details', $item->id) }}">{{ $item->title }}</a>
                                            </h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">{{ $item->created_at->format('d F Y') }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@section('script')
<script>
    var likeCount = 0;
    var dislikeCount = 0;

    document.getElementById("like-btn").addEventListener("click", function() {
        likeCount++;
        document.getElementById("like-count").textContent = likeCount;
    });

    document.getElementById("dislike-btn").addEventListener("click", function() {
        dislikeCount++;
        document.getElementById("dislike-count").textContent = dislikeCount;
    });

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

</body>
</html>
@endsection
