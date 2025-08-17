@extends('layout')

@section('content')
<h1 class="mb-4">تعديل الرحلة</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('trips.update', $trip) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">عنوان الرحلة</label>
        <input type="text" name="title" class="form-control" value="{{ $trip->title }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">الموقع</label>
        <input type="text" name="location" class="form-control" value="{{ $trip->location }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">الوصف</label>
        <textarea name="description" class="form-control">{{ $trip->description }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">السعر</label>
        <input type="number" name="price" class="form-control" value="{{ $trip->price }}">
    </div>

    <div class="mb-3">
        <label class="form-label">التاريخ</label>
        <input type="date" name="date" class="form-control" value="{{ $trip->date }}">
    </div>

    <div class="mb-3">
        <label class="form-label">الصورة</label>
        <input type="file" name="image" class="form-control">
        @if($trip->image)
            <img src="{{ asset('storage/' . $trip->image) }}" width="150" class="mt-2" alt="{{ $trip->title }}">
        @endif
    </div>

    <button type="submit" class="btn btn-success">تحديث الرحلة</button>
</form>
@endsection
