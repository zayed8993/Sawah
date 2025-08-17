@extends('layout')

@section('content')
<h1 class="mb-4">إضافة رحلة جديدة</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('trips.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">عنوان الرحلة</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">الموقع</label>
        <input type="text" name="location" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">الوصف</label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">السعر</label>
        <input type="number" name="price" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">التاريخ</label>
        <input type="date" name="date" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">الصورة</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">إنشاء الرحلة</button>
</form>
@endsection
