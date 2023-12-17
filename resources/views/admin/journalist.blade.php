@extends('layouts.dashboard')

@section('sidebar')
    <a href="{{ route('admin') }}">
        <div class="sidebar-item">Dashboard</div>
    </a>
    <a href="{{ route('admin.manage-journalist') }}">
        <div class="sidebar-item active">Journalist</div>
    </a>
    <a href="{{ route('admin.post') }}">
        <div class="sidebar-item">Articles</div>
    </a>
@endsection

@section('content')
    <div class="p-3">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah"><i class="fa-solid fa-plus"></i> New
            Journalist</button>
    </div>
    <div class="row">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Posts</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($journalist as $key => $value)
                    <tr>
                        <td>{{ $key + 1 + ((request('page') ?? 1) - 1) * 10 }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->posts->count() }}</td>
                        <td>
                            {{-- <button class="btn btn-warning"><i class="fa-solid fa-pencil"></i></button> --}}
                            <form class="d-inline" action="{{ route('admin.delete-journalist', ['journalist' => $value->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
        </table>
        {{ $journalist->links() }}
    </div>
    <div class="modal" tabindex="-1" id="tambah">
        <div class="modal-dialog modal-lg p-2">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Journalist</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.store-Journalist') }}" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="input-group mb-2">
                            <div class="col-md-3 input-group-prepend">
                                <span class="input-group-text">Name</span>
                            </div>
                            <input type="text" class="form-control col-md-9" name="name" placeholder="Name">
                        </div>
                        <div class="input-group mb-2">
                            <div class="col-md-3 input-group-prepend">
                                <span class="input-group-text">Email</span>
                            </div>
                            <input type="email" class="form-control col-md-9" name="email" placeholder="Email">
                        </div>
                        <div class="input-group mb-2">
                            <div class="col-md-3 input-group-prepend">
                                <span class="input-group-text">Password</span>
                            </div>
                            <input type="password" class="form-control col-md-9" name="password" placeholder="Password">
                        </div>
                        <div class="input-group mb-2">
                            <div class="col-md-3 input-group-prepend">
                                <span class="input-group-text">Confirm Password</span>
                            </div>
                            <input type="password" class="form-control col-md-9" name="password_confirmation"
                                placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
