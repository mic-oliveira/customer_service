<?php

namespace App\Enums;

enum PersonStatus: int
{
    case ACTIVE = 1;
    case INACTIVE = 2;
    case SUSPENDED = 3;
}
