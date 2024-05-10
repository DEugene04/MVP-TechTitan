<?php

namespace App\Http\Controllers;

use App\Models\foodMain;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FoodMainController extends Controller
{
    function add(){
        return view('addMenu');
    }

    function store(Request $request){
        $request->validate([
            'IDFoodMain' => ['required'],
            'NamaFoodMain' => ['required'],
            'HargaOriFoodMain' => ['required'],
            'JenisFoodMain' => ['required'],
            'FotoFoodMain' => ['required', 'image'],
            'DeskripsiFoodMain' => ['required'],
            'QuantityFoodMain'
        ]);

        $filename = $request->file('FotoFoodMain')->getClientOriginalName();
        $request->file('FotoFoodMain')->storeAs('public/'.$filename);

        foodMain::create([
            'IDFoodMain' => $request->IDFoodMain,
            'NamaFoodMain' => $request->NamaFoodMain,
            'HargaOriFoodMain' => $request->HargaOriFoodMain, 
            'JenisFoodMain' => $request->JenisFoodMain,
            'FotoFoodMain' => $filename,
            'DeskripsiFoodMain' => $request->DeskripsiFoodMain,
            'QuantityFoodMain' => $request->QuantityFoodMain
        ]);

        return redirect('/add-menu');
    }

    // show food in homepage
    function showMenu(){
        $foodMenu = foodMain::where('JenisFoodMain', 'Food')->get();
        $drinkMenu = foodMain::where('JenisFoodMain', 'Drinks')->get();
        $sideDishMenu = foodMain::where('JenisFoodMain', 'Side Dish')->get();
    
        // if there is a phone number on DB
        if (Auth::check()) {
            $user = Auth::user();
            $phone = $user->phone;
            $cart = Cart::where('phone', $phone)->get();
            $totalQuantity = $cart->sum('quantity');
            return view('welcome', compact('totalQuantity', 'cart', 'foodMenu', 'drinkMenu', 'sideDishMenu'));
        } else {
            // if there is no phone number on DB
            return view('welcome', ['totalQuantity' => 0, 'cart' => collect()], compact('foodMenu', 'drinkMenu' , 'sideDishMenu'));
        }
    }

    // Show data in admin panel
    function read2(){
        $menu = foodMain::all();
        return view ('addMenu', compact('menu'));
    }

    // edit menunya di admin panel sesuai ID
    function edit($id){
        $dataMenu = foodMain::find($id);
        return view('editMenu', compact('dataMenu'));
    }

    // update menunya sesuai dengan ID
    function update(Request $request, $id){
        $request->validate([
            'IDFoodMain' => ['required'],
            'NamaFoodMain' => ['required'],
            'HargaOriFoodMain' => ['required'],
            'JenisFoodMain' => ['required'],
            'FotoFoodMain' => ['required', 'image'],
            'DeskripsiFoodMain' => ['required'],
            'QuantityFoodMain'
        ]);

        $filename = $request->file('FotoFoodMain')->getClientOriginalName();
        $request->file('FotoFoodMain')->storeAs('public/'.$filename);

        foodMain::find($id)->update([
            'IDFoodMain' => $request->IDFoodMain,
            'NamaFoodMain' => $request->NamaFoodMain,
            'HargaOriFoodMain' => $request->HargaOriFoodMain, 
            'JenisFoodMain' => $request->JenisFoodMain,
            'FotoFoodMain' => $filename,
            'DeskripsiFoodMain' => $request->DeskripsiFoodMain,
            'QuantityFoodMain' => $request->QuantityFoodMain
        ]);

        return redirect('/add-menu');
    }

    // Delete menu dari admin panel
    function delete($id){
        $dataMenu = foodMain::find($id);
        foodMain::destroy($id);
        Storage::delete('/public'.'/'.$dataMenu->FotoFoodMain);
        return redirect('/add-menu');
    }

    function search(Request $request){
        $query = $request->input('query');
        $foodMenu = FoodMain::where('NamaFoodMain', 'like', '%'. $query . '%')->get();

        return view ('welcome', compact('results'));
    }

    function addcart(Request $request, $id){
        if (Auth::id()){
            $user = auth()->user();
            $product = foodMain::find($id);
            $cart = new cart;
            $cart->name = $user->name;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->product_title = $product->NamaFoodMain;
            $cart->price = $product->HargaOriFoodMain;
            $cart->quantity = $request->cartQuantity;
            $cart->cartFoto=$product->FotoFoodMain;
            $cart->save();
            return redirect()->back()->with('message', 'Product Added to Cart');
        } else {
            return redirect('login');
        }
    }

    function showCart(){
        if (Auth::check()) {
            $user = Auth::user();
            $phone = $user->phone;
    
            // if there is a phone number on DB
            if ($phone) {
                $cart = Cart::where('phone', $phone)->get();
                $totalQuantity = $cart->sum('quantity');
                $totalPrice = $cart->sum("price");
                return view('cartPage', compact('totalQuantity', 'cart', 'totalPrice')); // show data di cartpage
            } else {
                // if there is no phone number on DB
                return view('cartPage', ['totalQuantity' => 0, 'cart' => collect()]);
            }
        } else {
            return redirect()->route('login'); // Redirect to login page
        }
    }

    function deleteCart($id){
        $cartData = cart::find($id);
        cart::destroy($id);
        return redirect('/cartPage');
    } // delete cart page

    function confirmOrder(Request $request){
    // Retrieve cart items based on the provided phone number
    $user = Auth::user();
    $phone = $user->phone;

    $cartItems = Cart::where('phone', $phone)->get();
    

    foreach ($cartItems as $cart) {
        $order = new Order;
        $order->name = $cart->name;
        $order->phone = $cart->phone;
        $order->address = $cart->address;
        $order->product_title = $cart->product_title; // Correct property access
        $order->quantity = $cart->quantity; // Correct property access
        $order->price = $cart->price; // Correct property access
        $order->orderFoto = $cart->cartFoto; // Correct property access
        $order->save();
    }   
        $cart_remove = Cart::where('phone', $phone)->get();

        foreach ($cart_remove as $remove) {
            $data = Cart::find($remove->id);
            $data->delete();
        }

        return redirect('/checkout');
        
    }

    function checkout(){
        $user = auth()->user();
        $phone = $user->phone;
        $orders = Order::where('phone', $phone)->get();
        $totalPrice = $orders->sum("price");
        return view('checkout', compact('orders', 'totalPrice'));
    }
}
