@extends('layouts.main')

@section('head')

@section('title', $settings['site_name'] . ' - تسجيل الدخول ')

@endsection

@section('content')


<div class="form-container container">
    <div class="icon">
        <i class="fa-solid fa-user"></i>
    </div>
    <h2>تسجيل الدخول</h2>

    <form action="{{ route('login') }}" method="POST">
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-group">
            <label for="email"> <span>*</span> البريد الإلكتروني </label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="password"> <span>*</span> كلمة المرور </label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit">تسجيل الدخول</button>
    </form>

    <div class="signup-link">
        ليس لديك حساب؟ <a href="{{ route('register') }}">إنشاء حساب جديد</a>
    </div>
</div>

@endsection
