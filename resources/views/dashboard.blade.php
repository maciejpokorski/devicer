<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in since <b>{{ $last_login }}</b>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    Your device is <b>{{ Auth::user()->device->name }}</b>
                </div>
                <div class="p-6 bg-white border-b border-gray-200 flex justify-between">
                    @if($note)
                    <div>
                        Twoja notatka: <b><a href="{{ route('notes.edit', $note->id)}}">{{ $note->text}}</a></b>
                    </div>
                    <div>
                        <form action="{{ route('notes.destroy', $note->id) }}" method="POST">
                            <a href="{{route('notes.edit', $note->id)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 bg-transparent text-2xl font-semibold leading-none right-0 top-0 outline-none focus:outline-none">
                                <span>×</span>
                            </button>
                        </form>
                    </div>
                    @else
                    <b><a href="{{ route('notes.create')}}">Create note</a></b>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>