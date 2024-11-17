@extends('layouts.main')

@section('head')
<link rel="stylesheet" href="{{ asset('css/style2.css') }}">

@section('title', $settings['site_name'] . ' - مجالات العمل')

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
                <h1 class="mt-0 mb-2">مجالات العمل</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">مجالات العمل</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <section class="main-content">
        <div class="container-xl">
            <div class="row gy-4">
                <div class="col-lg-8">
                    <div class="row gy-4">
                        @foreach ($categories as $category)
                        <div class="col-sm-6">
                            <!-- post -->
                            <div class="post post-grid rounded bordered">
                                <div class="thumb top-rounded">
                                    <span class="post-format">
                                        <i class="{{app(\App\Http\Controllers\WorkFieldController::class)->getCategoryIcon($category->name)}}"></i>
                                    </span>
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="{{ asset( $category->cover_image) }}" alt="post-title" width="100%" height="100px"/>
                                        </div>
                                    </a>
                                </div>
                                <div class="details">

                                    <h5 class="post-title mb-3 mt-3"><a href="{{ route('work.category',  $category->id) }}">{{ Str::limit($category->name, 20) }}</a></h5>
                                    <p class="excerpt mb-0">
                                        {{Str::limit( $category->description, 50) }}
                                    </p>
                                </div>

                            </div>
                        </div>
                        @endforeach
                    </div>


                </div>

                <div class="col-lg-4">
                    <!-- sidebar -->
                    <div class="sidebar">
                        <!-- widget recently executed projects -->
                        <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">المشاريع المنفذة مؤخراً</h3>
                            </div>
                            <div class="widget-content">
                                @foreach ($recentProjects as $project)
                                <!-- post -->
                                <div class="post post-list-sm circle">
                                    <div class="thumb circle">
                                        <a href="{{ route('work.category', $project->id) }}">
                                            <div class="inner">
                                                <img src="{{ asset($project->cover_image) }}"
                                                    alt="{{ $project->title }}" width="50px" height="50px"
                                                    style="border-radius: 50%" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0">
                                            <a href="{{ route('work.category', $project->id) }}">{{ Str::limit($project->name, 25)
                                                }}</a>
                                        </h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">{{ $project->created_at->format('d F Y') }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- post -->
                                @endforeach
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
</div><!-- end site wrapper -->

@endsection
