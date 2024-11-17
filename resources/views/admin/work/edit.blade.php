@extends('theme.default')

@section('heading')
تعديل مجال العمل
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="card mb-4 col-md-8">
        <div class="card-header">
            تعديل مجال العمل
        </div>
        <div class="card-body">
            <form action="{{ route('work_fields.update', $workField->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">اسم المجال</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $workField->name }}" autocomplete="name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">الوصف</label>
                    <div class="col-md-6">
                        <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description">{{ $workField->description }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="cover_image" class="col-md-4 col-form-label text-md-right">صورة الغلاف</label>
                    <div class="col-md-6">
                        <input id="cover_image" type="file" class="form-control @error('cover_image') is-invalid @enderror" name="cover_image">
                        <img src="{{ asset('storage/' . $workField->cover_image) }}" alt="صورة الغلاف الحالية" width="100">
                        @error('cover_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="category_id" class="col-md-4 col-form-label text-md-right">التصنيف</label>
                    <div class="col-md-6">
                        <select id="category_id" class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if($category->id == $workField->category_id) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-primary">تحديث</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
