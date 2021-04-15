<?php

namespace App\Http\Controllers;

use App\Models\Led;
use App\Services\LedService;
use BaoPham\DynamoDb\DynamoDbCollection;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

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
     * @return JsonResponse
     */
    public function getAll(): JsonResponse
    {
        return new JsonResponse($this->ledService->ledAll());
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        return new JsonResponse($this->ledService->create($request->input('name')));
    }

    /**
     * @param string $ledId
     * @return JsonResponse
     */
    public function get(string $ledId): JsonResponse
    {
        return new JsonResponse($this->ledService->find($ledId));
    }

    /**
     * @param Request $request
     * @param string $ledId
     * @return mixed
     */
    public function update(Request $request, string $ledId)
    {
        return $this->ledService->update($ledId, 'toto');
    }
}
