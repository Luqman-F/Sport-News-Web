@extends('layouts.dashboard')

@section('sidebar')
<a href="{{ route("admin") }}">
    <div class="sidebar-item">Dashboard</div>
</a>
<a href="{{ route('admin.manage-journalist') }}">
    <div class="sidebar-item">Journalist</div>
</a>
<a href="{{ route("admin.post") }}">
    <div class="sidebar-item active">Articles</div>
</a>

@endsection

@section('content')
    @dump($posts)
@endsection
