@extends('theme.default')

@section('head')
<link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
عرض المشاريع
@endsection

@section('content')
<a class="btn btn-info" href="{{ route('work_fields.create') }}"><i class="fas fa-plus"></i> اضف مشروعًا جديدًا</a>
<hr>
<div class="row">
    <div class="col-md-12">
        <table id="newstable" class="table table-striped table-bordered text-right" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>اسم المشروع</th>
                    <th>الوصف</th>
                    <th>صورة المشروع</th>
                    <th>التصنيف</th>
                    <th>خيارات</th>
                </tr>
            </thead>

            <tbody>
                @foreach($work_fields as $item)
                    <tr>
                        <td><a href="{{ route('work_fields.show', $item) }}">{{ $item->name }}</a></td>
                        <td>{{ $item->description }}</td>
                        <td><img src="{{ asset($item->cover_image) }}" alt="صورة المشروع" width="100"></td>
                        <td>{{ $item->category->name }}</td> <!-- عرض اسم التصنيف -->
                        <td>
                            <a class="btn btn-info btn-sm mb-2" href="{{ route('work_fields.edit', $item) }}"><i class="fa fa-edit"></i> تعديل</a>
                            <form method="POST" action="{{ route('work_fields.destroy', $item) }}" class="d-inline-block">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد؟')"><i class="fa fa-trash"></i> حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
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
