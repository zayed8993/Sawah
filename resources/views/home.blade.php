@extends('layout') <!-- extend the main layout -->

@section('content')
<!-- بانر ترحيبي -->
<div class="p-5 mb-4 text-white rounded bg-dark text-center" style="background-image: url('{{ asset('image/banner.jpg') }}'); background-size: cover; background-position: center;">
    <h1 class="display-4 fw-bold">مرحباً بك في سواح</h1>
    <p class="lead">اكتشف أجمل الوجهات السياحية في السعودية بأسعار مميزة وخدمات ممتازة</p>
    <a href="/trips" class="btn btn-primary btn-lg">استعرض الرحلات</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="row">
    @foreach($trips as $trip)
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                @if($trip->image)
                    <img src="{{ $trip->image }}" class="card-img-top" alt="{{ $trip->title }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $trip->title }}</h5>
                    <p class="card-text">{{ $trip->description }}</p>
                    <p class="card-text"><strong>السعر:</strong> {{ $trip->price }} ريال</p>
                    <a href="/trip/{{ $trip->id }}" class="btn btn-primary">التفاصيل</a>
                    <a href="/request-trip/{{ $trip->id }}" class="btn btn-success">احجز الرحلة</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
<!-- <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form> -->
@endsection

