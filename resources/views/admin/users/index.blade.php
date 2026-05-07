@extends('layouts.app')

@section('title')
    Users
@endsection

@section('content')
    <div class="mt-5 overflow-hidden bg-white border border-gray-200 shadow sm:rounded-lg">
        <div class="flex items-center justify-between p-4 border-b border-gray-200 bg-gray-50">
            <h3 class="text-lg font-bold text-gray-700">Users</h3>
            <a href="{{ route('user.trashbin') }}"
                class="inline-flex items-center px-3 py-1 text-xs font-medium text-white transition-colors bg-red-500 rounded hover:bg-red-600">
                Trash
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Image</th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Name</th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Permissions</th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">Move to
                            Trash
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($users as $user)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img src="{{ $user->profile ? asset($user->profile->avatar) : asset('uploads\avatars\836.jpg') }}"
                                    class="object-cover rounded-full" width="50" height="50">
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">{{ $user->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">
                                @if ($user->admin)
                                    <a href="{{ route('user.not_admin', ['id' => $user->id]) }}"
                                        class="inline-flex items-center px-3 py-1 text-xs font-medium text-white transition-colors bg-red-500 rounded hover:bg-red-600">
                                        Remove Admin Permision
                                    </a>
                                @else
                                    <a href="{{ route('user.admin', ['id' => $user->id]) }}"
                                        class="inline-flex items-center px-3 py-1 text-xs font-medium text-white transition-colors rounded bg-cyan-500 hover:bg-cyan-600">
                                        Make Admin
                                    </a>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                <a href="{{ route('user.delete', ['id' => $user->id]) }}"
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
                                    <p class="text-xl font-semibold text-gray-500">No any users at the moment!</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-4">
        {{ $users->links() }}
    </div>

    <script>
        function confirmDelete(e, route) {
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to delete this user!",
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
