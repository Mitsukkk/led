<?php

namespace App\Http\Controllers;

use App\Services\LedService;
use Exception;
use Illuminate\Http\JsonResponse;
use Laravel\Lumen\Routing\Controller;
use Log;

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
        try {
            return response()->json($this->ledService->ledAll());
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['No entry exists'], 500);
        }
    }
}
