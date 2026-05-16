@extends('admin_panel.layouts.master')

@section('title')
    Trash (User)
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-4 d-flex align-items-center justify-content-between">
                    <div class="mb-0 card-title">
                        <h4>Trash (User)</h4>
                    </div>
                    <a href="{{ route('users') }}" class="btn btn-sm btn-secondary">
                        <i class="bx bx-arrow-back"></i> Back to Users
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-nowrap">
                        <thead>
                            <tr>
                                <th>IMAGE</th>
                                <th>USER NAME</th>
                                <th class="text-center">RESTORE</th>
                                <th class="text-center">DELETE PERMANENTLY</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>
                                        <img class="rounded shadow-sm"
                                            src="{{ $user->profile ? asset($user->profile->avatar) : asset('uploads/avatars/836.jpg') }}"
                                            alt="{{ $user->name }}" style="width: 50px; height: 50px; object-fit: cover;">
                                    </td>
                                    <td class="align-middle">
                                        <span class="fw-medium text-dark">{{ $user->name }}</span>
                                    </td>

                                    <td class="text-center align-middle">
                                        <a href="{{ route('user.restore', ['id' => $user->id]) }}"
                                            class="text-white btn btn-sm btn-outline-info">
                                            <i class="bx bx-undo"></i> Restore
                                        </a>
                                    </td>

                                    <td class="text-center align-middle">
                                        <a href="{{ route('user.trash', ['id' => $user->id]) }}"
                                            class="btn btn-sm btn-outline-danger" onclick="confirmDelete(event, this.href)">
                                            <i class="bx bx-trash"></i> Delete Permanently
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="py-5 text-center">
                                        <div class="d-flex flex-column align-items-center justify-content-center">
                                            <div class="p-3 mb-3 rounded-circle bg-light">
                                                <i class="bx bx-trash text-muted" style="font-size: 3rem;"></i>
                                            </div>
                                            <p class="mb-1 text-xl font-semibold text-secondary">Your trash bin is empty!
                                            </p>
                                            <p class="text-sm text-muted">There are no deleted users to show at the moment.
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>

    @include('admin_panel.includes.confirm_delete')
@endsection
