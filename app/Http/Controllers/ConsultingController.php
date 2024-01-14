<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeightConsultingRequest;
use App\Services\PersonalTrainer;
use Symfony\Component\HttpFoundation\Response;

class ConsultingController extends Controller
{
    public function __construct(
        private PersonalTrainer $personalTrainer
    )
    {
    }

    public function getWeightConsulting(WeightConsultingRequest $request)
    {
        $validated = $request->validated();
        $result = $this->personalTrainer->getWeightConsulting($validated['life_style'], $validated['prefer_solution_type']);

        return response()->json($result, Response::HTTP_OK);
    }
}
