<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $menu->name }} Details
        </h2>
    </x-slot>

    <div class="p-6 bg-gray-100 min-h-screen">
        <div class="max-w-3xl mx-auto bg-white rounded shadow p-6">
            <div class="mb-4 text-center">
                @if ($menu->image)
                    <img src="{{ $menu->image }}" alt="{{ $menu->name }}" class="h-48 w-auto mx-auto rounded">
                @else
                    <p class="text-gray-400">No image available</p>
                @endif
            </div>

            <div class="space-y-3 text-gray-700">
                <p><strong>Name:</strong> {{ $menu->name }}</p>
                <p><strong>Category:</strong> {{ $menu->category }}</p>
                <p><strong>Price:</strong> ${{ number_format($menu->price, 2) }}</p>
                <p><strong>Description:</strong> {{ $menu->description }}</p>
                <p><strong>Quantity:</strong> {{ $menu->qty }}</p>
                <p><strong>API ID:</strong> {{ $menu->api_id }}</p>
            </div>


        </div>
    </div>
</x-app-layout>
