<?php

namespace App\Services;

use App\Enums\SolutionTypeEnum;
use Illuminate\Support\Collection;

/**
 * 요청 정보를 토대로 해당 전문가에게 솔루션 문의 후
 * 전문가별 솔루션을 모아서 전달
 */
class PersonalTrainer
{
    private Collection $solutions;

    public function __construct(
        private DietExpert   $dietExpert,
        private FitnessCoach $fitnessCoach
    )
    {
        $this->solutions = new Collection();
    }


    public function getWeightConsulting(array $lifeStyles, string $preferSolutionType = null): Collection
    {
        if($preferSolutionType == SolutionTypeEnum::DIET->value || $preferSolutionType == null){
            $this->addDietSolution($lifeStyles);
            $this->addFitnessSolution($lifeStyles);
        } else {
            $this->addFitnessSolution($lifeStyles);
            $this->addDietSolution($lifeStyles);
        }

        return $this->solutions;
    }


    private function addDietSolution(array $lifeStyles): void
    {
        $dietSolution = $this->dietExpert->getRecommendSolutions($lifeStyles);
        $this->mergeSolutions($dietSolution);
    }


    private function addFitnessSolution(array $lifeStyles): void
    {
        $fitnessSolution = $this->fitnessCoach->getRecommendSolutions($lifeStyles);
        $this->mergeSolutions($fitnessSolution);
    }

    
    private function mergeSolutions(Collection $solution): void
    {
        $this->solutions = $this->solutions->merge($solution);
    }
}
