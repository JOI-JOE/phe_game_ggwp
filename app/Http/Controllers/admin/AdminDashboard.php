<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminDashboard extends Controller
{
    public function index()
    {
        $totalProductsWithHotType = Product::join('types', 'products.type_id', '=', 'types.id')
            ->where('types.name', 'like', '%Hot%')
            ->count();

        $totalProductsWithNewType = Product::join('types', 'products.type_id', '=', 'types.id')
            ->where('types.name', 'like', '%Newest%')
            ->count();

        $totalUser = User::query()->where('active', 1)->count();

        $totalProduct = User::query()->count();

        return view('admin.dashboard', [
            'total_product_hot' => $totalProductsWithHotType,
            'total_product_new' => $totalProductsWithNewType,
            'total_user' => $totalUser,
            'total_product' => $totalProduct
        ]);
    }


    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
