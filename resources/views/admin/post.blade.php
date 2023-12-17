@extends('layouts.dashboard')

@section('sidebar')
    <a href="{{ route('admin') }}">
        <div class="sidebar-item">Dashboard</div>
    </a>
    <a href="{{ route('admin.manage-journalist') }}">
        <div class="sidebar-item">Journalist</div>
    </a>
    <a href="{{ route('admin.post') }}">
        <div class="sidebar-item active">Articles</div>
    </a>
@endsection

@section('content')
    <div class="row">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $key => $value)
                    <tr>
                        <td>{{ $key + 1 + ((request('page') ?? 1) - 1) * 10 }}</td>
                        <td>{{ $value->title }}</td>
                        <td>{{ $value->author?->name }}</td>
                        <td>{{ $value->created_at }}</td>
                        <td>
                            <a href="{{ route('post.edit', $value->id) }}" class="btn btn-warning"><i class="fa-solid fa-pencil"></i></a>
                            <form class="d-inline" action="{{ route('post.destroyPost', ['post' => $value->id]) }}"
                                method="POST">
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
