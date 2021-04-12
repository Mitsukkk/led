<?php

namespace App\Services;

use App\Models\Led;

class LedService
{
    public function ledAll()
    {
        return Led::all();
    }
}
