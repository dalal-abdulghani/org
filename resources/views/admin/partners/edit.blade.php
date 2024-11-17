@extends('theme.default')

@section('heading')
  تعديل بيانات الشريك
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="card mb-4 col-md-8">
        <div class="card-header">
            عدل بيانات الشريك
        </div>
        <div class="card-body">
            <form action="{{ route('partners.update', $partner->id) }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">اسم الشريك </label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $partner->name }}" autocomplete="name" required>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="logo" class="col-md-4 col-form-label text-md-right">شعار الشريك </label>

                    <div class="col-md-6">
                        <input id="logo" accept="image/*" type="file" onchange="readCoverImage(this);" class="form-control @error('logo') is-invalid @enderror" name="logo" autocomplete="logo">

                        @error('logo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <img id="cover-image-thumb" class="img-fluid img-thumbnail mt-2" src="{{ asset('storage/' . $partner->logo) }}" alt="صورة الشعار">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="website_link" class="col-md-4 col-form-label text-md-right">رابط موقع الشريك</label>

                    <div class="col-md-6">
                        <input id="website_link" type="url" class="form-control @error('website_link') is-invalid @enderror" name="website_link" value="{{ $partner->website_link }}" placeholder="https://example.com" autocomplete="website_link">

                        @error('website_link')
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
