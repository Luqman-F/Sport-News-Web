@extends('layouts.dashboard')

@section('sidebar')
    <a href="{{ route('journalist') }}">
        <div class="sidebar-item">Dashboard</div>
    </a>
    <a href="{{ route('journalist.posts') }}">
        <div class="sidebar-item">Articles</div>
    </a>
@endsection

@section('content')
    <div class="row p-4">
        <h1 class="h4">Welcome, {{ Auth::user()->name }}!</h1>
    </div>
    <div class="row gx-3">
        <div class="col-lg-3">
            <div class="card p-2 shadow">
                <h1 class="card-title fs-4 border-bottom border-4 border-success">Total Articles Posted</h1>
                <div class="card-body">
                    <span class="h2">{{ $data['postCount'] }}</span>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card p-2 shadow">
                <h1 class="card-title fs-4 border-bottom border-4 border-success">Average Post Views</h1>
                <div class="card-body">
                    <span class="h2">{{ $data['averagePostViews'] }}</span>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card p-2 shadow">
                <h1 class="card-title fs-4 border-bottom border-4 border-success">Recent Comments</h1>
                <div class="card-body">
                    @foreach ($data['recentComments'] as $comment)
                        @if (!$comment)
                            @continue
                        @endif
                        <div class="card article-comment-item">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-3">
                                    <div class="article-comment-item-info-name">
                                        <i class="fa-solid fa-user"></i>
                                        <span>{{ $comment->user->name }} at
                                            <a href="{{ route('post.show', $comment->post->slug) }}">
                                                {{ Str::limit($comment->post->title, 50, '...') }}
                                            </a>
                                        </span>
                                    </div>
                                    <div class="article-comment-item-info-date">
                                        <i class="fa-solid fa-calendar"></i>
                                        <span>{{ $comment->created_at }}</span>
                                    </div>
                                </div>
                                <div class="article-comment-item-body">
                                    <p>{!! $comment->body !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
