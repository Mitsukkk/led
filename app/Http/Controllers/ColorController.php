<?php

namespace App\Http\Controllers;

use App\Services\ColorService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ColorController extends Controller
{
    protected $colorService;

    public function __construct(ColorService $colorService)
    {
        $this->colorService = $colorService;
    }

    /**
     * @param Request $request
     * @param string $ledId
     * @return JsonResponse
     */
    public function update(Request $request, string $ledId): JsonResponse
    {
        $this->validate($request, [
            'red' => 'required',
            'green' => 'required',
            'blue' => 'required'
        ]);

        return new JsonResponse($this->colorService->update($ledId, $request));
    }
}