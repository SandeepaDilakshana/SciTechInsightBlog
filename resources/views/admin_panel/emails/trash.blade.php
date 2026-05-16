@extends('admin_panel.layouts.master')

@section('title')
    Trash (Messages)
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-4 d-flex align-items-center justify-content-between">
                    <div class="mb-0 card-title">
                        <h4>Trash (Messages)</h4>
                    </div>
                    <a href="{{ route('messages') }}" class="btn btn-sm btn-secondary">
                        <i class="bx bx-arrow-back"></i> Back to Messages
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-nowrap table-hover">
                        <thead>
                            <tr>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>MESSAGE</th>
                                <th class="text-center">RESTORE</th>
                                <th class="text-center">DELETE PERMANENTLY</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($trashedMessages as $message)
                                <tr>
                                    <td><span class="fw-bold">{{ $message->name }}</span></td>
                                    <td>{{ $message->email }}</td>
                                    <td>
                                        <span title="{{ $message->message }}">
                                            {{ Str::limit($message->message, 40) }}
                                        </span>
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('messages.restore', ['id' => $message->id]) }}"
                                            class="text-white btn btn-sm btn-outline-info">
                                            <i class="bx bx-undo"></i> Restore
                                        </a>
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('messages.force_delete', ['id' => $message->id]) }}"
                                            class="btn btn-sm btn-outline-danger" onclick="confirmDelete(event, this.href)">
                                            <i class="bx bx-trash"></i> Delete Permanently
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-5 text-center">
                                        <div class="flex-column d-flex align-items-center justify-content-center">
                                            <div class="p-3 mb-3 rounded-circle bg-light">
                                                <i class="bx bx-trash text-muted" style="font-size: 3rem;"></i>
                                            </div>
                                            <p class="mb-1 text-xl font-semibold text-gray-500">Your trash bin is empty!</p>
                                            <p class="text-sm text-muted">There are no deleted messages to show at the
                                                moment.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $trashedMessages->links() }}
                </div>
            </div>
        </div>
    </div>

    @include('admin_panel.includes.confirm_delete')
@endsection
