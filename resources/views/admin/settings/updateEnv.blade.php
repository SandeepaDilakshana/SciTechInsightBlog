@extends('layouts.app')

@section('title')
    Update env Variables
@endsection

@section('content')
    @include('includes.errors')

    <div class="mt-8 overflow-hidden bg-white border border-gray-200 shadow sm:rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <h3 class="flex items-center text-lg font-bold text-gray-700">
                <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                    </path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                Advanced SMTP & Email Configuration
            </h3>
        </div>

        <div class="p-6">
            <form action="{{ route('settings.updateEnv') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div class="flex flex-col space-y-1">
                        <label class="text-sm font-semibold text-gray-600">Mail Mailer</label>
                        <input type="text" name="MAIL_MAILER" value="{{ env('MAIL_MAILER', 'smtp') }}"
                            class="px-4 py-2 border border-gray-300 rounded-md outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="e.g. smtp">
                    </div>

                    <div class="flex flex-col space-y-1">
                        <label class="text-sm font-semibold text-gray-600">Mail Host</label>
                        <input type="text" name="MAIL_HOST" value="{{ env('MAIL_HOST') }}"
                            class="px-4 py-2 border border-gray-300 rounded-md outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="flex flex-col space-y-1">
                        <label class="text-sm font-semibold text-gray-600">Mail Port</label>
                        <input type="text" name="MAIL_PORT" value="{{ env('MAIL_PORT') }}"
                            class="px-4 py-2 border border-gray-300 rounded-md outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="flex flex-col space-y-1">
                        <label class="text-sm font-semibold text-gray-600">Mail Username</label>
                        <input type="text" name="MAIL_USERNAME" value="{{ env('MAIL_USERNAME') }}"
                            class="px-4 py-2 border border-gray-300 rounded-md outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="flex flex-col space-y-1">
                        <label class="text-sm font-semibold text-gray-600">Mail Password</label>
                        <input type="password" name="MAIL_PASSWORD" value="{{ str_replace('"', '', env('MAIL_PASSWORD')) }}"
                            class="px-4 py-2 border border-gray-300 rounded-md outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="flex flex-col space-y-1">
                        <label class="text-sm font-semibold text-gray-600">Mail Encryption</label>
                        <select name="MAIL_ENCRYPTION"
                            class="px-4 py-2 border border-gray-300 rounded-md outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="null" {{ env('MAIL_ENCRYPTION') == null ? 'selected' : '' }}>None</option>
                            <option value="tls" {{ env('MAIL_ENCRYPTION') == 'tls' ? 'selected' : '' }}>TLS</option>
                            <option value="ssl" {{ env('MAIL_ENCRYPTION') == 'ssl' ? 'selected' : '' }}>SSL</option>
                        </select>
                    </div>

                    <div class="flex flex-col space-y-1">
                        <label class="text-sm font-semibold text-gray-600">Mail From Name</label>
                        <input type="text" name="MAIL_FROM_NAME"
                            value="{{ str_replace('"', '', env('MAIL_FROM_NAME')) }}"
                            class="px-4 py-2 border border-gray-300 rounded-md outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="e.g. My Awesome Blog">
                    </div>

                    <div class="flex flex-col space-y-1">
                        <label class="text-sm font-semibold text-gray-600">Mail From Address</label>
                        <input type="email" name="MAIL_FROM_ADDRESS" value="{{ env('MAIL_FROM_ADDRESS') }}"
                            class="px-4 py-2 border border-gray-300 rounded-md outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="noreply@domain.com">
                    </div>
                </div>

                <div class="pt-4 text-center">
                    <button type="submit"
                        class="w-full md:w-auto px-10 py-2.5 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg shadow-md transition duration-200">
                        Save Configuration
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
