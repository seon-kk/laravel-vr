<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeightConsultingRequest;
use App\Services\PersonalTrainer;

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
        $this->personalTrainer->getWeightConsulting($validated['life_style'], $validated['prefer_solution_type']);
    }
}
