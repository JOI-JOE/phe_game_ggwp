<?php

namespace App\Helpers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;

class CartManagement
{

    static public function addItemToCart($product_id)
    {
        /*
        Kiểm tra card đã tồn tại chưa / Nếu rồi thì tăng quantity cho cái cart đó
        */


        $cart_items = self::getCartItemsFromCookie();

        $existing_item = null;

        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                $existing_item = $key;
                break;
            }
        }

        if ($existing_item !== null) {
            $cart_items[$existing_item]['quantity']++;

            $cart_items[$existing_item]['total_amount'] = $cart_items[$existing_item]['quantity'] * $cart_items[$existing_item]['unit_amount'];
        } else {
            $product = Product::where('id', $product_id)->first(['id', 'name', 'price', 'feature_image']);

            if ($product) {
                $cart_items[] = [
                    'product_id' => $product_id,
                    'name'       => $product->name,
                    'image'      => '',
                    'quantity'   => 1,
                    'unit_amount' => $product->price,
                    'total_amount' => $product->price
                ];
            }
        }
        self::addCartItemsToCookie($cart_items);
        return count($cart_items);
    }
    /*
    json_decode trong đoạn code này có 
    vai trò giải mã chuỗi JSON thành một đối tượng PHP.
    */
    static public function addCartItemsToCookie($cart_items)
    {
        Cookie::queue('cart_items', json_decode($cart_items), 60 * 24 * 30);
    }
    static public function getCartItemsFromCookie()
    {
        $cart_items = Cookie::get('cart_items') ? Cookie::get('cart_items') : '';

        if (!$cart_items) {
            $cart_items = [];
        }

        return $cart_items;
    }
}
