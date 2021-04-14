<?php

namespace App\Repositories;

use App\Models\Led;

class LedRepository
{
    public function findByUuid(string $ledId)
    {
        return Led::where('id', $ledId)->get();
    }
}
