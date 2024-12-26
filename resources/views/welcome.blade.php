@extends('layouts.app')

@section('title', 'Welcome to Your Store')

@section('content')
    <!-- Hero Section -->
    <div class="bg-gray-800 text-white py-16 -mx-4">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold mb-4">Welcome to Your Store</h1>
            <p class="text-xl mb-8">Discover our amazing products at great prices</p>
            <a href="{{ route('products.index') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-lg">
                Shop Now
            </a>
        </div>
    </div>

    <!-- Top Products Section -->
    <div class="py-12">
        <h2 class="text-3xl font-bold text-center mb-8">Featured Products</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <a href="{{ route('products.show', $product['id']) }}">
                        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold mb-2">{{ $product['name'] }}</h3>
                            <p class="text-gray-600 mb-2">{{ $product['description'] }}</p>
                            <div class="flex justify-between items-center">
                                <span
                                    class="text-xl font-bold text-blue-600">${{ number_format($product['price'], 2) }}</span>
                                <span class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                                    View Details
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Features Section -->
    <div class="bg-gray-200 py-12 -mx-4">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="text-3xl mb-4">🚚</div>
                    <h3 class="text-xl font-semibold mb-2">Free Shipping</h3>
                    <p class="text-gray-600">On orders over $50</p>
                </div>
                <div class="text-center">
                    <div class="text-3xl mb-4">⭐</div>
                    <h3 class="text-xl font-semibold mb-2">Best Quality</h3>
                    <p class="text-gray-600">100% guarantee</p>
                </div>
                <div class="text-center">
                    <div class="text-3xl mb-4">🔒</div>
                    <h3 class="text-xl font-semibold mb-2">Secure Payments</h3>
                    <p class="text-gray-600">100% secure checkout</p>
                </div>
            </div>
        </div>
    </div>
@endsection
