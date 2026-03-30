@extends('layouts.app')

@section('content')

{{-- LOGOUT BUTTON --}}
<div class="d-flex justify-content-end mb-3">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-outline-danger">Logout</button>
    </form>
</div>

{{-- HERO --}}
<div class="p-5 mb-4 bg-light rounded-3 text-center" 
     style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1507842217343-583bb7270b66'); background-size: cover; color: white;">
    <div class="container py-5">
        <h1 class="display-5 fw-bold">My Book Library</h1>
        <p class="fs-5">Temukan koleksi buku terbaik untuk kamu 📚</p>
        <a href="{{ route('books.index') }}" class="btn btn-primary btn-lg">Lihat Semua Buku</a>
    </div>
</div>

{{-- TITLE --}}
<h3 class="text-center mb-4">📖 Koleksi Buku Terbaru</h3>

{{-- CARD BOOK --}}
<div class="row">
    @foreach($books as $book)
    <div class="col-md-3 mb-4">
        <div class="card h-100 shadow-sm">

            {{-- GAMBAR --}}
            @if($book->gambar)
                <img src="{{ asset('storage/' . $book->gambar) }}" 
                     class="card-img-top" 
                     style="height:200px; object-fit:cover;">
            @else
                <img src="https://via.placeholder.com/200x200" 
                     class="card-img-top">
            @endif

            <div class="card-body text-center">
                <h5 class="card-title">{{ $book->judul }}</h5>
                <p class="text-muted">{{ $book->penulis }}</p>
                <span class="badge bg-info">{{ $book->tahun_terbit }}</span>
            </div>

        </div>
    </div>
    @endforeach
</div>

@endsection