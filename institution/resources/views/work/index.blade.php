@extends('layouts.main')

@section('title', $settings['site_name'] . ' - ' . 'مجالات عملنا')

@section('head')
@endsection

@section('content')
<div style="text-align: center;">
    <h2>{{ $work->name }}</h2>
</div>
<div>
    هنا صفحة المشاريع المتعلقة بمجال: {{ $work->name }}
</div>
@endsection
