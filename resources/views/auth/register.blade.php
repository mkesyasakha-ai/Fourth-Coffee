@extends('layouts.auth')

@section('title', 'Daftar')

@section('content')
<h1>Buat akun</h1>
<p class="lead-sm">Isi data di bawah untuk mulai memakai kasir.</p>

<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="form-group">
        <label for="name">Nama lengkap</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama lengkap" value="{{ old('name') }}" autocomplete="name">
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="nama@email.com" value="{{ old('email') }}" autocomplete="email">
        @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="phone">Nomor telepon</label>
        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="08xxxxxxxxxx" value="{{ old('phone') }}" autocomplete="tel">
        @error('phone')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="password">Kata sandi</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Kata sandi" autocomplete="new-password">
        @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="password-confirm">Ulangi kata sandi</label>
        <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Ulangi kata sandi" autocomplete="new-password">
    </div>
    <button type="submit" class="btn btn-primary btn-block">Daftar</button>
</form>

<div class="auth-alt">
    <span>Sudah punya akun?</span>
    <a href="{{ route('login') }}">Masuk</a>
</div>
@endsection
