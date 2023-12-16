@extends('layouts.dashboard')

@section('sidebar')
<a href="{{ route("journalist") }}">
    <div class="sidebar-item">Dashboard</div>
</a>
<a href="{{ route("journalist.posts") }}">
    <div class="sidebar-item">Articles</div>
</a>
@endsection

@section('content')
    @dump($data)

@endsection
