<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = [
            [
                "id"       => 1,
                "nama"     => "Sepeda MTB Polygon Siskiu T5",
                "kategori" => "MTB",
                "harga"    => 4500000,
                "stok"     => 8,
            ],
            [
                "id"       => 2,
                "nama"     => "Sepeda Lipat Dahon Speed D8",
                "kategori" => "Lipat",
                "harga"    => 6200000,
                "stok"     => 5,
            ],
            [
                "id"       => 3,
                "nama"     => "Sepeda Road Polygon Helios C3",
                "kategori" => "Road",
                "harga"    => 8900000,
                "stok"     => 3,
            ],
        ];

        return response()->json($products);
    }

    public function show($id)
    {
        $product = [
            "id"       => $id,
            "nama"     => "Sepeda MTB Polygon Siskiu T5",
            "kategori" => "MTB",
            "harga"    => 4500000,
            "stok"     => 8,
        ];

        return response()->json($product);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama'     => 'required|string|max:100',
                'kategori' => 'required|string|max:50',
                'harga'    => 'required|numeric|min:0',
                'stok'     => 'required|integer|min:0',
            ]);
        } catch (\Illuminate\Validation\ValidationException $th) {
            return response()->json([
                "message" => "Validation failed",
                "errors"  => $th->validator->errors()
            ], 422);
        }

        return response()->json([
            "message" => "Product created successfully",
            "data"    => $validated
        ], 201);
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'nama'     => 'sometimes|required|string|max:100',
                'kategori' => 'sometimes|required|string|max:50',
                'harga'    => 'sometimes|required|numeric|min:0',
                'stok'     => 'sometimes|required|integer|min:0',
            ]);
        } catch (\Illuminate\Validation\ValidationException $th) {
            return response()->json([
                "message" => "Validation failed",
                "errors"  => $th->validator->errors()
            ], 422);
        }

        return response()->json([
            "message" => "Product {$id} updated successfully",
            "data"    => array_merge(['id' => $id], $validated)
        ]);
    }

    public function destroy($id)
    {
        return response()->json([
            "message" => "Product {$id} deleted successfully"
        ]);
    }
}

   