<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sync') }}
        </h2>
    </x-slot>

    <div>
        <div class="p-6 bg-gray-100 min-h-screen">

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-400 rounded">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="flex items-center justify-between mb-4">
                <div>
                    <form method="POST" action="{{ route('sync') }}"
                        class="bg-white p-6 rounded-lg shadow-md w-full max-w-sm">
                        @csrf
                        <!-- Category Dropdown -->
                        <div class="mb-4">
                            <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                            <select name="category" id="category"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-500">
                                <option value="">All Categories</option>
                                @foreach ($data as $category)
                                    <option value="{{ $category->name }}"
                                        {{ request('category') == $category->name ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="api_id" class="block text-sm font-medium text-gray-700 mb-1">ID</label>
                            <input type="text" name="api_id" id="api_id" value="{{ $items['id'] ?? '' }}"
                                placeholder="Enter item api_id"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-500" />
                        </div>

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                            <input type="text" name="name" id="name" value="{{ $items['name'] ?? '' }}"
                                placeholder="Enter item name"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-500" />
                        </div>

                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price</label>
                            <input type="text" name="price" id="price" value="{{ $items['price'] ?? '' }}"
                                placeholder="Enter item price"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-500" />
                        </div>

                        <div class="mb-4">
                            <label for="description"
                                class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <input type="text" name="description" id="description"
                                value="{{ $items['description'] ?? '' }}" placeholder="Enter item description"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-500" />
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Image</label>
                            <input type="text" name="image" id="image" value="{{ $items['image'] ?? '' }}"
                                placeholder="Enter item image"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-500" />
                        </div>

                        <div class="mb-4">
                            <label for="quantity" class="block text-sm font-medium text-gray-700 mb-1">Quantity</label>
                            <input type="text" name="quantity" id="quantity" value="{{ $items['quantity'] ?? '' }}"
                                placeholder="Enter item quantity"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-500" />
                        </div>


                        <!-- Submit Button -->
                        <div>
                            <button type="submit"
                                class="w-full px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                                Sync
                            </button>
                        </div>
                    </form>


                </div>

            </div>


        </div>

    </div>
</x-app-layout>
