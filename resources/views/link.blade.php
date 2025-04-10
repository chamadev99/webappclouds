<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Menu') }}
        </h2>
    </x-slot>

    <div class="p-6 bg-gray-100 min-h-screen">
        @if (session('error'))
            <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-400 rounded">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 border border-green-400 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex items-center justify-between mb-4">
            <div>
                <form method="GET" action="{{ route('filter') }}" id="filterForm">
                    <select name="category" id="categorySelect">
                        <option value="">All Categories</option>
                        @foreach ($data as $category)
                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    <button type="submit">Filter</button>
                </form>

            </div>


        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-md">
                <thead class="bg-blue-600 text-back">
                    <tr>
                        <th class="px-4 py-2 text-left"> S.No</th>
                        <th class="px-4 py-2 text-left">Image</th>
                        <th class="px-4 py-2 text-left">Name</th>
                        <th class="px-4 py-2 text-left">Category</th>
                        <th class="px-4 py-2 text-left"> Price</th>
                        <th class="px-4 py-2 text-left">Description</th>
                        <th class="px-4 py-2 text-left">Qty</th>
                        <th class="px-4 py-2 text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $index => $item)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-4 py-2">{{ $index + 1 }}</td>
                            <td class="px-4 py-2">{{ $item['img'] ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ $item['name'] ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ $item['category'] ?? 'Unknown' }}</td>
                            <td class="px-4 py-2">${{ $item['price'] ?? '0.00' }}</td>
                            <td class="px-4 py-2">{{ $item['description'] ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ $item['quantity'] ?? '0' }}</td>
                            <td>
                                <a href="{{ route('sync-record.view', $item['id']) }}"
                                    class="inline-block px-2 py-1 bg-green-500 text-white text-xs rounded hover:bg-yellow-600">
                                    Sync
                                </a>

                                <a href="{{ route('menu.edit', $item['id']) }}"
                                    class="inline-block px-2 py-1 bg-yellow-500 text-white text-xs rounded hover:bg-yellow-600">
                                    Edit
                                </a>

                                <a href="{{ route('menu.delete', $item['id']) }}"
                                    class="inline-block px-2 py-1 bg-delete-500 text-white text-xs rounded hover:bg-yellow-600">
                                    delete
                                </a>

                                <a href="{{ route('menu.show', $item['id']) }}"
                                    class="inline-block px-2 py-1 bg-purple-500 text-white text-xs rounded hover:bg-yellow-600">
                                    View
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-2 text-center text-gray-500">
                                No items found for this category.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
