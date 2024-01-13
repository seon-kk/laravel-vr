<?php

namespace App\Http\Requests;

use App\Enums\LifeStyleEnum;
use App\Enums\SolutionTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class WeightConsultingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * 리퀘스트 레벨에서 인증을 사용하지 않으므로 true 리턴
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'life_style' => [
                'required',
                'array',
                Rule::in(LifeStyleEnum::getValueArray())
            ],
            'prefer_solution_type' => [
                'nullable',
                new Enum(SolutionTypeEnum::class)
            ],
        ];
    }
}
