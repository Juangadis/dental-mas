<?php
namespace App\Http\Controllers;

use App\Models\Treatment;
use App\Models\Category;
use App\Services\TreatmentServiceInterface;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    protected $treatmentService;

    public function __construct(TreatmentServiceInterface $treatmentService)
    {
        $this->treatmentService = $treatmentService;
    }

    public function index()
    {
        $treatments = Treatment::with('category')->get();
        return view('treatments.index', compact('treatments'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('treatments.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);
        $treatment = Treatment::create($request->all());
        return response()->json($treatment, 201);
    }

    public function show(Treatment $treatment)
    {
        return $treatment->load('category');
    }

    public function edit(Treatment $treatment)
    {
        $categories = Category::all();
        return view('treatments.edit', compact('treatment', 'categories'));
    }

    public function update(Request $request, Treatment $treatment)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);
        $treatment->update($request->all());
        return response()->json($treatment, 200);
    }

    public function destroy(Treatment $treatment)
    {
        $treatment->delete();
        return response()->json(null, 204);
    }
}