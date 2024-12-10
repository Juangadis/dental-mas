<?php
namespace App\Http\Controllers;

use App\Services\TreatmentServiceInterface;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    protected $treatmentService;

    public function __construct(TreatmentServiceInterface $treatmentService)
    {
        $this->treatmentService = $treatmentService;
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $treatment = $this->treatmentService->createTreatment($validatedData);

        return response()->json($treatment, 201);
    }
}