<!-- resources/views/profile.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User Profile</div>

                    <div class="card-body">
                        <div>
                            <strong>Name:</strong> {{ Auth::user()->name }}
                        </div>
                        <div>
                            <strong>Email:</strong> {{ Auth::user()->email }}
                        </div>
                        <!-- Tambahkan informasi profil lainnya sesuai kebutuhan -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
