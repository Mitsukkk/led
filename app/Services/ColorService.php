<?php

namespace App\Services;

use App\Models\Led;
use App\Repositories\LedRepository;
use Illuminate\Http\Request;

class ColorService
{
    protected $ledRepository;

    public function __construct(LedRepository $ledRepository)
    {
        $this->ledRepository = $ledRepository;
    }

    /**
     * @param string $ledId
     * @param Request $request
     * @return Led
     */
    public function update(string $ledId, Request $request): Led
    {
        $inputsJson = json_encode($request->all());

        return $this->ledRepository->updateColor($ledId, $inputsJson);
    }
}
