@extends('admin_panel.layouts.master')

@section('title')
    Messages
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-4 d-flex align-items-center justify-content-between">
                    <div class="mb-0 card-title">
                        <h4>Messages</h4>
                    </div>
                    <div class="gap-2 d-flex">
                        <a href="{{ route('messages.trash') }}" class="btn btn-sm btn-danger">
                            <i class="bx bx-trash-alt"></i> Trash
                        </a>
                    </div>
                </div>

                <div class="table-responsive text-nowrap">
                    <table class="table mb-0 border table-bordered table-centered table-nowrap table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email Address</th>
                                <th>Message</th>
                                <th class="text-center">Move to Trash</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($messages as $message)
                                <tr>
                                    <td>
                                        <span class="fw-bold text-dark">{{ $message->name }}</span>
                                    </td>
                                    <td>
                                        <span class="text-muted">{{ $message->email }}</span>
                                    </td>
                                    <td>
                                        {{-- පණිවිඩය දිග වැඩි නම් කෙටි කර පෙන්වීමට (Optional) --}}
                                        <span title="{{ $message->message }}">
                                            {{ Str::limit($message->message, 50) }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('messages.delete', ['id' => $message->id]) }}"
                                           class="btn btn-sm btn-outline-danger"
                                           onclick="confirmDelete(event, this.href)">
                                            <i class="bx bx-trash"></i> Move to Trash
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="py-5 text-center">
                                        <div class="text-muted">
                                            <i class="bx bx-envelope-open fs-2"></i>
                                            <p class="mt-2">No any messages at the moment!</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $messages->links() }}
                </div>
            </div>
        </div>
    </div>

    @include('admin_panel.includes.confirm_delete')
@endsection
