<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() : object
    {
        return product::all();
    }

    public function store(Request $request) : JsonResponse
    {
        $product = product::create($request->all());
        return response()->json($product, 201);
    }

    public function destroy($id) : JsonResponse
    {
        product::destroy($id);
        return response()->json(null, 204);
    }
}
