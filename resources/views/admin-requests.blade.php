@extends('layout')

@section('content')
<div class="text-center mb-5">
    <h1>طلبات الرحلات</h1>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th>الرقم</th>
            <th>اسم المستخدم</th>
            <th>البريد الإلكتروني</th>
            <th>ملاحظات</th>
            <th>الرحلة</th>
            <th>الإجراءات</th>
        </tr>
    </thead>
    <tbody>
        @foreach($requests as $request)
        <tr>
            <td>{{ $request->id }}</td>
            <td>{{ $request->name }}</td>
            <td>{{ $request->email }}</td>
            <td>{{ $request->notes }}</td>
            <td>{{ $request->trip->title ?? 'غير محددة' }}</td>
            <td>
                <a href="/delete-request/{{ $request->id }}" class="btn btn-danger btn-sm">حذف</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
