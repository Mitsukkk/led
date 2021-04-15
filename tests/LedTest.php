<?php

use PHPUnit\Framework\TestCase;

class LedTest extends TestCase
{
    public function search_by_uuid()
    {
        $name = 'unit-test-led' . rand(0,10000);
        $this->_create($name);
        $this->assertResponseOk();
    }

    /**
     * @param string $name
     */
    private function _create(string $name)
    {
        $this->json(
            'POST', '/api/led/' . $name,
            $name,
            ['api_token' => env('API_TOKEN')]
        );
    }
}