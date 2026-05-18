@extends('admin_panel.layouts.master')

@section('title')
    Users
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-4 d-flex align-items-center justify-content-between">
                    <div class="mb-0 card-title">
                        <h4>Users Management</h4>
                    </div>
                    <div class="gap-2 d-flex">
                        <a href="{{ route('user.trashbin') }}" class="shadow-sm btn btn-sm btn-danger">
                            <i class="bx bx-trash-alt"></i> Trash Bin
                        </a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table mb-0 table-bordered table-hover table-nowrap" id="myTable">
                        <thead>
                            <tr>
                                <th class="text-center">IMAGE</th>
                                <th>NAME</th>
                                <th class="text-center">PERMISSIONS</th>
                                <th class="text-center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td class="text-center">
                                        <img class="shadow-sm rounded-circle"
                                            src="{{ $user->profile ? asset($user->profile->avatar) : asset('uploads/avatars/836.jpg') }}"
                                            alt="{{ $user->name }}" style="width: 45px; height: 45px; object-fit: cover;">
                                    </td>
                                    <td class="align-middle">
                                        <span class="fw-bold text-dark">{{ $user->name }}</span>
                                    </td>
                                    <td class="text-center">
                                        @if ($user->admin)
                                            <a href="{{ route('user.not_admin', ['id' => $user->id]) }}"
                                                class="btn btn-sm btn-outline-danger">
                                                <i class="bx bx-user-x"></i> Remove Admin
                                            </a>
                                        @else
                                            <a href="{{ route('user.admin', ['id' => $user->id]) }}"
                                                class="btn btn-sm btn-outline-success">
                                                <i class="bx bx-user-check"></i> Make Admin
                                            </a>
                                        @endif
                                    </td>

                                    <td class="text-center align-middle">
                                        <a href="{{ route('user.delete', ['id' => $user->id]) }}"
                                            class="btn btn-sm btn-outline-danger" onclick="confirmDelete(event, this.href)">
                                            <i class="bx bx-trash"></i> Move to Trash
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="py-5 text-center">
                                        <div class="d-flex flex-column align-items-center justify-content-center">
                                            <div class="p-3 mb-3 rounded-circle bg-light">
                                                <i class="bx bx-group text-muted" style="font-size: 3rem;"></i>
                                            </div>
                                            <p class="mb-1 text-xl font-semibold text-secondary">No any users at the moment!
                                            </p>
                                            <p class="text-sm text-muted">It seems your user list is currently empty.</p>
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
