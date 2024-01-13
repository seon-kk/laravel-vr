<?php

namespace App\Services;

use Illuminate\Support\Collection;

/**
 * 요청 정보를 토대로 해당 전문가에게 솔루션 문의 후
 * 전문가별 솔루션을 모아서 전달
 */
class PersonalTrainer
{
    private Collection $solutions;

    public function __construct() {
        $this->solutions = new Collection();
    }

    public function getWeightConsulting(array $lifeStyles, string $preferSolutionType = null)
    {

    }
}
