<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سواح</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Tahoma, sans-serif;
        }
        footer {
            background-color: #343a40;
            color: white;
            padding: 15px 0;
            text-align: center;
            margin-top: 40px;
        }
    </style>
</head>
<body>

    <!-- شريط التنقل -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">سواح</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item"><a class="nav-link" href="/">الرئيسية</a></li>
                <li class="nav-item"><a class="nav-link" href="/trips">الرحلات</a></li>
                <!-- <li class="nav-item"><a class="nav-link" href="/suggestions">اقتراحات</a></li> -->

                @auth
                    @if(Auth::user()->is_admin)
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">لوحة التحكم</a></li>
                        @else
                        <li class="nav-item"><a class="nav-link" href="/suggestions">اقتراحات</a></li>
                        @endif
                    <li class="nav-item"><a class="nav-link" href="{{ route('profile') }}">الملف الشخصي</a></li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link" style="display:inline; padding:0;">
                                        <i class="fas fa-sign-out-alt"></i> 
                            </button>

                        </form>
                    </li>
                @endauth

                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">تسجيل الدخول</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">إنشاء حساب</a></li>
                @endguest

            </ul>
        </div>
    </div>
</nav>


    <!-- محتوى الصفحات -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- الفوتر -->
    <footer>
        <p>© 2025 جميع الحقوق محفوظة - سواح</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
