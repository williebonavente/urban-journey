@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Shoppeelifts</h1>
        <a href="{{ route('shoppeelifts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Create New Shoppeelift</a>
        <ul class="mt-4">
            @foreach($shoppeelifts as $shoppeelift)
                <li class="bg-white shadow-md rounded-lg p-4 mb-4 flex justify-between items-center">
                    <div>
                        <h2 class="text-xl font-semibold">{{ $shoppeelift->name }}</h2>
                        <p>{{ $shoppeelift->description }}</p>
                    </div>
                    <div class="flex space-x-2">
                        <a href="{{ route('shoppeelifts.edit', $shoppeelift->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-700">Edit</a>
                        <form action="{{ route('shoppeelifts.destroy', $shoppeelift->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="mt-4">
            {{ $shoppeelifts->links() }}
        </div>
    </div>
@endsection