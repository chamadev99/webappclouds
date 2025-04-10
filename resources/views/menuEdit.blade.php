<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Menu Item: {{ $menu->name }}
        </h2>
    </x-slot>

    <div class="p-6 bg-gray-100 min-h-screen">
        <div class="max-w-2xl mx-auto bg-white rounded shadow p-6">
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 border border-green-400 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-400 rounded">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-400 rounded">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form method="POST" action="{{ route('menu.update', $menu->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">App ID</label>
                    <input type="text" name="api_id" value="{{ $menu->api_id }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" readonly />
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" value="{{ old('name', $menu->name) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" />
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Category</label>
                    <input type="text" name="category" value="{{ old('category', $menu->category) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" />
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price', $menu->price) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" />
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">{{ old('description', $menu->description) }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Image URL</label>
                    <input type="text" name="image" value="{{ old('image', $menu->image) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" />
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700">Quantity</label>
                    <input type="number" name="quantity" value="{{ old('quantity', $menu->qty) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" />
                </div>

                <div class="flex justify-between items-center">

                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
