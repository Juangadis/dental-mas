<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Plan;

class CategoryController extends Controller
{
    public function show()
    {
        $categories = Category::with('treatments')->get(); // Obtener todas las categorías con sus tratamientos
        $plans = Plan::all();
        return view('welcome', compact('categories', 'plans'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        $category = Category::create($request->all());
        return response()->json($category, 201);
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

}
