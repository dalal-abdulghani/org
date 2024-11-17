@extends('theme.default')


@section('head')
<link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
عرض السلايدات
@endsection



@section('content')
    <h1>السلايدات</h1>
    <a href="{{ route('slides.create') }}" class="btn btn-primary mb-3">اضف سلايد جديد  </a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>صورة السلايد</th>
                <th>عنوان السلايد</th>
                <th>وصف السلايد</th>
                <th>نص الزر </th>
                <th>رابط التوجيه </th>
                <th>الاجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($slides as $slide)
                <tr>
                    <td><img src="{{ asset('storage/' . $slide->image) }}" alt="{{ $slide->title }}" width="100"></td>
                    <td>{{ $slide->title }}</td>
                    <td>{{ $slide->description }}</td>
                    <td>{{ $slide->button_text }}</td>
                    <td>{{ $slide->button_link }}</td>
                    <td>
                        <a href="{{ route('slides.edit', $slide->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('slides.destroy', $slide->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

