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
}
