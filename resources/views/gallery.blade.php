@extends('layouts.main')

@section('head')

<style>


</style>

@endsection
@section('content')

<div id="homeCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner" role="region" aria-label="جديد رواسخ">
        <h2 class="visually-hidden">جديد رواسخ</h2>
        <div class="carousel-indicators align-items-center">
            @foreach ($slides as $index => $slide)
                <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="{{ $index }}"
                    class="carousel-indicators_item {{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="الانتقال إلى الشريحة رقم {{ $index + 1 }}"></button>
            @endforeach
        </div>

        @foreach ($slides as $index => $slide)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                <picture>
                    <source srcset="{{ asset($slide->image) }}" media="(min-width: 768px)" />
                    <img src="{{ asset($slide->image) }}" alt="Image {{ $index + 1 }}" />
                </picture>
                <div class="carousel-content px-4 px-md-5 mx-md-4 text-center text-md-start position-absolute translate-middle-y"
                    style="color: #ffffff">
                    <h1 class="text-center px-xl-5 text-md-start" style="color: #fff; display: flex" data-aos="fade-up"
                        data-aos-delay="100">
                        {{ $slide->title }}
                    </h1>
                    <p class="px-xl-5" style="color: #fff" data-aos="fade-up" data-aos-delay="200">
                        {{ $slide->description }}
                    </p>
                    <a href="{{ $slide->button_link }}" class="btn rounded-pill px-5 fw-bold fs-5 mx-xl-5" style="color: #263676; background-color: #fff"
                        data-aos="fade-up" data-aos-delay="300">
                        {{ $slide->button_text }}
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>








<div style="height: 100px"></div>

