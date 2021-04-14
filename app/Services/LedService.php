<?php

namespace App\Services;

use App\Models\Led;
use App\Repositories\LedRepository;
use Ramsey\Uuid\Uuid;

class LedService
{
    protected $ledRepository;

    public function __construct(LedRepository $ledRepository)
    {
        $this->ledRepository = $ledRepository;
    }

    public function ledAll()
    {
        return Led::all();
    }

    /**
     * @param string $name
     * @return Led
     */
    public function create(string $name): Led
    {
        $led = new Led();
        $led->id = Uuid::uuid4()->toString();
        $led->name = $name;
        $led->lastUpdate = time();
        $led->save();

        return $led;
    }

    /**
     * @param string $ledId
     * @return mixed
     */
    public function find(string $ledId)
    {
        return $this->ledRepository->findByUuid($ledId);
    }
}
