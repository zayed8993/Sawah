@extends('layout')

@section('content')
<h1 class="mb-4">جميع الرحلات</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('trips.create') }}" class="btn btn-primary mb-3">+ إضافة رحلة جديدة</a>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Location</th>
            <th>Price</th>
            <th>Date</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($trips as $trip)
            <tr>
                <td>{{ $trip->id }}</td>
                <td>{{ $trip->title }}</td>
                <td>{{ $trip->location }}</td>
                <td>{{ $trip->price }}</td>
                <td>{{ $trip->date }}</td>
                <td>
                    @if($trip->image)
                        <img src="{{ asset('storage/' . $trip->image) }}" width="100" alt="{{ $trip->title }}">
                    @endif
                </td>
                <td>
                    <a href="{{ route('trips.edit', $trip) }}" class="btn btn-warning btn-sm">تعديل</a>
                    <form action="{{ route('trips.destroy', $trip) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد؟')">حذف</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
