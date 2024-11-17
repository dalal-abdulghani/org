@extends('theme.default')

@section('heading')
  تعديل بيانات الخبر
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="card mb-4 col-md-8">
        <div class="card-header">
                عدل بيانات الخبر
        </div>
        <div class="card-body">
            <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label text-md-right">عنوان الخبر</label>

                    <div class="col-md-6">
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $news->title }}" autocomplete="title" required>

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="content" class="col-md-4 col-form-label text-md-right">الوصف</label>

                    <div class="col-md-6">
                        <textarea id="content" class="form-control @error('content') is-invalid @enderror" name="content" autocomplete="content" required>{{ $news->content }}</textarea>

                        @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="cover_image" class="col-md-4 col-form-label text-md-right">صورة الخبر</label>

                    <div class="col-md-6">
                        <input id="cover_image" accept="image/*" type="file" onchange="readCoverImage(this);" class="form-control @error('cover_image') is-invalid @enderror" name="cover_image" autocomplete="cover_image">

                        @error('cover_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <img id="cover-image-thumb" class="img-fluid img-thumbnail mt-2" src="{{ asset('storage/' . $news->cover_image) }}" alt="صورة الغلاف">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tags" class="col-md-4 col-form-label text-md-right">الوسوم</label>

                    <div class="col-md-6">
                        <input id="tags" type="text" class="form-control @error('tags') is-invalid @enderror" name="tags" value="{{ $news->tags }}" placeholder="أضف الوسوم (افصل بين الوسوم بفاصلة)" autocomplete="tags">

                        @error('tags')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">تعديل</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function readCoverImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('cover-image-thumb').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
