<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::with('images')->get());
    }

    public function show(string $id)
    {
        return response()->json(Product::with('images')->findOrFail($id));
    }
}
