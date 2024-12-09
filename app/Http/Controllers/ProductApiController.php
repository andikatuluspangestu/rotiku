<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    // 1. Menampilkan Semua Produk
    public function index()
    {
        return response()->json(Product::all(), 200);
    }

    // 2. Menambahkan Produk Baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'category' => 'required|string',
        ]);

        $product = Product::create($validatedData);

        return response()->json($product, 201);
    }

    // 3. Menampilkan Produk Berdasarkan ID
    public function show($id)
    {
        $product = Product::find($id);

        if ($product) {
            return response()->json($product, 200);
        }

        return response()->json(['message' => 'Product not found'], 404);
    }

    // 4. Memperbarui Produk
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->update($request->all());
            return response()->json($product, 200);
        }

        return response()->json(['message' => 'Product not found'], 404);
    }

    // 5. Menghapus Produk
    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();
            return response()->json(['message' => 'Product deleted'], 200);
        }

        return response()->json(['message' => 'Product not found'], 404);
    }
}

