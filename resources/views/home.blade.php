<!-- resources/views/home.blade.php -->
@extends('layouts.app')
{{-- @dd($posts, $popularPosts, $newPosts[0]["title"]) --}}
@section('content')
    <!-- Headline Artikel -->
    <div class="article">
        <a href="post/{{ $newPosts[0]['slug'] }}" class="article-link">
        <div class="row">
                <div class="col-6">
                    <h2 class="mt-2">{{ $newPosts[0]['title'] }}</h2>
                    <p>{!! Str::limit($newPosts[0]['body'], 150, '...') !!}</p>
                </div>
                <div class="col-6">
                    <img src="https://via.placeholder.com/800x400" class="img-fluid" alt="Headline Artikel">
                </div>
            </div>
        </a>
    </div>
    <!-- List Artikel Terbaru dan Terpopuler -->
    <div class="row">
        <!-- Artikel Terbaru -->
        <div class="col-md-9">
            <div class="article">
                @foreach ($posts as $post)
                <a href="post/{{ $post['slug'] }}" class="article-link">
                    <div class="row">
                        <div class="col-4">
                            <img src="https://via.placeholder.com/400x200" class="img-fluid"
                                alt="Artikel Terbaru 1">
                        </div>
                        <div class="col-8">
                            <h4 class="mt-2"> {{$post["title"]}} </h4>
                            <p>{!! Str::limit($post['body'], 150, '...') !!}</p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>

        <!-- Artikel Terpopuler -->
        <div class="col-md-3">
            <div class="article">
                <h3 class="popular">Terpopuler</h3>
                @foreach ($popularPosts as $post)
                    <a href="post/{{ $post['slug'] }}" class="article-link side-item">
                        {{ $post['title'] }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
