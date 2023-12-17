@extends('layouts.dashboard')

@section('sidebar')
    <a href="{{ route("admin") }}">
        <div class="sidebar-item active">Dashboard</div>
    </a>
    <a href="{{ route('admin.manage-journalist') }}">
        <div class="sidebar-item">Journalist</div>
    </a>
    <a href="{{ route("admin.post") }}">
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
        <div class="col-lg-3">
            <div class="card p-2 shadow">
                <h1 class="card-title fs-4 border-bottom border-4 border-primary">Total Journalist</h1>
                <div class="card-body">
                    <span class="h2">{{ $data['authorCount'] }}</span>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card p-2 shadow">
                <h1 class="card-title fs-4 border-bottom border-4 border-primary">Average Journalist Posts</h1>
                <div class="card-body">
                    <span class="h2">{{ $data['averageAuthorPosts'] }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
