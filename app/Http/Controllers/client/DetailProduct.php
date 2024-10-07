<?php

namespace App\Http\Controllers\client;

use App\Helpers\CartManagement;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class DetailProduct extends Controller
{
    public function show($handle)
    {
        dump(CartManagement::getCartItemsFromCookie());
        $product = Product::where('handle', $handle)->first();
        $product_variant = ProductVariant::where('product_id', $product->id)->get();
        // dump($product, $product_variant);
        return view('client.detail-product', compact('product', 'product_variant'));
    }
}
