@extends('layouts.app')

@section('title')
    Categories
@endsection

@section('content')
    <div class="mt-5 overflow-hidden bg-white border border-gray-200 shadow sm:rounded-lg">
        <div class="flex items-center justify-between p-4 border-b border-gray-200 bg-gray-50">
            <h3 class="text-lg font-bold text-gray-700">Categories</h3>

            <div class="flex items-center space-x-2">
                <button type="button" onclick="toggleModal('categoryModal')"
                    class="inline-flex items-center px-3 py-1 text-xs font-medium text-white transition-colors bg-blue-500 rounded hover:bg-blue-600">
                    Add a new category
                </button>
                <a href="{{ route('category.trashbin') }}"
                    class="inline-flex items-center px-3 py-1 text-xs font-medium text-white transition-colors bg-red-500 rounded hover:bg-red-600">
                    Trash
                </a>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Category name
                        </th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                            Edit
                        </th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                            Move to Trash
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($categories as $category)
                        <tr class="transition-colors hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">
                                {{ $category->name }}
                            </td>
                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                <a href="{{ route('category.edit', ['id' => $category->id]) }}"
                                    class="inline-flex items-center px-3 py-1 text-xs font-medium text-white transition-colors bg-blue-500 rounded hover:bg-blue-600">
                                    Edit
                                </a>
                            </td>
                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                <a href="{{ route('category.delete', ['id' => $category->id]) }}"
                                    class="inline-flex items-center px-3 py-1 text-xs font-medium text-white transition-colors bg-red-500 rounded hover:bg-red-600"
                                    onclick="confirmDelete(event, this.href)">
                                    Move to Trash
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="p-20 text-center bg-gray-50">
                                <div class="flex flex-col items-center justify-center w-full">
                                    <p class="text-xl font-semibold text-gray-500">No any categories at the moment!</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div id="categoryModal"
        class="fixed inset-0 z-50 items-center justify-center hidden overflow-y-auto bg-black bg-opacity-50">
        <div class="relative w-full max-w-md p-6 mx-auto bg-white rounded-lg shadow-xl">
            <div class="flex items-center justify-between mb-4 text-left">
                <h3 class="text-xl font-bold text-gray-800">Add New Category</h3>
                <button onclick="toggleModal('categoryModal')" class="text-gray-400 hover:text-gray-600">&times;</button>
            </div>

            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="mb-4 text-left">
                    <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter a Category here" required
                        class="w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="toggleModal('categoryModal')"
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">
                        Save Category
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="mt-4">
        {{ $categories->links() }}
    </div>

    <script>
        function toggleModal(modalID) {
            const modal = document.getElementById(modalID);
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        }
    </script>

    @include('includes.confirm_delete')
@endsection
