<?php

namespace App\Services;

use App\Enums\FitnessSolutionEnum;
use App\Enums\LifeStyleEnum;
use Illuminate\Support\Collection;

class FitnessCoach
{
    private Collection $recommendSolutions;

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
        $this->recommendSolutions = new Collection();
    }


    public function getRecommendSolutions(array $lifeStyles): Collection
    {
        foreach ($lifeStyles as $lifeStyle) {
            $this->addMatchingSolution(LifeStyleEnum::from($lifeStyle));
        }

        $this->filterUniqueSolution();

        return $this->recommendSolutions;
    }


    private function addMatchingSolution(LifeStyleEnum $lifeStyle): void
    {
        foreach (self::SOLUTION_LIST as $solution) {
            if (in_array($lifeStyle, $solution['life_style'])) {
                $this->recommendSolutions->push($solution['solution']->value);
            }
        }
    }


    private function filterUniqueSolution(): void
    {
        $this->recommendSolutions = $this->recommendSolutions->unique()->values();
    }
}
