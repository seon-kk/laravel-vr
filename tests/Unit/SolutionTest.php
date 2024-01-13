<?php

namespace Tests\Unit;

use App\Enums\LifeStyleEnum;
use App\Services\FitnessCoach;
use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{
    /**
     * fitness 솔루션 조회 테스트
     * 추천 솔루션은 Collection 객체이어야 하고, Fitness 전체 솔루션 크기보다 작거나 같아야 함
     * @return void
     */
    public function test_get_fitness_solution()
    {
        $fitnessCoach = new FitnessCoach();
        $maxCount = count($fitnessCoach::SOLUTION_LIST);

        $lifeStyles = [LifeStyleEnum::ENOUGH_MONEY->value, LifeStyleEnum::ENOUGH_TIME->value, LifeStyleEnum::STRONG_WILL->value];

        $recommendSolution = $fitnessCoach->getRecommendSolutions($lifeStyles);

        dump($recommendSolution);
        $this->assertInstanceOf(Collection::class, $recommendSolution);
        $this->assertLessThanOrEqual($maxCount, $recommendSolution->count());
    }
}
