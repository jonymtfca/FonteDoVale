<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFoodRequest;
use App\Http\Requests\UpdateFoodRequest;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        dd('test');


        return view('food.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('food.create', [
        'user' => Auth::user()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request->all());

        $attributes = $request->validate([
            'name_pt' => ['required'],
            'name_en' => ['required'],
            'ingredients_pt' => ['required'],
            'ingredients_en' => ['required'],
            'type' => ['required', 'integer'],
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

//        return $attributes;

        $path = $request->file('image')->store('/food');
//        dd($path, substr($path, 5));

        $food = new Food();

        $food->name_pt = $request->name_pt;
        $food->name_en = $request->name_en;
        $food->ingredients_pt = $request->ingredients_pt;
        $food->ingredients_en = $request->ingredients_en;
//        $food->imgname = $request->file('image')->getClientOriginalName();
        $food->path = substr($path, 5);
        $food->price = $request->price;
        $food->half_price = $request->half_price;
        $food->type = $request->type;
        $food->is_menu = 1;

        $food->save();

        return redirect('/dashboard')
            ->with('success','Comida criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
//        return Food::find($id);

        return view('food.edit', [
            'food' => Food::find($id)
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
//        return $request->is_menu == "0" ? 1 : 0;

        $attributes = $request->validate([
            'name_pt' => ['required'],
            'name_en' => ['required'],
            'ingredients_pt' => ['required'],
            'ingredients_en' => ['required'],
            'type' => ['required'],
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('/food');
        }
        else{
            $path = "";
        }

        $food = Food::FindOrFail($request->route('id'));

        $food->name_pt = $request->name_pt;
        $food->name_en = $request->name_en;
        $food->ingredients_pt = $request->ingredients_pt;
        $food->ingredients_en = $request->ingredients_en;
        $food->path = $path == "" ? $food->path : substr($path, 5);
        $food->price = $request->price;
        $food->half_price = $request->half_price;
        $food->type = $request->type;
        $food->is_menu = $request->is_menu == "0";

        $food->save();

        return redirect('/dashboard')
            ->with('success','Comida atualizada!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
//        return $id;
        Food::where('id', $id)->delete();

        return redirect('/dashboard');
    }

    /**
     * Add the specified date to storage.
     */
    public function updateDate(Request $request, $id)
    {
        $validated = $request->validate([
            'date' => 'required|date', // Validate the date format
        ]);

        $item = Food::findOrFail($id); // Fetch the record
        $item->date = $validated['date'];  // Update the date
        $item->save();                     // Save changes to the database

        return response()->json(['success' => true, 'message' => 'Date updated successfully!']);
    }

    /**
     * Remove the specified date from storage.
     */
    public function clearDate(Request $request, $id)
    {
//        dd($request->all(), "Id".$id);

        $item = Food::findOrFail($id); // Fetch the record
        $item->date = null;  // Update the date
        $item->save();                     // Save changes to the database

        return response()->json(['success' => true, 'message' => 'Date updated successfully!']);
    }
}
