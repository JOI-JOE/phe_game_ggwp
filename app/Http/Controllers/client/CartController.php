<?php

namespace App\Http\Controllers\client;

use App\Helpers\CartManagement;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function updateTotal()
    {
        $cartCount = count(CartManagement::getCartItemsFromCookie());
        return response()->json([
            'status'   => true,
            'data' => $cartCount
        ]);
    }


    public function index()
    {
        return view('client.buy-product.cart');
    }
    public function addToCart(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'variant' => 'required',
            'quantity' => 'required|min:1',
        ]);

        if ($validator->passes()) {
            // $total_count = CartManagement::addItemCartWitVariant($request->product_id, $request->quantity, $request->variant);
            return response()->json(data: [
                'status' => true,
                'message' => 'thêm thành công'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'data'   =>  $request->all()
            ]);
        }
    }
}
