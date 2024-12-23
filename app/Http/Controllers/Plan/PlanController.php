<?php

namespace App\Http\Controllers\Plan;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        return response()->json($plans);
    }

    public function show($uuid)
    {
        $plan = Plan::findOrFail($uuid);
        return response()->json($plan);
    }

    public function create()
    {
        return view('plans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'url' => 'required|string',
        ]);

        $plan = Plan::create([
            'uuid' => (string) \Illuminate\Support\Str::uuid(),
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'url' => $request->url,
        ]);

        return response()->json($plan, 201);
    }

    public function update(Request $request, $uuid)
    {
        $plan = Plan::findOrFail($uuid);

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'price' => 'sometimes|required|numeric',
            'description' => 'sometimes|required|string',
            'url' => 'sometimes|required|string',
        ]);

        $plan->update($request->only(['name', 'price', 'description', 'url']));

        return response()->json($plan);
    }

    public function destroy($uuid)
    {
        $plan = Plan::findOrFail($uuid);
        $plan->delete();

        return response()->json(null, 204);
    }
}