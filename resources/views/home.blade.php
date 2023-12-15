<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('content')
        <!-- Headline Artikel -->
        <div class="row">
            <div class="article">
            <div class="col-6">
                <h2 class="mt-2">Judul Artikel Headline</h2>
                <p>Ringkasan artikel headline...</p>
</div>
<div class="col-6">
                    <img src="https://via.placeholder.com/800x400" class="img-fluid" alt="Headline Artikel">
                </div>
            </div>
        </div>
    <!-- List Artikel Terbaru dan Terpopuler -->
    <div class="row">
        <!-- Artikel Terbaru -->
        <div class="col-md-6">
            <h3>Artikel Terbaru</h3>
            <div class="article">
                <img src="{{ asset('https://via.placeholder.com/400x200') }}" class="img-fluid" alt="Artikel Terbaru 1">
                <h4 class="mt-2">Judul Artikel Terbaru 1</h4>
            </div>
            <div class="article">
                <img src="{{ asset('https://via.placeholder.com/400x200') }}" class="img-fluid" alt="Artikel Terbaru 2">
                <h4 class="mt-2">Judul Artikel Terbaru 2</h4>
            </div>
        </div>

        <!-- Artikel Terpopuler -->
        <div class="col-md-6">
            <h3>Artikel Terpopuler</h3>
            <div class="article">
                <img src="{{ asset('https://via.placeholder.com/400x200') }}" class="img-fluid" alt="Artikel Terpopuler 1">
                <h4 class="mt-2">Judul Artikel Terpopuler 1</h4>
            </div>
            <div class="article">
                <img src="{{ asset('https://via.placeholder.com/400x200') }}" class="img-fluid" alt="Artikel Terpopuler 2">
                <h4 class="mt-2">Judul Artikel Terpopuler 2</h4>
            </div>
        </div>
    </div>
@endsection
