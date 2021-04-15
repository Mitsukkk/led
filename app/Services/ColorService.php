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
        $led = Led::findOrFail($ledId);

        if ($led->color !== null) {
            $colorArray = json_decode($led->color, true);
            if (is_array($colorArray)) {
                $colorArray['red'] = $request->input('red');
                $colorArray['green'] = $request->input('green');
                $colorArray['blue'] = $request->input('blue');

                $led->color = json_encode($colorArray);
            }
        } else {
            $led->color = $inputsJson;
        }

        $led->save();

        return $led;
    }
}
