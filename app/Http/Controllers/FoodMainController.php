<?php

namespace App\Http\Controllers;

use App\Models\foodMain;
use Illuminate\Http\Request;
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
        return view ('welcome', compact('foodMenu', 'drinkMenu', 'sideDishMenu'));
    }

    // Show data in admin panel
    function read2(){
        $menu = foodMain::all();
        return view ('addMenu', compact('menu'));
    }

    function edit($id){
        $dataMenu = foodMain::find($id);
        return view('editMenu', compact('dataMenu'));
    }

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
}
