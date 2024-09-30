<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $products = Product::all();
        return view('client.index', compact('products'));
    }

    public function search(Request $request)
    {
        // Perform the search
        $searchValue = '';
        if (!empty($request->searchTerm)) {
            $searchValue = Product::where('name', 'like', '%' . $request->searchTerm . '%')->get();
        }
        return response()->json([
            'data' => $searchValue,
            'total' => $searchValue->count(), // Optional: Include total count for pagination
        ]);
        // return $searchValue;
    }

    public function contact()
    {
        return view('client.contact');
    }

    public function products()
    {
        $products = Product::where('not_allow_promotion', 1)->get();

        $total = count($products);
        return view('client.product', compact('products', 'total'));
    }
    public function login()
    {
        return view('client.account.login');
    }
    public function register()
    {
        return view('client.account.register');
    }

    public function detail_product($handle)
    {

        $product = Product::where('handle', $handle)->first();
        $product_variant = ProductVariant::where('product_id', $product->id)->get();
        // dump($product, $product_variant);
        return view('client.detail-product', compact('product', 'product_variant'));
    }

    public function cart()
    {
        return view('client.buy-product.cart');
    }
}
