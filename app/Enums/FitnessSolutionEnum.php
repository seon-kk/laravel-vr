<?php

namespace App\Enums;

/**
 * 피트니스 솔루션 종류 Enum
 */
enum FitnessSolutionEnum: string
{
    case CROSSFIT = 'Crossfit';
    case CARDIO_EXERCISE = 'Cardio Exercise';
    case STRENGTH = 'Strength';
    case SPINNING = 'Spinning';
}
