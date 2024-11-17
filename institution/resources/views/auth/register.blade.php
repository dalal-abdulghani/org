@extends('layouts.main')

@section('head')

@section('title', $settings['site_name'] . ' - انشاء حساب  ')

@endsection




@section('content')

<div class="form-container container">
    <div class="icon">
        <i class="fa-solid fa-user-plus"></i>
    </div>
    <h2>حساب جديد</h2>

    <form action="{{ route('register') }}" method="POST">
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
            <label for="name"> <span>*</span> الاسم</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="email"> <span>*</span> البريد الإلكتروني </label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="password"> <span>*</span> كلمة المرور </label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation"> <span>*</span> تأكيد كلمة المرور </label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <button type="submit">إنشاء الحساب</button>
    </form>

    <div class="login-link">
        هل لديك حساب؟ <a href="{{ route('login') }}">تسجيل الدخول</a>
    </div>
</div>

@endsection
