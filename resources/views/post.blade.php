@extends('layouts.app')

@section('content')
    <div class="article">
        <h1>{{ $post->title }}</h1>
        <div class="article-info">
            <div class="article-info-item">
                <i class="fa-solid fa-user"></i>
                <span>{{ $post->author->name }}</span>
            </div>
            <div class="article-info-item">
                <i class="fa-solid fa-calendar"></i>
                <span>{{ $post->created_at }}</span>
            </div>
            <div class="article-info-item">
                <i class="fa-solid fa-eye"></i>
                <span>{{ $post->views }}</span>
            </div>
        </div>
        <div class="article-body">
            {!! $post->body !!}
        </div>

        <div class="article-comment mt-4">
            <h3>Comments</h3>
            <div class="form-group col-lg-6">
            @auth
                <form action="{{ route('comment.store', $post->id) }}" method="post">
                    @csrf
                        <textarea required name="body" id="body" class="form-control" rows="10" placeholder="Write your comment here..."></textarea>
                    <button type="submit" class="btn btn-primary m-2">Submit</button>
                </form>
            @endauth
            @guest
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Login</strong> to comment
                </div>
            @endguest
            @foreach ($post->comments as $comment)
                <div class="card article-comment-item">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="article-comment-item-info-name">
                                <i class="fa-solid fa-user"></i>
                                <span>{{ $comment->user->name }}</span>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <script>
        const body = document.querySelector('#body');
        ClassicEditor
            .create(body)
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
