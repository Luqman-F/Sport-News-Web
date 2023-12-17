@extends('layouts.dashboard')

@section('sidebar')
<a href="{{ route('journalist') }}">
    <div class="sidebar-item">Dashboard</div>
</a>
<a href="{{ route("journalist.posts") }}">
    <div class="sidebar-item">Articles</div>
</a>
@endsection

@section('content')
<div class="p-3">
    <a class="btn btn-success" href="{{ route("journalist.create") }}"><i class="fa-solid fa-plus"></i> New
        Article</a>
</div>
<div class="row">
    @if (session('success'))
    <div class="alert alert-success m-3">
        {{ session('success') }}
    </div>
    @endif
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Views</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $key => $value)
            <tr>
                <td>{{ $key + 1 + ((request('page')??1)-1)*10}}</td>
                <td>{{ $value->title }}</td>
                <td>{{ $value->views }}</td>
                <td>{{ $value->created_at }}</td>
                <td>
                    <a href=" {{ route("post.edit", $value->id) }} " class="btn btn-warning"><i class="fa-solid fa-pencil"></i></a>
                    <form class="d-inline" action="{{ route('post.destroyPost', ['post' => $value->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
                    </form>
        </td>
            @endforeach
    </table>
    {{ $posts->links() }}
</div>
@endsection
