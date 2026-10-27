@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">

    <p class="f-hello">Halo, {{ Auth::user()->name }}</p>
    <h1 class="f-title">Ringkasan Fourth hari ini</h1>

    <div class="f-tiles">
        <a class="f-tile f-tile--red" href="{{ route('items.index') }}">
            <span class="f-tile-label">Barang</span>
            <span class="f-tile-num">{{ $items }}</span>
            <span class="f-tile-go">Kelola barang</span>
        </a>

        <a class="f-tile" @hasrole('admin') href="{{ route('users.index') }}" @endhasrole>
            <span class="f-tile-label">Pelanggan</span>
            <span class="f-tile-num">{{ $customers }}</span>
            @hasrole('admin')<span class="f-tile-go">Lihat pelanggan</span>@endhasrole
        </a>

        <a class="f-tile f-tile--paper" @hasrole('admin') href="{{ route('categories.index') }}" @endhasrole>
            <span class="f-tile-label">Kategori</span>
            <span class="f-tile-num">{{ $categories }}</span>
            @hasrole('admin')<span class="f-tile-go">Kelola kategori</span>@endhasrole
        </a>

        <a class="f-tile f-tile--maroon" @hasrole('admin') href="{{ route('discounts.index') }}" @endhasrole>
            <span class="f-tile-label">Diskon</span>
            <span class="f-tile-num">{{ $discounts }}</span>
            @hasrole('admin')<span class="f-tile-go">Kelola diskon</span>@endhasrole
        </a>
    </div>

</div>
@endsection
