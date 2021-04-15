<?php

namespace App\Services;

use App\Models\Led;
use App\Repositories\LedRepository;
use BaoPham\DynamoDb\DynamoDbCollection;

class LedService
{
    protected $ledRepository;

    public function __construct(LedRepository $ledRepository)
    {
        $this->ledRepository = $ledRepository;
    }

    public function get(): DynamoDbCollection
    {
        return Led::all(['id', 'name', 'lastUpdate']);
    }

    /**
     * @param string $name
     * @return Led
     */
    public function create(string $name): Led
    {
        return $this->ledRepository->createByName($name);
    }

    /**
     * @param string $ledId
     * @return DynamoDbCollection
     */
    public function find(string $ledId): DynamoDbCollection
    {
        return $this->ledRepository->findByUuid($ledId);
    }

    public function update(string $name, string $ledId)
    {
        return $this->ledRepository->updateByUuid($name, $ledId);
    }
}
