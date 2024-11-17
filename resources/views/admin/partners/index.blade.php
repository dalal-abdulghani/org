@extends('theme.default')

@section('head')
<link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading', 'قائمة الشركاء')

@section('content')
<a href="{{ route('partners.create') }}" class="btn btn-primary mb-3">إضافة شريك جديد</a>

<table class="table table-bordered" id="newstable">
    <thead>
        <tr>
            <th>الاسم</th>
            <th>الشعار</th>
            <th>رابط الموقع</th>
            <th>خيارات</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($partners as $partner)
        <tr>
            <td>{{ $partner->name }}</td>
            <td><img src="{{ asset('storage/' . $partner->logo) }}" width="100" alt="Logo"></td>
            <td><a href="{{ $partner->website_link }}" target="_blank">{{ $partner->website_link }}</a></td>
            <td>
                <a href="{{ route('partners.edit', $partner->id) }}" class="btn btn-warning">تعديل</a>
                <form action="{{ route('partners.destroy', $partner->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">حذف</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
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
