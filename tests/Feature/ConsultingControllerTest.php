<?php

namespace Tests\Feature;

use Tests\TestCase;

class ConsultingControllerTest extends TestCase
{
    /**
     * /v1/how-to-lose-weight 경로로 GET 요청 테스트
     *
     * @return void
     */
    public function test_weight_consult_ok()
    {
        $response = $this->get('/v1/how-to-lose-weight');

        $response->assertStatus(200);
    }
}
