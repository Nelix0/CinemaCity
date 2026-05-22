<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;


class WebController extends Controller
{
    public function index(){
        $products = DB::table('products')->inRandomOrder()->limit(3)->get();
        $sales = DB::table('sales')->get();
        return view('index', compact('products', 'sales'));
    }

    public function about(){
        return view('about');
    }

    public function account(){
        return view('account');
    }


    public function feedbacks(){
        $feedbacks = DB::table('feedbacks')->latest()->get();

        return view('feedbacks', compact('feedbacks'));
    }



    public function feedback_form(Request $request)
    {
        DB::table('feedbacks')->insert([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'rating' => $request->rating,
            'text' => $request->text,
            'created_at' => now(),
        ]);

        return redirect()->back();
    }


    public function articles(){
        $articles = DB::table('articles')->get();
        return view('articles', compact('articles'));
    }

    public function contacts(){
        return view('contacts');
    }



    public function catalog(Request $request)
    {
        $products = DB::table('products');

        if ($request->category == 'wardrobes') {
            $products->where('type', 'шкаф-купе');
        }

        if ($request->category == 'dressing-rooms') {
            $products->where('type', 'гардеробная');
        }

        if ($request->sort == 'asc') {
            $products->orderBy('price', 'asc');
        }

        if ($request->sort == 'desc') {
            $products->orderBy('price', 'desc');
        }

        $products = $products->get();

        return view('catalog', compact('products'));
    }

    public function show($id)
    {
        $product = DB::table('products')->where('id', $id)->first();

        return view('show', compact('product'));
    }

    public function cart()
    {
        $cartItems = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', auth()->id())
            ->select(
                'cart.id',
                'cart.quantity',
                'products.title',
                'products.price',
                'products.img',
                'products.width',
                'products.height'
            )
            ->get();

        $total = 0;

        foreach ($cartItems as $item) {
            $total += $item->price * $item->quantity;
        }

        return view('cart', compact('cartItems', 'total'));
    }

    public function cart_remove($id)
    {
        DB::table('cart')->where('id', $id)->delete();

        return redirect()->back();
    }

    public function buy_cart()
    {
        $cartItems = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', auth()->id())
            ->select(
                'cart.quantity',
                'products.id as product_id',
                'products.title',
                'products.price'
            )
            ->get();

        foreach ($cartItems as $item) {
            DB::table('orders')->insert([
                'user_id' => auth()->id(),
                'product_id' => $item->product_id,
                'price' => $item->price,
                'quantity' => $item->quantity,
                'created_at' => now()
            ]);
        }

        DB::table('cart')
            ->where('user_id', auth()->id())
            ->delete();

        return redirect()->route('user')->with('success', 'Заказ оформлен');
    }

    public function cart_update(Request $request, $id)
    {
        DB::table('cart')
            ->where('id', $id)
            ->update([
                'quantity' => $request->quantity
            ]);

        return redirect()->back();
    }

    public function cart_add(Request $request, $id)
    {
        DB::table('cart')->insert([
            'user_id' => auth()->id(),
            'product_id' => $id,
        ]);

        return redirect()->back();
    }

    public function buy($id)
    {
        $product = DB::table('products')->where('id', $id)->first();

        DB::table('orders')->insert([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'quantity' => 1,
            'price' => $product->price,
            'status' => 'new',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Товар добавлен в заказы');
    }

    public function repeatOrder($id)
    {
        $order = DB::table('orders')->where('id', $id)->first();

        DB::table('orders')->insert([
            'user_id' => auth()->id(),
            'product_id' => $order->product_id,
            'quantity' => $order->quantity,
            'price' => $order->price,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back();
    }



    public function user()
    {
        $orders = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->where('orders.user_id', auth()->id())
            ->select('orders.*', 'products.title')
            ->get();

        return view('user', compact('orders'));
    }




    public function products()
    {
        $products = DB::table('products')->get();
        return view('admin.products', compact('products'));
    }

    public function delete($id)
    {
        DB::table('products')->where('id', $id)->delete();

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        DB::table('products')->where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'type' => $request->type,
            'material' => $request->material,
            'width' => $request->width,
            'height' => $request->height,
            'img' => $request->img,
        ]);

        return redirect()->back();
    }

    public function add(Request $request)
    {
        DB::table('products')->insert([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'type' => $request->type,
            'material' => $request->material,
            'width' => $request->width,
            'height' => $request->height,
            'img' => $request->img,
            'created_at' => now(),

        ]);

        return redirect()->back();
    }


    public function sales()
    {
        $sales = DB::table('sales')->get();
        return view('admin.sales', compact('sales'));
    }

    public function deleteSales($id)
    {
        DB::table('sales')->where('id', $id)->delete();

        return redirect()->back();
    }

    public function updateSales(Request $request, $id)
    {
        DB::table('sales')->where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'old_price' => $request->old_price,
            'type' => $request->type,
            'material' => $request->material,
            'width' => $request->width,
            'height' => $request->height,
            'img' => $request->img,
        ]);

        return redirect()->back();
    }

    public function addSales(Request $request)
    {
        DB::table('sales')->insert([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'old_price' => $request->old_price,
            'type' => $request->type,
            'material' => $request->material,
            'width' => $request->width,
            'height' => $request->height,
            'img' => $request->img,
            'created_at' => now(),

        ]);

        return redirect()->back();
    }



    public function articlesAdmin()
    {
        $articles = DB::table('articles')->get();
        return view('admin.articlesAdmin', compact('articles'));
    }

    public function deleteArticle($id)
    {
        DB::table('articles')->where('id', $id)->delete();
        return redirect()->back();
    }

    public function updateArticle(Request $request, $id)
    {
        DB::table('articles')->where('id', $id)->update([
            'title' => $request->title,
            'text' => $request->text,

        ]);

        return redirect()->back();
    }

    public function addArticle(Request $request)
    {

        DB::table('articles')->insert([
            'title' => $request->title,
            'text' => $request->text,
            'created_at' => now(),

        ]);

        return redirect()->back();
    }



    public function deleteFeedback($id)
    {
        DB::table('feedbacks')->where('id', $id)->delete();

        return redirect()->back();
    }

    public function feedbacksAdmin()
    {
        $feedbacks = DB::table('feedbacks')->orderBy('id', 'desc')->get();

        return view('admin.feedbacksAdmin', compact('feedbacks'));
    }

}
