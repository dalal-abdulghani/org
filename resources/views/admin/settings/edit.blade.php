@extends('theme.default')

@section('head')
<link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
تعديل الاعدادات
@endsection

@section('content')

<form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="site_name">اسم الموقع:</label>
        <input type="text" id="site_name" name="site_name" class="form-control" value="{{ $settings['site_name'] ?? '' }}">
    </div>

    <div class="form-group">
        <label for="site_logo">شعار الموقع:</label>
        <input type="file" id="site_logo" name="site_logo" class="form-control">
        @if(isset($settings['site_logo']))
            <img src="{{ asset($settings['site_logo']) }}" alt="شعار الموقع" width="200" class="img-fluid mt-2">
        @endif
    </div>

    <div class="form-group">
        <label for="site_description">نبذة عن الموقع:</label>
        <textarea id="site_description" name="site_description" class="form-control">{{ $settings['site_description'] ?? '' }}</textarea>
    </div>

    <div class="form-group">
        <label for="beneficiaries_count">عدد المستفيدين:</label>
        <input type="number" id="beneficiaries_count" name="beneficiaries_count" class="form-control" value="{{ $settings['beneficiaries_count'] ?? '' }}">
    </div>

    <div class="form-group">
        <label for="volunteers_count">عدد المتطوعين:</label>
        <input type="number" id="volunteers_count" name="volunteers_count" class="form-control" value="{{ $settings['volunteers_count'] ?? '' }}">
    </div>

    <div class="form-group">
        <label for="projects_count">عدد المشاريع المنفذة:</label>
        <input type="number" id="projects_count" name="projects_count" class="form-control" value="{{ $settings['projects_count'] ?? '' }}">
    </div>

    <div class="form-group">
        <label for="intro_video">رابط الفيديو التعريفي (يوتيوب):</label>
        <input type="url" id="intro_video" name="intro_video" class="form-control" value="{{ $settings['intro_video'] ?? '' }}" placeholder="https://www.youtube.com/watch?v=your_video_id">
        @if(isset($settings['intro_video']))
            <iframe width="200" height="150" src="{{ str_replace('watch?v=', 'embed/', $settings['intro_video']) }}" frameborder="0" allowfullscreen></iframe>
        @endif
    </div>

    <h5>أرقام التواصل:</h5>
    <div class="form-group">
        <label for="contact_number">رقم التواصل:</label>
        <input type="text" id="contact_number" name="contact_number" class="form-control" value="{{ $settings['contact_number'] ?? '' }}">
    </div>

    <h5>حسابات مواقع التواصل الاجتماعي:</h5>
    <div class="form-group">
        <label for="facebook">فيسبوك:</label>
        <input type="text" id="facebook" name="facebook" class="form-control" value="{{ $settings['facebook'] ?? '' }}">
    </div>
    <div class="form-group">
        <label for="twitter">تويتر:</label>
        <input type="text" id="twitter" name="twitter" class="form-control" value="{{ $settings['twitter'] ?? '' }}">
    </div>
    <div class="form-group">
        <label for="instagram">انستغرام:</label>
        <input type="text" id="instagram" name="instagram" class="form-control" value="{{ $settings['instagram'] ?? '' }}">
    </div>
    <div class="form-group">
        <label for="linkedin">لينكد إن:</label>
        <input type="text" id="linkedin" name="linkedin" class="form-control" value="{{ $settings['linkedin'] ?? '' }}">
    </div>

    <button type="submit" class="btn btn-primary">حفظ الإعدادات</button>
</form>

@endsection

@section('script')
<!-- Page level plugins -->
<script src="{{ asset('theme/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#newstable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json"
            }
        });
    });
</script>
@endsection
