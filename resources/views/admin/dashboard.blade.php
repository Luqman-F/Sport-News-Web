@extends('layouts.dashboard')

@section('sidebar')
<a href="">
    <div class="sidebar-item">Dashboard</div>
</a>
<a href="/admin/users">
    <div class="sidebar-item">Users</div>
</a>
<a href="/admin/articles">
    <div class="sidebar-item">Articles</div>
</a>
@endsection