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
    <div class="row p-5">
        <h1>Welcome To Dashboard!</h1>
    </div>
    @dump($data)
@endsection
