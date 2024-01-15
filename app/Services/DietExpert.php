<?php

namespace App\Services;

use App\Enums\DietSolutionEnum;
use App\Enums\LifeStyleEnum;

class DietExpert extends SolutionExpert
{
    const SOLUTION_LIST = [
        [
            'solution' => DietSolutionEnum::INTERMITTENT_FASTING,
            'life_style' => [
                LifeStyleEnum::ENOUGH_TIME,
                LifeStyleEnum::STRONG_WILL
            ],
        ],
        [
            'solution' => DietSolutionEnum::LCHF,
            'life_style' => [
                LifeStyleEnum::ENOUGH_MONEY
            ],
        ]
    ];
}
