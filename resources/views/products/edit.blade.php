@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold mb-6">Edit Product</h1>

        <form action="{{ route('products.update', $product['id']) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="space-y-4">
                <div>
                    <label class="block text-gray-700">Name</label>
                    <input type="text" name="name" value="{{ $product['name'] }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                </div>

                <div>
                    <label class="block text-gray-700">Description</label>
                    <textarea name="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>{{ $product['description'] }}</textarea>
                </div>

                <div>
                    <label class="block text-gray-700">Price</label>
                    <input type="number" step="0.01" name="price" value="{{ $product['price'] }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                </div>

                <div>
                    <label class="block text-gray-700">Long Description</label>
                    <textarea name="long_description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>{{ $product['long_description'] }}</textarea>
                </div>

                <div>
                    <label class="block text-gray-700">Stock</label>
                    <input type="number" name="stock" value="{{ $product['stock'] }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                </div>

                <div>
                    <label class="block text-gray-700">Category</label>
                    <input type="text" name="category" value="{{ $product['category'] }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                </div>

                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    Update Product
                </button>
            </div>
        </form>
    </div>
@endsection

<!-- resources/views/products/show.blade.php -->
