<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fourth Coffee - Find your balance in the Fourth Cup</title>
    <meta name="description" content="Fourth Coffee, kopi dari Pandaan, Malang. Lihat menu lengkap dan pesan lewat Instagram.">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Dela+Gothic+One&family=Playfair+Display:ital,wght@0,700;0,900;1,700;1,900&display=swap" rel="stylesheet">
    <link href="{{ asset('css/fourth-landing.css') }}" rel="stylesheet">
</head>

@php
    $instagram = 'https://www.instagram.com/fou4rth.coffee/';
    $rupiah = fn ($value) => 'Rp' . number_format($value, 0, ',', '.');
@endphp

<body>
    {{-- ===== Navigasi ===== --}}
    <header class="nav" id="nav">
        <div class="wrap nav-in">
            <a class="nav-logo" href="{{ route('landing') }}" aria-label="Fourth Coffee, beranda">
                <img src="{{ asset('asset/img/fourth-wordmark-red.png') }}" alt="Fourth">
            </a>
            <button class="nav-toggle" type="button" aria-label="Buka menu navigasi" aria-expanded="false" aria-controls="nav-links"><span></span></button>
            <nav class="nav-links" id="nav-links" aria-label="Navigasi utama">
                <a href="#baru">Baru</a>
                <a href="#menu">Menu</a>
                <a href="#kontak">Lokasi</a>
                <div class="nav-auth">
                    @auth
                    <a class="btn btn-red btn-sm" href="{{ route('home') }}">Dashboard</a>
                    @endauth
                    @guest
                    <a class="btn btn-line btn-sm" href="{{ route('login') }}">Masuk</a>
                    <a class="btn btn-red btn-sm" href="{{ route('register') }}">Daftar</a>
                    @endguest
                </div>
            </nav>
        </div>
    </header>

    <main>
        {{-- ===== Hero ===== --}}
        <section class="hero on-red">
            <div class="wrap">
                <h1 class="hero-logo">
                    <img src="{{ asset('asset/img/fourth-wordmark-white.png') }}" alt="Fourth Coffee" width="1803" height="336">
                </h1>
                <p class="hero-tag">Find your balance in the Fourth Cup!!</p>
                <p class="hero-sub">Kopi dari Pandaan, Malang. Pilih menunya, lalu pesan lewat Instagram.</p>
                <div class="hero-cta">
                    <a class="btn btn-cream" href="#menu">Lihat menu</a>
                    <a class="btn btn-ghost" href="{{ $instagram }}" target="_blank" rel="noopener">Pesan lewat Instagram</a>
                </div>

                <dl class="hero-facts">
                    @if($minPrice)
                    <div>
                        <dt>Mulai dari</dt>
                        <dd>{{ $rupiah($minPrice) }}</dd>
                    </div>
                    @endif
                    <div>
                        <dt>Cara pesan</dt>
                        <dd>Pre-order Instagram</dd>
                    </div>
                    <div>
                        <dt>Lokasi</dt>
                        <dd>Pandaan, Malang</dd>
                    </div>
                </dl>
            </div>
        </section>

        {{-- ===== Poster ajakan ===== --}}
        <section class="poster">
            <div class="wrap poster-in">
                <div>
                    <h2><em>Let's</em> have some <em>coffee with</em> Fourth!</h2>
                    <p>Satu gelas untuk memulai hari, satu lagi untuk menemani tugas yang belum selesai. Ambil dua, bawa teman.</p>
                </div>
                <div class="poster-art" aria-hidden="true">
                    <svg viewBox="0 0 420 380" fill="none" stroke="currentColor" stroke-width="7" stroke-linecap="round" stroke-linejoin="round">
                        {{-- uap --}}
                        <path d="M135 118c-22-24 20-40 0-68-15-21 14-36 8-50"/>
                        <path d="M200 124c-22-24 20-40 0-68"/>
                        {{-- tatakan --}}
                        <path d="M38 296c0-26 316-26 316 0 0 26-316 26-316 0Z" fill="#fffaf0"/>
                        {{-- cangkir besar --}}
                        <path d="M70 150h250c0 82-34 130-125 130S70 232 70 150Z" fill="#fffaf0"/>
                        <ellipse cx="195" cy="150" rx="125" ry="20"/>
                        <path d="M318 178c62-12 70 70 0 80"/>
                        <path d="M118 188c8 36 24 56 52 62" stroke-width="5"/>
                        {{-- cangkir kecil --}}
                        <path d="M300 300h90c0 34-14 58-45 58s-45-24-45-58Z" fill="#fffaf0"/>
                        <path d="M390 312c26-4 28 28 0 32"/>
                    </svg>
                    @if($minPrice)
                    <div class="sticker"><div><small>Mulai dari</small>{{ $rupiah($minPrice) }}</div></div>
                    @endif
                </div>
            </div>
        </section>

        {{-- ===== Baru di Fourth (6 barang terbaru) ===== --}}
        <section class="fresh" id="baru">
            <div class="wrap">
                <div class="sec-head">
                    <h2>Baru di Fourth</h2>
                    <p>Enam menu yang terakhir ditambahkan.</p>
                </div>
                <div class="grid">
                    @forelse($items as $item)
                    <figure class="tile {{ $item->stock <= 0 ? 'is-out' : '' }}" style="margin:0">
                        @if($item->photo)
                        <img class="tile-photo" src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->name }}" loading="lazy">
                        @else
                        <img class="tile-mark" src="{{ asset('asset/img/fourth-wordmark-white.png') }}" alt="">
                        @endif
                        <figcaption>
                            <b>{{ $item->name }}</b>
                            <span>{{ $rupiah($item->price) }}</span>
                        </figcaption>
                    </figure>
                    @empty
                    <p class="grid-empty">Belum ada menu yang ditambahkan. Cek lagi sebentar lagi.</p>
                    @endforelse
                </div>
            </div>
        </section>

        {{-- ===== Menu lengkap (dari data barang) ===== --}}
        <section class="menu" id="menu">
            <div class="wrap">
                <div class="menu-head">
                    <h2>Menu</h2>
                    <p>Pilih kategori untuk menyaring daftar.</p>
                </div>

                @if($categories->isNotEmpty())
                <div class="chips" role="group" aria-label="Filter kategori">
                    <button type="button" class="chip" data-filter="all" aria-pressed="true">Semua</button>
                    @foreach($categories as $category)
                    <button type="button" class="chip" data-filter="cat-{{ $category->id }}" aria-pressed="false">{{ $category->name }}</button>
                    @endforeach
                </div>

                <div class="menu-card">
                    @foreach($categories as $category)
                    <section class="menu-group" data-group="cat-{{ $category->id }}">
                        <h3>{{ $category->name }}</h3>
                        <ul class="menu-list">
                            @foreach($category->items as $item)
                            <li class="menu-item {{ $item->stock <= 0 ? 'is-out' : '' }}">
                                <div class="menu-thumb">
                                    @if($item->photo)
                                    <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->name }}" loading="lazy">
                                    @else
                                    <img class="mark" src="{{ asset('asset/img/fourth-wordmark-red.png') }}" alt="">
                                    @endif
                                </div>
                                <div>
                                    <h4 class="menu-name">{{ $item->name }}@if($item->stock <= 0)<span class="menu-out">Habis</span>@endif</h4>
                                    @if($item->description)
                                    <p class="menu-desc">{{ $item->description }}</p>
                                    @endif
                                </div>
                                <div class="menu-price">{{ $rupiah($item->price) }}</div>
                            </li>
                            @endforeach
                        </ul>
                    </section>
                    @endforeach
                </div>
                @else
                <p class="menu-empty">Menu belum tersedia. Kami sedang menyiapkannya.</p>
                @endif
            </div>
        </section>

        {{-- ===== Lokasi & kontak ===== --}}
        <section class="visit on-maroon" id="kontak">
            <div class="wrap">
                <h2>Temukan Fourth</h2>
                <div class="visit-cols">
                    <div>
                        <h3>Lokasi</h3>
                        <p>Pandaan, Malang</p>
                    </div>
                    <div>
                        <h3>Cara pesan</h3>
                        <p>Pre-order lewat Instagram @fou4rth.coffee</p>
                    </div>
                </div>
                <a class="btn btn-cream" href="{{ $instagram }}" target="_blank" rel="noopener">Buka Instagram kami</a>

                <div class="foot">
                    <img src="{{ asset('asset/img/fourth-wordmark-white.png') }}" alt="Fourth Coffee">
                    <small>&copy; {{ date('Y') }} Fourth Coffee. Semua hak dilindungi.</small>
                </div>
            </div>
        </section>
    </main>

    <script>
        (function () {
            // Menu navigasi di layar kecil
            var nav = document.getElementById('nav');
            var toggle = nav.querySelector('.nav-toggle');
            toggle.addEventListener('click', function () {
                var open = nav.classList.toggle('open');
                toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
            });
            nav.querySelectorAll('.nav-links a').forEach(function (a) {
                a.addEventListener('click', function () {
                    nav.classList.remove('open');
                    toggle.setAttribute('aria-expanded', 'false');
                });
            });

            // Filter kategori pada section menu
            var chips = document.querySelectorAll('.chip');
            var groups = document.querySelectorAll('.menu-group');
            chips.forEach(function (chip) {
                chip.addEventListener('click', function () {
                    var f = chip.getAttribute('data-filter');
                    chips.forEach(function (c) { c.setAttribute('aria-pressed', c === chip ? 'true' : 'false'); });
                    groups.forEach(function (g) {
                        g.hidden = !(f === 'all' || g.getAttribute('data-group') === f);
                    });
                });
            });
        })();
    </script>
</body>

</html>
