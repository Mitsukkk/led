<?php

namespace App\Http\Controllers;

use App\Services\LedService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        try {
            $name = $request->input('name');
            return response()->json($this->ledService->ledCreate($name));
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['The led could not be created'], 500);
        }
    }
}
