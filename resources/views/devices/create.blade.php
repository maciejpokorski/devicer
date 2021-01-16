<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Device Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('devices.store') }}">
                        @csrf

                        <!-- Model -->
                        <div>
                            <x-label for="model" :value="__('Model')" />

                            <x-input id="model" class="block mt-1 w-full" type="text" name="model" :value="old('model')" required autofocus />
                        </div>

                        <!-- Destination -->
                        <div class="mt-4">
                            <x-label for="destination" :value="__('Destination')" />

                            <x-input id="destination" class="block mt-1 w-full" type="text" name="destination" :value="old('destination')" required />
                        </div>

                        <!-- Serial number -->
                        <div class="mt-4">
                            <x-label for="serial_number" :value="__('Serial Number')" />

                            <x-input id="serial_number" class="block mt-1 w-full" type="text" name="serial_number" :value="old('serial_number')" required />
                        </div>

                        <!-- Name -->
                        <div class="mt-4">
                            <x-label for="name" :value="__('Name')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
                        </div>

                        <!-- Is accesable -->
                        <div class="mt-4">
                               <x-label for="is_accesable" :value="__('Is Accesable')" />
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio" name="is_accesable" value="1" checked>
                                    <span class="ml-2">Yes</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio" name="is_accesable" value="0">
                                    <span class="ml-2">No</span>
                                </label>
                            </div>
                        </div>

                        <div class="mt-4">
                            <x-label for="inspection_time" :value="__('Inspection Time')" />
                            <div>
                                <input type="datetime-local" id="inspection_time"
                                    name="inspection_time" value="{{ date('Y-m-d\TH:i:s') }}"> 
                            </div>
                        </div>

                        <!-- Registration Number -->
                        <div class="mt-4">
                            <x-label for="registration_number" :value="__('Registration Number')" />

                            <x-input id="registration_number" class="block mt-1 w-full" type="text" name="registration_number" :value="old('registration_number')" required />
                        </div>
                        
                        <!-- Millage -->
                        <div class="mt-4">
                            <x-label for="millage" :value="__('Millage')" />

                            <x-input id="millage" class="block mt-1 w-full" type="number" min="0" name="millage" :value="old('millage')" required />
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