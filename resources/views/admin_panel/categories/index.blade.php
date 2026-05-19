@extends('admin_panel.layouts.master')

@section('title')
    Categories
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-4 d-flex align-items-center justify-content-between">
                    <div class="mb-0 card-title">
                        <h4>Categories</h4>
                    </div>
                    <div class="gap-2 d-flex">
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#categoryModal">
                            <i class="bx bx-plus"></i> Add a new category
                        </button>

                        @can('delete')
                            <a href="{{ route('category.trashbin') }}" class="btn btn-sm btn-danger">
                                <i class="bx bx-trash-alt"></i> Trash
                            </a>
                        @endcan
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-nowrap" id="myTable">
                        <thead>
                            <tr>
                                <th>CATEGORY NAME</th>
                                <th class="text-center">EDIT</th>
                                <th class="text-center">MOVE TO TRASH</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>

                                    <td class="text-center">
                                        @can('update', $category)
                                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                                data-bs-target="#editCategoryModal-{{ $category->id }}">
                                                <i class="bx bx-edit"></i> Edit
                                            </button>
                                        @else
                                            <span class="text-muted small"><i>Restricted</i></span>
                                        @endcan
                                    </td>

                                    <td class="text-center">
                                        @can('delete', $category)
                                            <a href="{{ route('category.delete', ['id' => $category->id]) }}"
                                                class="btn btn-sm btn-outline-danger" onclick="confirmDelete(event, this.href)">
                                                <i class="bx bx-trash"></i> Move to Trash
                                            </a>
                                        @else
                                            <span class="text-muted small"><i>Restricted</i></span>
                                        @endcan
                                    </td>

                                    <div class="modal fade" id="editCategoryModal-{{ $category->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Category</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('category.update', $category->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body text-start">
                                                        <div class="form-group">
                                                            <label for="name-{{ $category->id }}"
                                                                class="form-label">Category Name</label>
                                                            <input type="text" name="name"
                                                                id="name-{{ $category->id }}" value="{{ $category->name }}"
                                                                required class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-success">Update
                                                            Category</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="py-5 text-center">
                                        <p class="mb-0 text-muted">No any categories at the moment!</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="categoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="modal-body text-start">
                        <div class="form-group">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" name="name" id="name" placeholder="Enter a Category here" required
                                class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "pageLength": 10,
                "ordering": true,
                "searching": true
            });
        });
    </script>

    @include('admin_panel.includes.confirm_delete')
@endsection
