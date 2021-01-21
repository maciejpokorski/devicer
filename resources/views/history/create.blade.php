<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('History Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('histories.store') }}">
                        @csrf

                        <!-- Devices -->
                        @if($devices->count())
                            <div class="mt-4">
                                <x-label for="device_id" :value="__('Device')" />
                                <select name="device_id" id="device_id" class="block mt-1 w-full" required>
                                    @foreach ($devices as $device)
                                        <option value={{$device->id}}>{{ $device->name }}</option>
                                    @endforeach 
                                </select>
                            </div>
                        @else
                            <div class="mt-4">
                                <div class="block mt-1 w-full text-red-500">All devices already in use. Pres F5 to check again</div>
                            </div>
                        @endif

                        <!-- Users -->
                        @if($users->count())
                            <div class="mt-4">
                                <x-label for="user_id" :value="__('User')" />
                                <select name="user_id" id="user_id" class="block mt-1 w-full" required>
                                    @foreach ($users as $user)
                                        <option value={{$user->id}}>{{ $user->name }}</option>
                                    @endforeach 
                                </select>
                            </div>
                        @else
                            <div class="mt-4">
                                <div class="block mt-1 w-full text-red-500">All users already in use. Pres F5 to check again</div>
                            </div>
                        @endif

                        <div class="mt-4">
                            <x-label for="created_at" :value="__('Start')" />
                            <div>
                                <input type="datetime-local" id="created_at"
                                    name="created_at" value="{{ date('Y-m-d\TH:i:s') }}"> 
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <x-label for="updated_at" :value="__('End')" />
                            <div>
                                <input type="datetime-local" id="updated_at"
                                    name="updated_at" value="{{ date('Y-m-d\TH:i:s') }}"> 
                            </div>
                        </div>

                        <!-- Millage old -->
                        <div class="mt-4">
                            <x-label for="millage_old" :value="__('Millage before')" />

                            <x-input id="millage_old" class="block mt-1 w-full" type="number" min="0" name="millage_old" :value="old('millage_old')" required />
                        </div>

                        <!-- Millage new -->
                        <div class="mt-4">
                            <x-label for="millage_new" :value="__('Millage after')" />

                            <x-input id="millage_new" class="block mt-1 w-full" type="number" min="0" name="millage_new" :value="old('millage_new')" required />
                        </div>

                          <!-- Note -->
                        <div class="mt-4">
                            <x-label for="note" :value="__('Note')" />

                            <x-input id="note" class="block mt-1 w-full" type="text" name="note" :value="old('note')"/>
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