<div class="container container-1">
    <div class="video">
        @if(isset($settings['intro_video']) && filter_var($settings['intro_video'], FILTER_VALIDATE_URL))
        <iframe width="560" height="315" src="{{ str_replace('watch?v=', 'embed/', $settings['intro_video']) }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    @else
        <p> هنا فيديو عن المؤسسة </p>
    @endif
        </div>
    <div class="content">
        <h3 class="section-title" style="text-align: justify;">عن مؤسسة رواسخ</h3> <br>

        <p style="text-align: justify; margin-top:20px">
            {{ $settings['site_description'] ?? '

            مؤسسة الرواسخ التنموية هي منظمة غير ربحية تسعى إلى تحقيق التنمية المستدامة في مختلف المجتمعات من خلال تنفيذ المشاريع والبرامج التي تعزز التعليم، تمكين الشباب، ودعم الفئات الأكثر احتياجًا. تسعى المؤسسة إلى تقديم حلول مبتكرة تهدف إلى تحسين جودة الحياة وتحقيق التقدم الاجتماعي والاقتصادي.



            ' }}
        </p>

        <a href="{{ route('about') }}" class="btn-about btn" style="border: none;
                    border-radius: 30px;
                    color: white;
                    padding: 5px 40px 10px 40px;
                    font-size: 18px;">اطّلع أكثر..</a>
    </div>


</div>

<div style="height: 70px"></div>

<div style="text-align: center;">
    <h3>مجالات عملنا</h3><br>
</div>

<section class="tabs-container" style="margin: auto">
    <div class="taab" data-tab="All">
        <i class="fas fa-globe" style="margin-left: 5px"></i> المشاريع
    </div>
    @foreach ($categories->take(5) as $category)
        <div class="taab" data-tab="{{ $category->name }}">
            <i class="{{ app(\App\Http\Controllers\WorkFieldController::class)->getCategoryIcon($category->name) }}" style="margin-left: 5px"></i>{{ $category->name }}
        </div>
    @endforeach
</section>

<div class="tab-section bg-light py-4">
    <div class="container">
        <div class="row">
            @foreach ($workFields as $field)
                <div class="col-md-4 col-lg-4 mb-4 tab-content" data-content="{{ $field->category->name }}">
                    <div class="donation-row h-100">
                        <div class="donation-card">
                            <img src="{{ asset($field->cover_image) }}" class="card-img-top" alt="{{ $field->name }}">
                            <a href="{{ route('work_fields.show', $field->id) }}" style="color:#000">
                                <h3>{{ Str::limit($field->name, 25) }}</h3>
                                <p>{{ Str::limit($field->description, 50) }}</p>
                                <button class="" style="border:none;
                        /* border: #a6ce70 solid 1px; */
    border-radius: 30px;
    color: white;
    padding: 5px 40px 8px 40px;
    font-size: 18px;
    width: max-content;
    background-color: none">استطلاع</button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center">
            <a href="{{ route('all-category') }}" class="btn btn-secondary more-projects-btn" style="    border: none;
    border-radius: 30px;
    color: white;
    padding: 7px 40px 8px 40px;
    font-size: 18px;
        width: auto;
    ">مزيد من المشاريع</a>
        </div>
    </div>
</div>












<div class="container-xl">

    <div class="row gy-4">

        <div class="col-lg-12">












        </div>


    </div>

</div>



<div style="background-image: url('images/لقطة الشاشة 2024-10-08 204001.png'); background-size: cover; background-position: center; min-height: 700px; position: relative; z-index: 1;">
    <div style="height: 50px"></div>

    <div style="text-align: center;">
        <h3>أحدث الأخبار</h3><br>
    </div>
    <div class="container" style="padding: 20px; background-color: white; position: relative; z-index: 2; padding-bottom: 0;">
        <div class="padding-30 rounded bordered" style="padding: 20px;">
            <div class="row gy-5">
                @if($news->count() > 0)
                <div class="col-sm-6">
                    <!-- post large -->
                    <div class="post" style="margin-top: 20px;">
                        <div class="thumb rounded" style="position: relative; z-index: 3;">
                            <a href="category.html" class="category-badge position-absolute">خبر الأسبوع</a>
                            <span class="post-format">
                                <i class="fa-regular fa-image"></i>
                            </span>
                            <a href="#">
                                <div class="inner">
                                    <img src="{{ asset($news[0]->cover_image) }}" alt="{{ $news[0]->title }}" style="width: 100%; height: 300px;">
                                </div>
                            </a>
                        </div>
                        <ul class="meta list-inline mt-4 mb-0">
                            <li class="list-inline-item"><a href="#">مؤسسة رواسخ</a></li>
                            <li class="list-inline-item">{{ $news[0]->created_at->format('d M Y') }}</li>
                        </ul>
                        <h5 class="post-title mb-3 mt-3"><a href="{{ route('news.details', ['news' => $news[0]->id]) }}">{{ Str::limit($news[0]->title, 50) }}</a></h5>
                        <p class="excerpt mb-0">{{ Str::limit($news[0]->content, 150) }}</p>
                    </div>
                </div>

                <div class="col-sm-6">
                    @foreach($news->slice(1) as $article)
                    <div class="post post-list-sm square before-seperator">
                        <div class="thumb rounded">
                            <a href="#">
                                <div class="inner">
                                    <img src="{{ asset( $article->cover_image) }}" alt="{{ $article->title }}" style="width: 100%; height: 80px;">
                                </div>
                            </a>
                        </div>
                        <div class="details clearfix">
                            <h6 class="post-title my-0"><a href="{{ route('news.details', ['news' => $article->id]) }}">{{ Str::limit($article->title, 50) }}</a></h6>
                            <ul class="meta list-inline mt-1 mb-0">
                                <li class="list-inline-item">{{ $article->created_at->format('d M Y') }}</li>
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>

                @endif
            </div>
        </div>
    </div>
</div>



<div class="stats-section container-fluid particles-js" id="particles-js" style="padding: 0;">
    <div class="background-image"></div>
    <h2 style="color: #fff; text-align: center;">رواسخ في ارقام</h2>
    <div class="stats-content row p-3 m-0" style="height: max-content;">
        <div class="stat-item col-lg-4 col-12 text-center">
            <div class="stat-number" data-target="{{ $settings['beneficiaries_count'] ?? 0 }}">0</div>
            <div>عدد المستفيدين</div>
        </div>
        <div class="stat-item col-lg-4 col-12 text-center">
            <div class="stat-number" data-target="{{ $settings['projects_count'] ?? 0 }}">0</div>
            <div>المشاريع المنفذة</div>
        </div>
        <div class="stat-item col-lg-4 col-12 text-center">
            <div class="stat-number" data-target="{{ $settings['volunteers_count'] ?? 0}}">0</div>
            <div>عدد المتطوعين</div>
        </div>
    </div>
</div>



<div style="height: 30px"></div>


<div style="text-align: center;">
    <h3 style="text-align:center;">شركاؤنا</h3>
    <br>
</div>

<div class="partners-logos" style="margin-bottom:100px; text-align:center;">
    @foreach ($partners as $partner)
    <img src="{{ asset($partner->logo) }}" alt="{{ $partner->name }}" style="max-width: 150px;">
    @endforeach
</div>


@endsection


@section('script')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.taab');
    const tabContents = document.querySelectorAll('.tab-content');

    function showProjects(tabName) {
        tabContents.forEach(content => {
            if (tabName === 'All' || content.dataset.content === tabName) {
                content.style.display = 'block';
            } else {
                content.style.display = 'none';
            }
        });
    }

    showProjects('All');
    tabs[0].classList.add('active');

    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const tabName = this.dataset.tab;

            tabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');

            showProjects(tabName);
        });
    });
});


</script>



@endsection
