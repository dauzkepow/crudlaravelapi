<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

// import model Product
use App\Models\Product;

// import resource ProductResource
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    // index()
    public function index()
    {
        // get data dari database melalui Model Product
        $products = Product::latest()->paginate(5);

        // parsing variabel $products ke dalam resource ProductResource
        return new ProductResource(true, 'List Data Product', $products);
    }
}
