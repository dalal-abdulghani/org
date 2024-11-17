@extends('theme.default')


@section('content')
    <h1>تعديل السلايد</h1>
    <form action="{{ route('slides.update', $slide->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="image"> صورة السلايد</label>
            <input type="file" name="image" class="form-control">
            <img src="{{ asset('storage/' . $slide->image) }}" alt="{{ $slide->title }}" width="100">
        </div>
        <div class="form-group">
            <label for="title">عنوان السلايد</label>
            <input type="text" name="title" class="form-control" value="{{ $slide->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">وصف السلايد</label>
            <textarea name="description" class="form-control">{{ $slide->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="button_text">نص الزر </label>
            <input type="text" name="button_text" class="form-control" value="{{ $slide->button_text }}">
        </div>
        <div class="form-group">
            <label for="button_link">رابط التوجيه </label>
            <input type="url" name="button_link" class="form-control" value="{{ $slide->button_link }}">
        </div>
        <button type="submit" class="btn btn-success"> تحديث</button>
    </form>
@endsection
