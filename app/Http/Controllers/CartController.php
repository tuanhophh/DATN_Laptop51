<?php

namespace App\Http\Controllers;
// use Gloudemans\Shoppingcart\Cart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Session\Session;

class CartController extends Controller
{
    public function saveCart(Request $request)
    {
        $id = $request->id;
        $quantity = $request->qly;
        //        dd($productId);
        $product = DB::table('products')->where('id', $id)->first();
        //        Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        //        dd($product);
        $data['id'] = $product->id;
        $data['qty'] = $quantity;
        $data['name'] = $product->name;
        $data['price'] = $product->price;
        $data['weight'] = '50';
        $data['options']['image'] = $product->image;
        Cart::add($data);
        // dd($data);
        return Redirect::to('/gio-hang');
    }
    public function add(Request $request)
    {
        $id = $request->id;
        $quantity = $request->qly;
        //        dd($productId);
        $product = DB::table('products')->where('id', $id)->first();
        //        Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        //        dd($product);
        $data['id'] = $product->id;
        $data['qty'] = $quantity;
        $data['name'] = $product->name;
        $data['price'] = $product->price;
        $data['weight'] = '50';
        $data['options']['image'] = $product->image;
        Cart::add($data);
        // dd($data)
        return back()->with('success', 'Thêm vào giỏ thành công');
    }
    public function showCart()
    {
        $cate_product = DB::table('product');
        $user_id = Auth::id();
        $totalBill = str_replace(',', ',', Cart::subtotal(0));
        //    $totalBill = str_replace(',', '', Cart::subtotal(0)) * 100;
        return view('website.cart', compact('totalBill'));
    }
    public function deleteToCart($rowId)
    {
        Cart::update($rowId, 0);
        return Redirect::to('/gio-hang');
    }
    public function updateCartQuantity(Request $request)
    {
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        $content = Cart::content();
        // dd(count(Cart::content()));
        if (count(Cart::content()) == 0) {
            Cart::destroy();
            return redirect()->to('/gio-hang');
        }
        Cart::update($rowId, $qty);
        // dd(Cart::update($rowId, $qty));

        return Redirect::to('/gio-hang');
    }
}