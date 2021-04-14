<?php

namespace App\Http\Controllers;

use App\Services\LedService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Exception;

class LedController extends Controller
{
    /**
     * @var LedService
     */
    protected $ledService;

    /**
     * LedController constructor.
     * @param LedService $ledService
     */
    public function __construct(LedService $ledService)
    {
        $this->ledService = $ledService;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->ledService->ledAll();
    }

    /**
     * @param Request $request
     * @return \App\Models\Led
     */
    public function create(Request $request): \App\Models\Led
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        return $this->ledService->create($request->input('name'));
    }

    /**
     * @param string $ledId
     * @return JsonResponse|mixed
     */
    public function get(string $ledId)
    {
        return $this->ledService->find($ledId);
    }
}
