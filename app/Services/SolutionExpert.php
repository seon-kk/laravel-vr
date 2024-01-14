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


    /**
     * 라이프스타일 태그 array를 순회해 해당 태그에 맞는 솔루션 조회 후
     * 중복 제거하여 반환
     * @param array $lifeStyles
     * @return Collection
     */
    public function getRecommendSolutions(array $lifeStyles): Collection
    {
        foreach ($lifeStyles as $lifeStyle) {
            $this->addMatchingSolution(LifeStyleEnum::from($lifeStyle));
        }

        $this->filterUniqueSolution();

        return $this->recommendSolutions;
    }


    /**
     * SOLUTION_LIST 에서 해당 태그를 가진 솔루션 이름을 찾아 collection에 추가
     * @param LifeStyleEnum $lifeStyle
     * @return void
     */
    protected function addMatchingSolution(LifeStyleEnum $lifeStyle): void
    {
        foreach ($this::SOLUTION_LIST as $solution) {
            if (in_array($lifeStyle, $solution['life_style'])) {
                $this->recommendSolutions->push($solution['solution']->value);
            }
        }
    }


    /**
     * recommendSolution 콜렉션에서 중복 제거 후 인덱스 리셋
     * @return void
     */
    protected function filterUniqueSolution(): void
    {
        $this->recommendSolutions = $this->recommendSolutions->unique()->values();
    }
}
