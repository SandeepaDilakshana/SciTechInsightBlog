@extends('admin_panel.layouts.master')

@section('title')
    Edit Profile
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-8">
            {{-- Profile Information Card --}}
            <div class="mb-4 card">
                <div class="card-body">
                    <div class="mb-4 card-title">
                        <h4>Edit Your Profile</h4>
                    </div>

                    @include('admin_panel.includes.errors')

                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" id="profileForm">
                        @csrf

                        <div class="mb-4 row">
                            <label for="name" class="col-sm-3 col-form-label">Full Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control"
                                    id="name" placeholder="Enter your name" required>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="email" class="col-sm-3 col-form-label">Email Address</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                                    id="email" placeholder="Enter your email" required>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label class="col-sm-3 col-form-label">Profile Photo</label>
                            <div class="col-sm-9">
                                @if ($user->profile->avatar)
                                    <div class="mb-2">
                                        <img src="{{ asset($user->profile->avatar) }}" alt="current image"
                                            class="rounded shadow-sm"
                                            style="width: 100px; height: 100px; object-fit: cover;">
                                    </div>
                                @endif
                                <input type="file" name="avatar" class="form-control" id="avatar">
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="facebook" class="col-sm-3 col-form-label">Facebook URL</label>
                            <div class="col-sm-9">
                                <input type="text" name="facebook" value="{{ $user->profile->facebook }}"
                                    class="form-control" id="facebook" placeholder="Facebook profile link">
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="youtube" class="col-sm-3 col-form-label">Youtube URL</label>
                            <div class="col-sm-9">
                                <input type="text" name="youtube" value="{{ $user->profile->youtube }}"
                                    class="form-control" id="youtube" placeholder="Youtube channel link">
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label class="text-white col-sm-3 col-form-label">Content</label>
                            <div class="col-sm-9">
                                <div id="editor" style="height: 300px; border: 1px solid #ced4da;">
                                    {!! $user->profile->about !!}</div>
                                <input type="hidden" name="content" id="content-hidden">
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary w-md">
                                    <i class="bx bx-save me-1"></i> Update Profile
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Password Update Card --}}
            <div class="card">
                <div class="card-body">
                    <div class="mb-4 card-title">
                        <h4>Update Password</h4>
                    </div>

                    <form method="post" action="{{ route('password.update') }}">
                        @csrf
                        @method('put')

                        <div class="mb-4 row">
                            <label for="current_password" class="col-sm-3 col-form-label">Current Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="current_password"
                                    class="form-control @error('current_password', 'updatePassword') is-invalid @enderror"
                                    id="current_password" required>
                                @error('current_password', 'updatePassword')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password" class="col-sm-3 col-form-label">New Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password"
                                    class="form-control @error('password', 'updatePassword') is-invalid @enderror"
                                    id="password" required>
                                @error('password', 'updatePassword')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password_confirmation" class="col-sm-3 col-form-label">Confirm Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password_confirmation" class="form-control"
                                    id="password_confirmation" required>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-danger w-md">
                                    <i class="bx bx-lock-alt me-1"></i> Change Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

    <script>
        const quill = new Quill('#editor', {
            theme: 'snow',
            placeholder: 'Write about yourself...'
        });

        const form = document.querySelector('#profileForm');
        form.onsubmit = function() {
            const contentInput = document.querySelector('#content-hidden');
            contentInput.value = quill.root.innerHTML;
        };
    </script>

    <style>
        #editor .ql-editor {
            color: white !important;
            background-color: transparent !important;
        }

        #editor .ql-editor.ql-blank::before {
            color: rgba(255, 255, 255, 0.6) !important;
        }

        .ql-snow .ql-stroke {
            stroke: white !important;
        }

        .ql-snow .ql-fill {
            fill: white !important;
        }

        .ql-snow .ql-picker {
            color: white !important;
        }
    </style>
@endsection
