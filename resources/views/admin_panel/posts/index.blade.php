@extends('admin_panel.layouts.master')

@section('title')
    Posts
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-4 d-flex align-items-center justify-content-between">
                    <div class="mb-0 card-title">
                        <h4>Posts</h4>
                    </div>
                    <div class="gap-2 d-flex">
                        <a href="{{ route('post.create') }}" class="btn btn-sm btn-primary">
                            <i class="bx bx-plus"></i> Add a new post
                        </a>

                        @role('admin')
                            <a href="{{ route('post.trashbin') }}" class="btn btn-sm btn-danger">
                                <i class="bx bx-trash-alt"></i> Trash
                            </a>
                        @endrole
                    </div>
                </div>

                <div class="table-responsive text-nowrap">
                    <table class="table mb-0 border table-centered table-nowrap table-hover">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th class="text-center">Edit</th>
                                <th class="text-center">Move to Trash</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $post)
                                <tr>
                                    <td>
                                        <img class="rounded shadow-sm"
                                             src="{{ asset($post->featured) }}"
                                             alt="{{ $post->title }}"
                                             style="width: 60px; height: 60px; object-fit: cover;">
                                    </td>
                                    <td>
                                        <span class="fw-bold text-dark">{{ $post->title }}</span>
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('post.edit', ['id' => $post->id]) }}"
                                           class="btn btn-sm btn-outline-primary">
                                            <i class="bx bx-edit-alt"></i> Edit
                                        </a>
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('post.delete', ['id' => $post->id]) }}"
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
                                            <i class="bx bx-info-circle fs-2"></i>
                                            <p class="mt-2">No any posts at the moment!</p>
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
