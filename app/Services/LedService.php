<?php

namespace App\Services;

use App\Models\Led;
use Ramsey\Uuid\Uuid;

class LedService
{
    public function ledAll()
    {
        return Led::all();
    }

    /**
     * @param string $name
     * @return Led
     */
    public function ledCreate(string $name): Led
    {
        $led = new Led();
        $led->id = Uuid::uuid4()->toString();
        $led->name = $name;
        $led->lastUpdate = time();
        $led->save();

        return $led;
    }
}
