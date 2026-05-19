@extends('admin_panel.layouts.master')

@section('title')
    Create New User
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-8">
            <div class="shadow-sm card">
                <div class="card-body">
                    <div class="mb-4 d-flex align-items-center justify-content-between">
                        <div class="mb-0 card-title">
                            <h4 class="card-title">Create a New User</h4>
                        </div>
                        <a href="{{ route('users') }}" class="btn btn-sm btn-secondary">
                            <i class="bx bx-arrow-back"></i> Back to Users
                        </a>
                    </div>

                    <hr class="mb-4">

                    @include('admin_panel.includes.errors')

                    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4 row">
                            <label for="name" class="col-sm-3 col-form-label fw-bold text-dark">FULL NAME</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bx bx-user"></i></span>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter full name" value="{{ old('name') }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="email" class="col-sm-3 col-form-label fw-bold text-dark">EMAIL ADDRESS</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bx bx-envelope"></i></span>
                                    <input type="email" name="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Enter email address" value="{{ old('email') }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 row">
                            <div class="col-sm-9 offset-sm-3">
                                <div class="gap-2 d-flex">
                                    <button type="submit" class="px-4 shadow-sm btn btn-primary">
                                        <i class="bx bx-save me-1"></i> Store User
                                    </button>
                                    <button type="reset" class="px-4 btn btn-light">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
