<?php

namespace App\Repositories;

use App\Models\Led;
use BaoPham\DynamoDb\DynamoDbCollection;

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
     * @param string $ledId
     * @param string $name
     * @return mixed
     */
    public function updateByUuid(string $ledId, string $name)
    {
        return Led::where('id', $ledId)->update(['name' => $name]);
    }
}
