@extends('theme.default')

@section('heading')
    عرض تفاصيل الشريك
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
                    <div class="card-header">عرض تفاصيل الشريك</div>

                    <div class="card-body">
                        <table class="table table-stribed">
                            <tr>
                                <th>الاسم</th>
                                <td class="lead"><b>{{ $partners->name }}</b></td>
                            </tr>

                            <tr>
                                <th> الشعار</th>
                                <td><img class="img-fluid img-thumbnail"
                                        src="{{ asset('storage/' . $partners->logo) }}"></td>
                            </tr>





                            @if ($partners->website_link)
                                <tr>
                                    <th>رابط موقعه</th>
                                    <td>
                                        <td>{{ $partners->website_link }}</td>
                                    </td>
                                </tr>
                            @endif




                        </table>
                        <a class="btn btn-info btn-sm" href="{{ route('partners.edit', $news) }}"><i
                                class="fa fa-edit"></i> تعديل</a>
                        <form method="POST" action="{{ route('partners.destroy', $news) }}" class="d-inline-block">
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
