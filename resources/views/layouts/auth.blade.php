<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') - Fourth Coffee</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Dela+Gothic+One&family=Playfair+Display:ital,wght@1,700;1,900&display=swap" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fourth.css') }}" rel="stylesheet">
</head>

<body class="auth-body">
    <div class="auth">
        <aside class="auth-side">
            <a href="{{ route('landing') }}" aria-label="Fourth Coffee, beranda">
                <img src="{{ asset('asset/img/fourth-wordmark-white.png') }}" alt="Fourth Coffee">
            </a>
            <p class="auth-tag">Find your balance in the Fourth Cup!!</p>
            <p class="auth-note">Kasir Fourth Coffee: barang, diskon, dan transaksi di satu tempat.</p>
        </aside>

        <main class="auth-main">
            <div class="auth-card">
                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>
