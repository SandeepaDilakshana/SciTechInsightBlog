@extends('layouts.app')

@section('title')
    Tags
@endsection

@section('content')
    <div class="mt-5 overflow-hidden bg-white border border-gray-200 shadow sm:rounded-lg">
        <div class="flex items-center justify-between p-4 border-b border-gray-200 bg-gray-50">
            <h3 class="text-lg font-bold text-gray-700">Tags</h3>

            <button type="button" onclick="toggleModal('tagModal')"
                class="inline-flex items-center px-3 py-1 text-xs font-medium text-white transition-colors bg-blue-500 rounded hover:bg-blue-600">
                Add a new tag
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Tag name
                        </th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                            Edit
                        </th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                            Delete
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($tags as $tag)
                        <tr class="transition-colors hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">
                                {{ $tag->tag }}
                            </td>
                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                @can('update', $tag)
                                    <button type="button" onclick="toggleModal('editTagModal-{{ $tag->id }}')"
                                        class="inline-flex items-center px-3 py-1 text-xs font-medium text-white transition-colors bg-blue-500 rounded hover:bg-blue-600">
                                        Edit
                                        </a>
                                    @else
                                        <span class="text-xs italic text-gray-400">Restricted</span>
                                    @endcan
                            </td>
                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                @can('delete', $tag)
                                    <a href="{{ route('tag.delete', ['id' => $tag->id]) }}"
                                        class="inline-flex items-center px-3 py-1 text-xs font-medium text-white transition-colors bg-red-500 rounded hover:bg-red-600"
                                        onclick="confirmDelete(event, this.href)">
                                        Delete
                                    </a>
                                @else
                                    <span class="text-xs italic text-gray-400">Restricted</span>
                                @endcan
                            </td>
                        </tr>

                        <div id="editTagModal-{{ $tag->id }}"
                            class="fixed inset-0 z-50 items-center justify-center hidden overflow-y-auto bg-black bg-opacity-50">
                            <div class="relative w-full max-w-md p-6 mx-auto bg-white rounded-lg shadow-xl">
                                <div class="flex items-center justify-between mb-4 text-left">
                                    <h3 class="text-xl font-bold text-gray-800">Edit Tag</h3>
                                    <button onclick="toggleModal('editTagModal-{{ $tag->id }}')"
                                        class="text-gray-400 hover:text-gray-600">&times;</button>
                                </div>

                                <form action="{{ route('tag.update', $tag->id) }}" method="POST">
                                    @csrf
                                    @method('PUT') <div class="mb-4 text-left">
                                        <label for="tag-{{ $tag->id }}"
                                            class="block text-sm font-medium text-gray-700">Tag Name</label>
                                        <input type="text" name="tag" id="tag-{{ $tag->id }}"
                                            value="{{ $tag->tag }}" required
                                            class="w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                    </div>

                                    <div class="flex justify-end space-x-3">
                                        <button type="button" onclick="toggleModal('editTagModal-{{ $tag->id }}')"
                                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                                            Cancel
                                        </button>
                                        <button type="submit"
                                            class="px-4 py-2 text-sm font-medium text-white bg-green-500 rounded-md hover:bg-green-600">
                                            Update Tag
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="10" class="p-20 text-center bg-gray-50">
                                <div class="flex flex-col items-center justify-center w-full">
                                    <p class="text-xl font-semibold text-gray-500">No any tags at the moment!</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div id="tagModal"
        class="fixed inset-0 z-50 items-center justify-center hidden overflow-y-auto bg-black bg-opacity-50">
        <div class="relative w-full max-w-md p-6 mx-auto bg-white rounded-lg shadow-xl">
            <div class="flex items-center justify-between mb-4 text-left">
                <h3 class="text-xl font-bold text-gray-800">Add New Tag</h3>
                <button onclick="toggleModal('tagModal')" class="text-gray-400 hover:text-gray-600">&times;</button>
            </div>

            <form action="{{ route('tag.store') }}" method="POST">
                @csrf
                <div class="mb-4 text-left">
                    <label for="name" class="block text-sm font-medium text-gray-700">Tag Name</label>
                    <input type="text" name="tag" id="name" placeholder="Enter a Tag here" required
                        class="w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="toggleModal('tagModal')"
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">
                        Save Tag
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="mt-4">
        {{ $tags->links() }}
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
