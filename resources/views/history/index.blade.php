<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('History') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    History
                    <a href="{{route('histories.create')}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded float-right">Add</a>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    @include('partials.users_devices_history')
                </div>
            </div>
        </div>
    </div>
   {{ $history->links() }}
</x-app-layout>