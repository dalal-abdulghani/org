@extends('theme.default')

@section('heading')
    عرض تفاصيل الخبر
@endsection

@section('head')
    <style>
        table {
            table-layout: fixed;
        }

        table tr th {
            width: 30%;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">عرض تفاصيل الخبر</div>

                    <div class="card-body">
                        <table class="table table-stribed">
                            <tr>
                                <th>العنوان</th>
                                <td class="lead"><b>{{ $news->title }}</b></td>
                            </tr>

                            <tr>
                                <th>صورة الخبر</th>
                                <td><img class="img-fluid img-thumbnail"
                                        src="{{ asset('storage/' . $news->cover_image) }}"></td>
                            </tr>
                          

                            @if ($news->content)
                                <tr>
                                    <th>الوصف</th>
                                    <td>{{ $news->content }}</td>
                                </tr>
                            @endif


                            @if ($news->tags)
                                <tr>
                                    <th>الوسوم</th>
                                    <td>
                                        <td>{{ $news->tags }}</td>
                                    </td>
                                </tr>
                            @endif




                        </table>
                        <a class="btn btn-info btn-sm" href="{{ route('news.edit', $news) }}"><i
                                class="fa fa-edit"></i> تعديل</a>
                        <form method="POST" action="{{ route('news.destroy', $news) }}" class="d-inline-block">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('هل أنت متأكد؟')"><i class="fa fa-trash"></i> حذف</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
