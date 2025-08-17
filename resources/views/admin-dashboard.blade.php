@extends('layout')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">لوحة تحكم الأدمن</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h3>الطلبات</h3>
    @if($requests->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>الاسم</th>
                    <th>البريد الإلكتروني</th>
                    <th>الرحلة</th>
                    <th>ملاحظات</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($requests as $request)
                    <tr>
                        <td>{{ $request->name }}</td>
                        <td>{{ $request->email }}</td>
                        <td>{{ $request->trip->title ?? 'رحلة محذوفة' }}</td>
                        <td>{{ $request->notes ?? '-' }}</td>
                        <td>
                            <a href="{{ url('/delete-request/'.$request->id) }}" class="btn btn-danger btn-sm">حذف</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>لا توجد طلبات حتى الآن</p>
    @endif

    <hr>

    <h3>الاقتراحات</h3>
    @if($suggestions->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>الاسم</th>
                    <th>البريد الإلكتروني</th>
                    <th>المحتوى</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($suggestions as $sug)
                    <tr>
                        <td>{{ $sug->name }}</td>
                        <td>{{ $sug->email }}</td>
                        <td>{{ $sug->content }}</td>
                        <td>
                            <a href="{{ url('/admin/delete-suggestion/'.$sug->id) }}" class="btn btn-danger btn-sm">حذف</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>لا توجد اقتراحات حتى الآن</p>
    @endif
</div>
@endsection
