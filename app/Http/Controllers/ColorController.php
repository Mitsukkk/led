<?php

namespace App\Http\Controllers;

use App\Services\ColorService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    protected $colorService;

    public function __construct(ColorService $colorService)
    {
        $this->colorService = $colorService;
    }

    /**
     * @param string $ledId
     * @return JsonResponse
     */
    public function get(string $ledId): JsonResponse
    {
        return new JsonResponse($this->colorService->findOne($ledId));
    }

    /**
     * @param Request $request
     * @param string $ledId
     * @return JsonResponse
     */
    public function update(Request $request, string $ledId): JsonResponse
    {
        $this->validate($request, [
            'red' => 'required|numeric|max:255',
            'green' => 'required|numeric|max:255',
            'blue' => 'required|numeric|max:255',
        ]);

        return new JsonResponse($this->colorService->update($ledId, $request));
    }
}