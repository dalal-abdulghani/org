@extends('theme.default')

@section('content')

    <h1>اضف سلايد جديد  </h1>
    <form action="{{ route('slides.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">صورة السلايد </label>
            <input type="file" name="image" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="title">العنوان</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">الوصف</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="button_text">نص الزر </label>
            <input type="text" name="button_text" class="form-control">
        </div>
        <div class="form-group">
            <label for="button_link">رابط التوجيه </label>
            <input type="url" name="button_link" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Create Slide</button>
    </form>
@endsection
