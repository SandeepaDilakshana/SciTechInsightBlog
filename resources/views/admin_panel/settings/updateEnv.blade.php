@extends('admin_panel.layouts.master')

@section('title')
    Update Email Configuration
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <div class="shadow-sm card">
                <div class="card-body">
                    <div class="mb-4 card-title d-flex align-items-center">
                        <i class="bx bx-cog fs-4 me-2 text-primary"></i>
                        <h4 class="mb-0 card-title">Advanced SMTP & Email Configuration</h4>
                    </div>

                    <hr class="mb-4">

                    @include('admin_panel.includes.errors')

                    <form action="{{ route('settings.updateEnv') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="mb-4 col-md-6 row">
                                <label class="col-sm-4 col-form-label fw-bold text-muted">MAIL MAILER</label>
                                <div class="col-sm-8">
                                    <input type="text" name="MAIL_MAILER" value="{{ env('MAIL_MAILER', 'smtp') }}"
                                        class="form-control" placeholder="e.g. smtp">
                                </div>
                            </div>

                            <div class="mb-4 col-md-6 row">
                                <label class="col-sm-4 col-form-label fw-bold text-muted">MAIL HOST</label>
                                <div class="col-sm-8">
                                    <input type="text" name="MAIL_HOST" value="{{ env('MAIL_HOST') }}"
                                        class="form-control" placeholder="smtp.mailtrap.io">
                                </div>
                            </div>

                            <div class="mb-4 col-md-6 row">
                                <label class="col-sm-4 col-form-label fw-bold text-muted">MAIL PORT</label>
                                <div class="col-sm-8">
                                    <input type="text" name="MAIL_PORT" value="{{ env('MAIL_PORT') }}"
                                        class="form-control" placeholder="2525">
                                </div>
                            </div>

                            <div class="mb-4 col-md-6 row">
                                <label class="col-sm-4 col-form-label fw-bold text-muted">MAIL USERNAME</label>
                                <div class="col-sm-8">
                                    <input type="text" name="MAIL_USERNAME" value="{{ env('MAIL_USERNAME') }}"
                                        class="form-control" placeholder="Username">
                                </div>
                            </div>

                            <div class="mb-4 col-md-6 row">
                                <label class="col-sm-4 col-form-label fw-bold text-muted">MAIL PASSWORD</label>
                                <div class="col-sm-8">
                                    <input type="password" name="MAIL_PASSWORD" value="{{ str_replace('"', '', env('MAIL_PASSWORD')) }}"
                                        class="form-control" placeholder="Password">
                                </div>
                            </div>

                            <div class="mb-4 col-md-6 row">
                                <label class="col-sm-4 col-form-label fw-bold text-muted">ENCRYPTION</label>
                                <div class="col-sm-8">
                                    <select name="MAIL_ENCRYPTION" class="form-select">
                                        <option value="null" {{ env('MAIL_ENCRYPTION') == null ? 'selected' : '' }}>None</option>
                                        <option value="tls" {{ env('MAIL_ENCRYPTION') == 'tls' ? 'selected' : '' }}>TLS</option>
                                        <option value="ssl" {{ env('MAIL_ENCRYPTION') == 'ssl' ? 'selected' : '' }}>SSL</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-4 col-md-6 row">
                                <label class="col-sm-4 col-form-label fw-bold text-muted">FROM NAME</label>
                                <div class="col-sm-8">
                                    <input type="text" name="MAIL_FROM_NAME"
                                        value="{{ str_replace('"', '', env('MAIL_FROM_NAME')) }}"
                                        class="form-control" placeholder="e.g. My Awesome Blog">
                                </div>
                            </div>

                            <div class="mb-4 col-md-6 row">
                                <label class="col-sm-4 col-form-label fw-bold text-muted">FROM EMAIL</label>
                                <div class="col-sm-8">
                                    <input type="email" name="MAIL_FROM_ADDRESS" value="{{ env('MAIL_FROM_ADDRESS') }}"
                                        class="form-control" placeholder="noreply@domain.com">
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 row">
                            <div class="text-center col-12">
                                <button type="submit" class="px-5 shadow-sm btn btn-primary">
                                    <i class="bx bx-save me-1"></i> Save Configuration
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
