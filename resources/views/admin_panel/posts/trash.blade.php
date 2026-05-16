@extends('admin_panel.layouts.master')

@section('title')
    Trash (Posts)
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-4 d-flex align-items-center justify-content-between">
                    <div class="mb-0 card-title">
                        <h4>Trash (Posts)</h4>
                    </div>
                    <a href="{{ route('posts') }}" class="btn btn-sm btn-secondary">
                        <i class="bx bx-arrow-back"></i> Back to Posts
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-nowrap">
                        <thead>
                            <tr>
                                <th>IMAGE</th>
                                <th>POST TITLE</th>
                                <th class="text-center">RESTORE</th>
                                <th class="text-center">DELETE PERMANENTLY</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $post)
                                <tr>
                                    <td>
                                        <img class="rounded shadow-sm"
                                             src="{{ asset($post->featured) }}"
                                             alt="{{ $post->title }}"
                                             style="width: 50px; height: 50px; object-fit: cover;">
                                    </td>
                                    <td class="align-middle">
                                        <span class="fw-medium text-dark">{{ $post->title }}</span>
                                    </td>

                                    <td class="text-center align-middle">
                                        @if (Auth::id() == $post->user_id || Auth::user()->admin)
                                            <a href="{{ route('post.restore', ['id' => $post->id]) }}"
                                               class="text-white btn btn-sm btn-outline-info">
                                                <i class="bx bx-undo"></i> Restore
                                            </a>
                                        @else
                                            <span class="badge bg-light text-muted"><i class="bx bx-lock-alt"></i> Locked</span>
                                        @endif
                                    </td>

                                    <td class="text-center align-middle">
                                        @if (Auth::id() == $post->user_id || Auth::user()->admin)
                                            <a href="{{ route('post.trash', ['id' => $post->id]) }}"
                                               class="btn btn-sm btn-outline-danger"
                                               onclick="confirmDelete(event, this.href)">
                                                <i class="bx bx-trash"></i> Delete Permanently
                                            </a>
                                        @else
                                            <span class="badge bg-light text-muted"><i class="bx bx-lock-alt"></i> Locked</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="py-5 text-center">
                                        <div class="d-flex flex-column align-items-center justify-content-center">
                                            <div class="p-3 mb-3 rounded-circle bg-light">
                                                <i class="bx bx-trash text-muted" style="font-size: 3rem;"></i>
                                            </div>
                                            <p class="mb-1 text-xl font-semibold text-secondary">Your trash bin is empty!</p>
                                            <p class="text-sm text-muted">There are no deleted posts to show at the moment.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>

    @include('admin_panel.includes.confirm_delete')
@endsection
