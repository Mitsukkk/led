<?php

class LedTest extends TestCase
{
    public function testCreationLed()
    {
        $name = 'unit-test-led' . rand(0, 10000);
        $this->_create($name);
        $ledId = json_decode($this->response->getContent())->id;
        $this->_delete($ledId);
        $this->assertResponseOk();
    }

    /**
     * @param string $name
     */
    private function _create(string $name)
    {
        $this->json('POST', '/api/led/', ['name' => $name, 'api_token' => env('API_TOKEN')]);
    }

    /**
     * @param string $ledId
     */
    private function _delete(string $ledId)
    {
        $this->json('DELETE', '/api/led/' . $ledId);
    }
}