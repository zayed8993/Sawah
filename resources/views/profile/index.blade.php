@extends('layout')

@section('content')
<div class="container">

    {{-- بيانات المستخدم --}}
    <div class="card mb-4">
        <div class="card-header">
            <h4>ملفي الشخصي</h4>
        </div>
        <div class="card-body">
            <p><strong>الاسم:</strong> {{ $user->name }}</p>
            <p><strong>البريد الإلكتروني:</strong> {{ $user->email }}</p>
            <a href="{{ route('profile.edit') }}" class="btn btn-primary">تعديل الملف الشخصي</a>
        </div>
    </div>

    {{-- الحجوزات --}}
    <div class="card">
        <div class="card-header">
            <h4>رحلاتي المحجوزة</h4>
        </div>
        <div class="card-body">
            @if($bookings->count() > 0)
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>الرحلة</th>
                            <th>الموقع</th>
                            <th>السعر</th>
                            <th>التاريخ</th>
                            <th>ملاحظات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                            <tr>
                                <td>{{ $booking->trip->title ?? '-' }}</td>
                                <td>{{ $booking->trip->location ?? '-' }}</td>
                                <td>{{ $booking->trip->price ?? '-' }}</td>
                                <td>{{ $booking->trip->date ?? '-' }}</td>
                                <td>{{ $booking->notes ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-muted">لا توجد حجوزات حالياً.</p>
            @endif
        </div>
    </div>

</div>
@endsection
