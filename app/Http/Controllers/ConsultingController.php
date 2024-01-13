<?php

namespace App\Http\Controllers;

use App\Services\PersonalTrainer;

class ConsultingController extends Controller
{
    public function __construct(
        private PersonalTrainer $personalTrainer
    )
    {
    }

    public function getWeightConsulting()
    {
        $this->personalTrainer->getWeightConsulting();
    }
}
