@extends('admin_panel.layouts.master')

@section('title')
    Edit Blog Settings
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-8">
            <div class="shadow-sm card">
                <div class="card-body">
                    <div class="mb-4 card-title">
                        <h4 class="card-title">Edit Blog Settings</h4>
                    </div>

                    <hr class="mb-4">

                    @include('includes.errors')

                    <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4 row">
                            <label for="site_name" class="col-sm-3 col-form-label fw-bold">SITE NAME</label>
                            <div class="col-sm-9">
                                <input type="text" name="site_name" id="site_name"
                                    value="{{ $settings->site_name }}" class="form-control"
                                    placeholder="Enter your Site name here" required>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="address" class="col-sm-3 col-form-label fw-bold">ADDRESS</label>
                            <div class="col-sm-9">
                                <input type="text" name="address" id="address"
                                    value="{{ $settings->address }}" class="form-control"
                                    placeholder="Enter your address here" required>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="contact_number" class="col-sm-3 col-form-label fw-bold">CONTACT NUMBER</label>
                            <div class="col-sm-9">
                                <input type="text" name="contact_number" id="contact_number"
                                    value="{{ $settings->contact_number }}" class="form-control"
                                    placeholder="Enter your contact number here" required>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="contact_email" class="col-sm-3 col-form-label fw-bold">CONTACT EMAIL</label>
                            <div class="col-sm-9">
                                <input type="email" name="contact_email" id="contact_email"
                                    value="{{ $settings->contact_email }}" class="form-control"
                                    placeholder="Enter your contact email here" required>
                            </div>
                        </div>

                        <div class="mt-5 row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="shadow-sm btn btn-primary w-md">
                                        <i class="bx bx-save me-1"></i> Update Site Settings
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
