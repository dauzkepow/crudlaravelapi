<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

// import model Product
use App\Models\Product;

// import resource ProductResource
use App\Http\Resources\ProductResource;

// import request = agar bisa terima request dari user
use Illuminate\Http\Request;

// import validator = validasi data
use Illuminate\Support\Facades\Validator;



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

    // insert data = store()
    public function store(Request $request)
    {
        // validasi data
        $validator = Validator::make($request->all(), [
            'image'         => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'title'         => 'required',
            'description'   => 'required',
            'price'         => 'required|numeric',
            'stock'         => 'required|numeric',
        ]);

        // check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // upload image dengan storeAs()
        $image = $request->file('image');
        $image->storeAs('products', $image->hashName());

        // create product menggunakan model Product
        $product = Product::create([
            'image' => $image->hashName(),
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        // response JSON
        return new ProductResource(true, 'Data Product Berhasil Ditambahkan!', $product);

    }

    // show(), detail data by id
    public function show($id)
    {
        // get data by id
        $product = Product::find($id);

        // parsing variabel $product ke dalam resource ProductResource
        return new ProductResource(true, 'Detail Data Product!', $product);
    }
}
