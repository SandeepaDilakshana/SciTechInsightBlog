@extends('layouts.app')

@section('title')
    Users
@endsection

@section('content')
    <div class="mt-5 overflow-hidden bg-white border border-gray-200 shadow sm:rounded-lg">
        <div class="flex items-center justify-between p-4 border-b border-gray-200 bg-gray-50">
            <h3 class="text-lg font-bold text-gray-700">Users</h3>
            <a href="#"
                class="inline-flex items-center px-3 py-1 text-xs font-medium text-white transition-colors bg-red-500 rounded hover:bg-red-600">
                Trash
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Image
                        </th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Name
                        </th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                            Permissions
                        </th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                            Move to Trash
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($users as $user)
                        <tr class="transition-colors hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap"><img
                                    src="{{ asset($user->profile->avatar) }}" alt="user_avatar" width="70px"
                                    height="70px">
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">{{ $user->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">Permissions</td>
                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                <a href="#"
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
    @include('includes.confirm_delete')
@endsection
