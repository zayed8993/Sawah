@extends('layout')

@section('content')
<div class="d-flex justify-content-center">
    <div class="card shadow-sm p-4" style="width: 100%; max-width: 600px;">

        <h2 class="text-center mb-4">تعديل الملف الشخصي</h2>

        {{-- رسالة نجاح --}}
        @if(session('status') === 'profile-updated')
            <div class="alert alert-success text-center">
                تم تحديث الملف الشخصي بنجاح
            </div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')

            {{-- الاسم --}}
            <div class="mb-3">
                <label for="name" class="form-label">الاسم</label>
                <input type="text" id="name" name="name" class="form-control"
                       value="{{ old('name', $user->name) }}" required>
            </div>

            {{-- البريد الإلكتروني --}}
            <div class="mb-3">
                <label for="email" class="form-label">البريد الإلكتروني</label>
                <input type="email" id="email" name="email" class="form-control"
                       value="{{ old('email', $user->email) }}" required>
            </div>

            <hr class="my-4">

            <h5 class="mb-3">تغيير كلمة المرور (اختياري)</h5>

            {{-- كلمة المرور الحالية --}}
            <div class="mb-3">
                <label for="current_password" class="form-label">كلمة المرور الحالية</label>
                <input type="password" id="current_password" name="current_password" class="form-control">
            </div>

            {{-- كلمة المرور الجديدة --}}
            <div class="mb-3">
                <label for="password" class="form-label">كلمة المرور الجديدة</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>

            {{-- تأكيد كلمة المرور --}}
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">تأكيد كلمة المرور الجديدة</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
            </div>

            {{-- أزرار --}}
            <div class="text-center">
                <button type="submit" class="btn btn-success">حفظ التغييرات</button>
                <a href="{{ route('profile') }}" class="btn btn-secondary">إلغاء</a>
            </div>
        </form>

    </div>
</div>
@endsection
