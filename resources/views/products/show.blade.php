@extends('layouts.app')

@section('title', $product['name'])

@section('content')
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="md:flex">
            <!-- Product Image -->
            <div class="md:w-1/2">
                <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-96 object-cover">
            </div>

            <!-- Product Info -->
            <div class="md:w-1/2 p-8">
                <div class="mb-4">
                    <h1 class="text-3xl font-bold mb-2">{{ $product['name'] }}</h1>
                    <p class="text-2xl text-blue-600 font-bold mb-4">${{ number_format($product['price'], 2) }}</p>
                </div>

                <div class="mb-6">
                    <h2 class="text-xl font-semibold mb-2">Description</h2>
                    <p class="text-gray-600">{{ $product['long_description'] }}</p>
                </div>

                <div class="mb-6">
                    <h2 class="text-xl font-semibold mb-2">Specifications</h2>
                    <div class="grid grid-cols-2 gap-4">
                        @foreach ($product['specifications'] as $label => $value)
                            <div>
                                <span class="font-medium">{{ $label }}:</span>
                                <span class="text-gray-600">{{ $value }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="flex space-x-4">
                    <a href="{{ route('products.edit', $product['id']) }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">
                        Edit Product
                    </a>
                    <form action="{{ route('products.destroy', $product['id']) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded"
                            onclick="return confirm('Are you sure you want to delete this product?')">
                            Delete Product
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- resources/views/products/index.blade.php -->
