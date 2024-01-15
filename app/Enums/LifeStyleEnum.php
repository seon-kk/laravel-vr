<?php

namespace App\Enums;

/**
 * 라이프스타일 태그 Enum
 */
enum LifeStyleEnum: string
{
    case ENOUGH_MONEY = 'enough_money';
    case STRONG_WILL = 'strong_will';
    case ENOUGH_TIME = 'enough_time';


    /**
     * 전체 Enum value 값을 array로 리턴
     * @return array
     */
    public static function getValueArray(): array
    {
        $valueArray = [];

        foreach(self::cases() as $lifeStyleEnum) {
            $valueArray[] = $lifeStyleEnum->value;
        }

        return $valueArray;
    }
}
