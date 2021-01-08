<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-label for="name" :value="__('Name')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        </div>

                        <!-- Devices -->
                        @if($devices->count())
                            <div class="mt-4">
                                <x-label for="device_id" :value="__('Device')" />
                                <select name="device_id" id="device_id" class="block mt-1 w-full" required>
                                    @foreach ($devices as $device)
                                        <option value={{$device->id}}>{{ $device->name }}</option>
                                    @endforeach 
                                        <option value="" selected></option>
                                </select>
                            </div>
                        @else
                            <div class="mt-4">
                                <div class="block mt-1 w-full text-red-500">All devices already in use. Pres F5 to check again</div>
                            </div>
                        @endif

                        <div class="mt-4">
                            <x-label for="is_admin" :value="__('Is Admin')" />
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio" name="is_admin" value="1">
                                    <span class="ml-2">Yes</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio" name="is_admin" value="0" checked>
                                    <span class="ml-2">No</span>
                                </label>
                            </div>
                        </div>

                        <div class="mt-4">
                            <x-label for="is_active" :value="__('Is Active')" />
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio" name="is_active" value="1" checked>
                                    <span class="ml-2">Yes</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio" name="is_active" value="0">
                                    <span class="ml-2">No</span>
                                </label>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-label for="password" :value="__('Password')" />

                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Create') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>