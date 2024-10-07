<?php

namespace App\Helpers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;

class CartManagement
{
    static public function addItemCartWitVariant($product_id, $qty, $product_variant)
    {
        $cart_items =  self::getCartItemsFromCookie();
        $existing_item = null;

        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] ==  $product_id && $item['variant'] == $product_variant) {
                $existing_item = $key;
                break;
            }
        }

        if ($existing_item !== null) {
            $cart_items[$existing_item]['quantity']++;
            $cart_items[$existing_item]['total_amount'] = $cart_items[$existing_item]['quantity'] * $cart_items[$existing_item]['unit_amount'];
        } else {
            $product = Product::where('id', $product_id)->first(['id', 'name', 'price']);
            if ($product) {
                // $product_image = (is_array($product->images) ? $product->images[0] : 'https://kartinki.pibig.info/uploads/posts/2023-04/thumbs/1681693903_kartinki-pibig-info-p-kartinki-aegis-arti-vkontakte-31.jpg');
                $cart_items[] = [
                    'product_id'  => $product_id,
                    'name'        => $product->name,
                    'variant'        => $product_variant,
                    'quantity'    => $qty,
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
        Cookie::queue('cart_items', json_encode($cart_items), 60 * 24 * 30);
    }
    static public function getCartItemsFromCookie()
    {
        $cookie_data = json_decode(Cookie::get('cart_items'), true);

        if (!is_array($cookie_data)) {
            $cookie_data = [];
        }
        return $cookie_data;
    }
}
