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


    public function test_validation_life_style_required()
    {
        $weightRequest = [
            'prefer_solution_type' => SolutionTypeEnum::DIET->value
        ];

        $response = $this->get('/v1/how-to-lose-weight?' . http_build_query($weightRequest));

        $response->dump()
            ->assertStatus(422)
            ->assertJson([
                'code' => 'VALIDATION_FAILED',
            ]);
    }


    public function test_validation_life_style_invalid()
    {
        $weightRequest = [
            'life_style' => [LifeStyleEnum::STRONG_WILL->value, "abcd"],
            'prefer_solution_type' => SolutionTypeEnum::DIET->value
        ];

        $response = $this->get('/v1/how-to-lose-weight?' . http_build_query($weightRequest));

        $response->dump()
            ->assertStatus(422)
            ->assertJson([
                'code' => 'VALIDATION_FAILED',
            ]);
    }


    public function test_validation_solution_type_invalid()
    {
        $weightRequest = [
            'life_style' => [LifeStyleEnum::STRONG_WILL->value],
            'prefer_solution_type' => "abcd"
        ];

        $response = $this->get('/v1/how-to-lose-weight?' . http_build_query($weightRequest));

        $response->dump()
            ->assertStatus(422)
            ->assertJson([
                'code' => 'VALIDATION_FAILED',
            ]);
    }
}
