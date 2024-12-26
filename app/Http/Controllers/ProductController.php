<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $products = [
        '1' => [
            'id' => 1,
            'name' => 'Premium Wireless Headphones',
            'description' => 'High-quality wireless headphones',
            'price' => 199.99,
            'image' => 'https://placehold.co/600x400',
            'long_description' => 'Experience premium sound quality with our wireless headphones.',
            'specifications' => [
                'Battery Life' => '30 hours',
                'Connectivity' => 'Bluetooth 5.0',
                'Weight' => '250g',
                'Color' => 'Matte Black'
            ],
            'stock' => 10,
            'category' => 'Electronics'
        ],
        '2' => [
            'id' => 2,
            'name' => 'Smart Fitness Watch',
            'description' => 'Track your fitness goals with this advanced smartwatch',
            'price' => 149.99,
            'image' => 'https://placehold.co/600x400',
            'long_description' => 'Stay fit and connected with our smart fitness watch.',
            'specifications' => [
                'Battery Life' => '7 days',
                'Water Resistance' => 'IP68',
                'Display' => '1.4 inch AMOLED',
                'Color' => 'Space Gray'
            ],
            'stock' => 15,
            'category' => 'Electronics'
        ],
        '3' => [
            'id' => 3,
            'name' => 'Ergonomic Office Chair',
            'description' => 'Comfortable office chair with lumbar support',
            'price' => 249.99,
            'image' => 'https://placehold.co/600x400',
            'long_description' => 'Enhance your productivity with our ergonomic office chair.',
            'specifications' => [
                'Material' => 'Mesh and Foam',
                'Adjustability' => 'Height and tilt adjustable',
                'Weight Capacity' => '150kg',
                'Color' => 'Black'
            ],
            'stock' => 8,
            'category' => 'Furniture'
        ],
        '4' => [
            'id' => 4,
            'name' => '4K Ultra HD Smart TV',
            'description' => '55-inch Smart TV with stunning 4K visuals',
            'price' => 499.99,
            'image' => 'https://placehold.co/600x400',
            'long_description' => 'Immerse yourself in cinema-quality visuals with our 4K Smart TV.',
            'specifications' => [
                'Resolution' => '4K Ultra HD',
                'Size' => '55 inches',
                'Connectivity' => 'Wi-Fi, HDMI, USB',
                'Color' => 'Black'
            ],
            'stock' => 5,
            'category' => 'Electronics'
        ],
        '5' => [
            'id' => 5,
            'name' => 'Gaming Laptop',
            'description' => 'High-performance gaming laptop',
            'price' => 1299.99,
            'image' => 'https://placehold.co/600x400',
            'long_description' => 'Take your gaming to the next level with our powerful gaming laptop.',
            'specifications' => [
                'Processor' => 'Intel Core i7',
                'RAM' => '16GB DDR4',
                'Storage' => '512GB SSD',
                'Graphics' => 'NVIDIA RTX 3060',
                'Color' => 'Gunmetal Gray'
            ],
            'stock' => 7,
            'category' => 'Computers'
        ],
        '6' => [
            'id' => 6,
            'name' => 'Cordless Vacuum Cleaner',
            'description' => 'Lightweight and powerful vacuum cleaner',
            'price' => 179.99,
            'image' => 'https://placehold.co/600x400',
            'long_description' => 'Keep your home spotless with our cordless vacuum cleaner.',
            'specifications' => [
                'Battery Life' => '45 minutes',
                'Weight' => '2.5kg',
                'Attachments' => 'Crevice tool, dusting brush',
                'Color' => 'White'
            ],
            'stock' => 12,
            'category' => 'Home Appliances'
        ],
        '7' => [
            'id' => 7,
            'name' => 'Noise-Canceling Earbuds',
            'description' => 'Compact and comfortable earbuds with active noise cancelation',
            'price' => 99.99,
            'image' => 'https://placehold.co/600x400',
            'long_description' => 'Enjoy your music uninterrupted with our noise-canceling earbuds.',
            'specifications' => [
                'Battery Life' => '24 hours with charging case',
                'Connectivity' => 'Bluetooth 5.2',
                'Weight' => '50g',
                'Color' => 'Silver'
            ],
            'stock' => 20,
            'category' => 'Electronics'
        ],
        '8' => [
            'id' => 8,
            'name' => 'Smart Home Speaker',
            'description' => 'Voice-controlled smart home speaker',
            'price' => 79.99,
            'image' => 'https://placehold.co/600x400',
            'long_description' => 'Control your smart devices and enjoy music with our smart speaker.',
            'specifications' => [
                'Voice Assistant' => 'Compatible with Alexa and Google Assistant',
                'Audio Output' => '360-degree sound',
                'Connectivity' => 'Wi-Fi, Bluetooth',
                'Color' => 'Charcoal'
            ],
            'stock' => 18,
            'category' => 'Electronics'
        ]
    ];


    /**
     * Display a listing of products
     */
    public function index()
    {
        return view('products.index', [
            'products' => $this->products
        ]);
    }

    /**
     * Show form for creating a new product
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a new product
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'long_description' => 'required|string',
            'stock' => 'required|integer|min:0',
            'category' => 'required|string'
        ]);

        // Generate new ID
        $newId = count($this->products) + 1;

        // Create new product
        $this->products[$newId] = array_merge($validated, [
            'id' => $newId,
            'image' => 'https://placehold.co/600x400',
            'specifications' => []
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully');
    }

    /**
     * Display product details
     */
    public function show($id)
    {
        if (!isset($this->products[$id])) {
            abort(404);
        }

        return view('products.show', [
            'product' => $this->products[$id]
        ]);
    }

    /**
     * Show form for editing product
     */
    public function edit($id)
    {
        if (!isset($this->products[$id])) {
            abort(404);
        }

        return view('products.edit', [
            'product' => $this->products[$id]
        ]);
    }

    /**
     * Update product details
     */
    public function update(Request $request, $id)
    {
        if (!isset($this->products[$id])) {
            abort(404);
        }

        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'long_description' => 'required|string',
            'stock' => 'required|integer|min:0',
            'category' => 'required|string'
        ]);

        // Update product
        $this->products[$id] = array_merge(
            $this->products[$id],
            $validated
        );

        return redirect()->route('products.show', $id)
            ->with('success', 'Product updated successfully');
    }

    /**
     * Delete a product
     */
    public function destroy($id)
    {
        if (!isset($this->products[$id])) {
            abort(404);
        }

        unset($this->products[$id]);

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }

    /**
     * Get featured products for homepage
     */
    public function featured()
    {
        // For demo, return all products as featured
        return view('welcome', [
            'products' => $this->products
        ]);
    }
}
