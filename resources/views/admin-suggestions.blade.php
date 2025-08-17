@extends('layout')

@section('content')
<h1 class="mb-4">جميع الاقتراحات</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>الاسم</th>
            <th>البريد الإلكتروني</th>
            <th>الاقتراح</th>
            <th>الإجراءات</th>
        </tr>
    </thead>
    <tbody>
        @foreach($suggestions as $sug)
            <tr>
                <td>{{ $sug->id }}</td>
                <td>{{ $sug->name }}</td>
                <td>{{ $sug->email }}</td>
                <td>{{ $sug->content }}</td>
                <td>
                    <a href="{{ url('/delete-suggestion/' . $sug->id) }}" class="btn btn-danger btn-sm"
                        onclick="return confirm('هل أنت متأكد؟')">حذف</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
