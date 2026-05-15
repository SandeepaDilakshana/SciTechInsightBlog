@extends('admin_panel.layouts.master')

@section('title')
    Tags
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-4 d-flex align-items-center justify-content-between">
                    <div class="mb-0 card-title">
                        <h4>Tags</h4>
                    </div>
                    <div class="gap-2 d-flex">
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#tagModal">
                            <i class="bx bx-plus"></i> Add a new tag
                        </button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-nowrap">
                        <thead>
                            <tr>
                                <th>TAG NAME</th>
                                <th class="text-center">EDIT</th>
                                <th class="text-center">DELETE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tags as $tag)
                                <tr>
                                    <td>{{ $tag->tag }}</td>

                                    <td class="text-center">
                                        @can('update', $tag)
                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#editTagModal-{{ $tag->id }}">
                                                <i class="bx bx-edit"></i> Edit
                                            </button>
                                        @else
                                            <span class="text-muted small"><i>Restricted</i></span>
                                        @endcan
                                    </td>

                                    <td class="text-center">
                                        @can('delete', $tag)
                                            <a href="{{ route('tag.delete', ['id' => $tag->id]) }}"
                                                class="btn btn-sm btn-danger" onclick="confirmDelete(event, this.href)">
                                                <i class="bx bx-trash"></i> Delete
                                            </a>
                                        @else
                                            <span class="text-muted small"><i>Restricted</i></span>
                                        @endcan
                                    </td>

                                    <div class="modal fade" id="editTagModal-{{ $tag->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Tag</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('tag.update', $tag->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body text-start">
                                                        <div class="form-group">
                                                            <label for="tag-{{ $tag->id }}" class="form-label">Tag
                                                                Name</label>
                                                            <input type="text" name="tag"
                                                                id="tag-{{ $tag->id }}" value="{{ $tag->tag }}"
                                                                required class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-success">Update Tag</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="py-5 text-center">
                                        <p class="mb-0 text-muted">No any tags at the moment!</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $tags->links() }}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tagModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Tag</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('tag.store') }}" method="POST">
                    @csrf
                    <div class="modal-body text-start">
                        <div class="form-group">
                            <label for="name" class="form-label">Tag Name</label>
                            <input type="text" name="tag" id="name" placeholder="Enter a Tag here" required
                                class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Tag</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('admin_panel.includes.confirm_delete')
@endsection
