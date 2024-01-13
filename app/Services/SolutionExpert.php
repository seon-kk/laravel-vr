<?php

namespace App\Services;

use App\Enums\LifeStyleEnum;
use Illuminate\Support\Collection;

class SolutionExpert
{
    const SOLUTION_LIST = [];
    protected Collection $recommendSolutions;


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


    protected function addMatchingSolution(LifeStyleEnum $lifeStyle): void
    {
        foreach ($this::SOLUTION_LIST as $solution) {
            if (in_array($lifeStyle, $solution['life_style'])) {
                $this->recommendSolutions->push($solution['solution']->value);
            }
        }
    }


    protected function filterUniqueSolution(): void
    {
        $this->recommendSolutions = $this->recommendSolutions->unique()->values();
    }
}
