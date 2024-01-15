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


    /**
     * 선호 솔루션 타입에 따라 Diet, Fitness 솔루션 순서대로 조회 후 리턴
     * @param array $lifeStyles
     * @param string|null $preferSolutionType
     * @return Collection
     */
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


    /**
     * 다이어트 솔루션을 조회 후 solution collection 에 합침
     * @param array $lifeStyles
     * @return void
     */
    private function addDietSolution(array $lifeStyles): void
    {
        $dietSolution = $this->dietExpert->getRecommendSolutions($lifeStyles);
        $this->mergeSolutions($dietSolution);
    }


    /**
     * 피트니스 솔루션을 조회 후 solution collection 에 합침
     * @param array $lifeStyles
     * @return void
     */
    private function addFitnessSolution(array $lifeStyles): void
    {
        $fitnessSolution = $this->fitnessCoach->getRecommendSolutions($lifeStyles);
        $this->mergeSolutions($fitnessSolution);
    }


    /**
     * 주어진 솔루션 콜렉션을 합침
     * @param Collection $solution
     * @return void
     */
    private function mergeSolutions(Collection $solution): void
    {
        $this->solutions = $this->solutions->merge($solution);
    }
}
