@extends('layouts.auth')

@section('title', 'Masuk')

@section('content')
<h1>Masuk</h1>
<p class="lead-sm">Selamat datang kembali. Masuk untuk membuka kasir.</p>

<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-group">
        <label for="email">Email</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="nama@email.com" autofocus>
        @error('email')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
    <div class="form-group">
        <label for="password">Kata sandi</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Kata sandi">
        @error('password')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary btn-block">Masuk</button>
</form>

<div class="auth-alt">
    @if (Route::has('password.request'))
    <a href="{{ route('password.request') }}">Lupa kata sandi?</a>
    @endif
    <a href="{{ route('register') }}">Buat akun</a>
</div>
@endsection
