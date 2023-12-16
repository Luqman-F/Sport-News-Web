@extends('layouts.app')

@section('content')
    <div class="article">
        @foreach ($posts as $post)
            <a href="post/{{ $post['slug'] }}" class="article-link">
                <li class="row mx-2">
                    <h5>
                        {{ $post['title'] }}
                    </h5>
                    <p>
                        {{ Str::limit($post['body'], 200, '...') }}
                    </p>
                </li>
            </a>
        @endforeach
    </div>
@endsection
