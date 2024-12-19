<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $food = Food::query()
            ->orderBy('created_at', 'desc')
            ->get();

//        return view('dashboard');
        return view('dashboard', [
            'food' => $food,
            'q' => "",
            'is_menu' => "",
            'dates' => ""
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function search(Request $request)
    {
//        return $request->all();

        $food = Food::query()
            ->when(request('q'), function ($query) {
                $query->where('name_pt', 'LIKE', '%' . request('q') . '%');
            })
            ->when(request()->has('is_menu'), function ($query) {
                $query->where('is_menu', true);
            })
            ->when(request()->has('dates'), function ($query) {
                $query->whereNotNull('date');
            })
            ->when($request->filled('type'), function ($query) use ($request) {
                $query->whereIn('type', $request->input('type'));
            })
            ->orderBy('created_at', 'desc')
            ->get();


//        return $request->has('is_menu');

        return view('dashboard', [
            'food' => $food,
            'q' => request('q'),
            'is_menu' => $request->has('is_menu') ? "on": "",
            'dates' => $request->has('dates')? "on": ""
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
