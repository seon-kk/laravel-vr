<?php

namespace App\Services;

use App\Enums\FitnessSolutionEnum;
use App\Enums\LifeStyleEnum;

class FitnessCoach extends SolutionExpert
{
    const SOLUTION_LIST = [
        [
            'solution' => FitnessSolutionEnum::CROSSFIT,
            'life_style' => [
                LifeStyleEnum::ENOUGH_MONEY,
                LifeStyleEnum::STRONG_WILL
            ],
        ],
        [
            'solution' => FitnessSolutionEnum::CARDIO_EXERCISE,
            'life_style' => [
                LifeStyleEnum::STRONG_WILL
            ],
        ],
        [
            'solution' => FitnessSolutionEnum::STRENGTH,
            'life_style' => [
                LifeStyleEnum::STRONG_WILL,
                LifeStyleEnum::ENOUGH_TIME
            ],
        ],
        [
            'solution' => FitnessSolutionEnum::SPINNING,
            'life_style' => [
                LifeStyleEnum::ENOUGH_MONEY
            ],
        ],
    ];


    public function __construct()
    {
        parent::__construct();
    }
}
