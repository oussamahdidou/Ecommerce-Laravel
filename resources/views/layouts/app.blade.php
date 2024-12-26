<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Your Store')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="text-xl font-semibold text-gray-800">
                    <a href="/">Your Store</a>
                </div>
                <div class="space-x-4">
                    <a href="/" class="text-gray-600 hover:text-gray-800">Home</a>
                    <a href="{{ route('products.index') }}" class="text-gray-600 hover:text-gray-800">Products</a>
                    <a href="{{ route('products.create') }}" class="text-gray-600 hover:text-gray-800">Add Product</a>
                </div>
            </div>
        </div>
    </nav>



    <!-- Main Content -->
    <main class="max-w-6xl mx-auto px-4 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="max-w-6xl mx-auto px-4">
            <p class="text-center">&copy; 2024 Your Store. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>
