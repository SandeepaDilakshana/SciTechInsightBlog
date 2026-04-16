@extends('layouts.app')

@section('title')
    Trash (Post)
@endsection

@section('content')
    <div class="mt-5 overflow-hidden bg-white border border-gray-200 shadow sm:rounded-lg">
        <div class="p-4 border-b border-gray-200 bg-gray-50">
            <h3 class="text-lg font-bold text-gray-700">Trash (Post)</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Image
                        </th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Title
                        </th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                            Restore
                        </th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                            Delete Permenantly
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($posts as $post)
                        <tr class="transition-colors hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap"><img src="{{ $post->featured }}"
                                    alt="{{ $post->title }}" width="70px" height="70px"</td>
                            <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">{{ $post->title }}</td>
                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                <a href="#"
                                    class="inline-flex items-center px-3 py-1 text-xs font-medium text-white transition-colors bg-blue-500 rounded hover:bg-blue-600">
                                    Restore
                                </a>
                            </td>
                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                <a href="{{ route('post.trash', ['id' => $post->id]) }}"
                                    class="inline-flex items-center px-3 py-1 text-xs font-medium text-white transition-colors bg-red-500 rounded hover:bg-red-600" onclick="confirmDelete(event, this.href)">
                                    Delete Permenantly
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function confirmDelete(e, route) {
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = route;
                }
            });
        }
    </script>
@endsection
