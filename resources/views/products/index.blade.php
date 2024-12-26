<!-- resources/views/products/index.blade.php -->
@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Products</h1>
        <a href="{{ route('products.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
            Add New Product
        </a>
    </div>

    <!-- Products Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($products as $product)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <!-- Product Image -->
                <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-48 object-cover">

                <!-- Product Details -->
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2">{{ $product['name'] }}</h2>
                    <p class="text-gray-600 mb-4">{{ $product['description'] }}</p>

                    <!-- Price and Stock -->
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-xl font-bold text-blue-600">
                            ${{ number_format($product['price'], 2) }}
                        </span>
                        <span class="text-gray-500">
                            Stock: {{ $product['stock'] }}
                        </span>
                    </div>

                    <!-- Category -->
                    <div class="mb-4">
                        <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm">
                            {{ $product['category'] }}
                        </span>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-between items-center">
                        <a href="{{ route('products.show', $product['id']) }}"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                            View Details
                        </a>
                        <div class="space-x-2">
                            <a href="{{ route('products.edit', $product['id']) }}"
                                class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded">
                                Edit
                            </a>
                            <form action="{{ route('products.destroy', $product['id']) }}" method="POST"
                                class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded"
                                    onclick="return confirm('Are you sure you want to delete this product?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Empty State -->
    @if (count($products) === 0)
        <div class="text-center py-12">
            <div class="text-gray-500 mb-4">
                No products found
            </div>
            <a href="{{ route('products.create') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                Add Your First Product
            </a>
        </div>
    @endif

    <!-- Pagination (if needed) -->
    <div class="mt-8">
        {{-- Add pagination links here if you implement pagination --}}
    </div>
@endsection
