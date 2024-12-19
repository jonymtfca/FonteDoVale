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
            'q' => ""
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function search(Request $request)
    {
//        return $request->all();

        $food = Food::query()
            ->where('name_pt', 'LIKE', '%'.request('q').'%')
            ->orderBy('created_at', 'desc')
            ->get();

//        return view('dashboard');
        return view('dashboard', [
            'food' => $food,
            'q' => request('q')
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
