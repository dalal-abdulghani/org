@extends('theme.default')



@extends('theme.default')

@section('heading')
    عرض السلايد
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>{{ $slide->title }}</h3>
        </div>
        <div class="card-body">
            <img src="{{ asset('storage/' . $slide->image) }}" alt="{{ $slide->title }}" class="img-fluid">
            <p>{{ $slide->description }}</p>
            <a href="{{ $slide->button_link }}" class="btn btn-primary">{{ $slide->button_text }}</a>
        </div>
    </div>

    <a href="{{ route('admin.slides.index') }}" class="btn btn-secondary mt-3">العودة إلى القائمة</a>
@endsection

