<?php

namespace Tests\Feature;

use App\Enums\LifeStyleEnum;
use App\Enums\SolutionTypeEnum;
use Tests\TestCase;

class ConsultingControllerTest extends TestCase
{
    /**
     * /v1/how-to-lose-weight 경로로 GET 요청 성공 테스트
     *
     * @return void
     */
    public function test_weight_consult_ok()
    {
        $weightRequest = [
            'life_style' => [LifeStyleEnum::STRONG_WILL->value, LifeStyleEnum::ENOUGH_MONEY->value],
            'prefer_solution_type' => SolutionTypeEnum::DIET->value
        ];

        $response = $this->get('/v1/how-to-lose-weight?' . http_build_query($weightRequest));

        $response->assertStatus(200);
    }
}
