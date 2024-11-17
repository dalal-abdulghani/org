@extends('theme.default')

@section('heading')
إضافة شريك جديد
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="card mb-4 col-md-8">
        <div class="card-header">
            أضف شريكًا جديدًا
        </div>
        <div class="card-body">
            <form action="{{ route('partners.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">اسم الشريك</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="logo" class="col-md-4 col-form-label text-md-right">شعار الشريك</label>

                    <div class="col-md-6">
                        <input id="logo" accept="image/*" type="file" onchange="readLogoImage(this);" class="form-control @error('logo') is-invalid @enderror" name="logo" value="{{ old('logo') }}" autocomplete="logo">

                        @error('logo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <img id="logo-image-thumb" class="img-fluid img-thumbnail" src="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="website_link" class="col-md-4 col-form-label text-md-right">رابط موقع الشريك</label>

                    <div class="col-md-6">
                        <input id="website_link" type="url" class="form-control @error('website_link') is-invalid @enderror" name="website_link" value="{{ old('website_link') }}" placeholder="https://example.com" autocomplete="website_link">

                        @error('website_link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-primary">أضف</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function readLogoImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#logo-image-thumb')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
