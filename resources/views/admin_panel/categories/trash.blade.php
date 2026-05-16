@extends('admin_panel.layouts.master')

@section('title')
    Trash Categories
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-4 d-flex align-items-center justify-content-between">
                    <div class="mb-0 card-title">
                        <h4>Trash (Categories)</h4>
                    </div>
                    <a href="{{ route('categories') }}" class="btn btn-sm btn-secondary">
                        <i class="bx bx-arrow-back"></i> Back to Categories
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-nowrap">
                        <thead>
                            <tr>
                                <th>CATEGORY NAME</th>
                                <th class="text-center">RESTORE</th>
                                <th class="text-center">DELETE PERMANENTLY</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>

                                    <td class="text-center">
                                        <a href="{{ route('category.restore', ['id' => $category->id]) }}"
                                            class="text-white btn btn-sm btn-outline-info">
                                            <i class="bx bx-undo"></i> Restore
                                        </a>
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('category.trash', ['id' => $category->id]) }}"
                                            class="btn btn-sm btn-outline-danger" onclick="confirmDelete(event, this.href)">
                                            <i class="bx bx-trash"></i> Delete Permanently
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="py-5 text-center">
                                        <div class="flex-column d-flex align-items-center justify-content-center">
                                            <div class="p-3 mb-3 rounded-circle bg-light">
                                                <i class="bx bx-trash text-muted" style="font-size: 3rem;"></i>
                                            </div>
                                            <p class="mb-1 text-xl font-semibold text-gray-500">Your trash bin is empty!</p>
                                            <p class="text-sm text-muted">There are no deleted categories to show at the
                                                moment.</p>
                                        </div>
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

    @include('admin_panel.includes.confirm_delete')
@endsection
