<?php

namespace App\Repositories;

use App\Models\Led;
use BaoPham\DynamoDb\DynamoDbCollection;
use Ramsey\Uuid\Uuid;

class LedRepository
{
    /**
     * @param string $ledId
     * @return DynamoDbCollection
     */
    public function findByUuid(string $ledId): DynamoDbCollection
    {
        return Led::where('id', $ledId)->get();
    }

    /**
     * @param string $name
     * @return Led
     */
    public function createByName(string $name): Led
    {
        $led = new Led();
        $led->id = Uuid::uuid4()->toString();
        $led->name = $name;
        $led->lastUpdate = time();
        $led->save();

        return $led;
    }

    /**
     * @param string $name
     * @param string $ledId
     * @return Led
     */
    public function updateByUuid(string $name, string $ledId): Led
    {
        $led = Led::findOrFail($ledId);
        $led->name = $name;
        $led->save();

        return $led;
    }
}
