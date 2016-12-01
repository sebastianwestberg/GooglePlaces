<?php

namespace Sebastianwestberg\Tests\GoogleApi\Api\Client;

use PHPUnit\Framework\TestCase;
use Sebastianwestberg\GoogleApi\Api\Client\GooglePlacesDetailsClient;

class GooglePlacesDetailsClientTest extends TestCase
{
    public function test_can_resolve_http_status()
    {
        $client = new GooglePlacesDetailsClient();

        $this->assertEquals(404, $client->getStatusCodeByStatus('NOT_FOUND'));
        $this->assertEquals(401, $client->getStatusCodeByStatus('REQUEST_DENIED'));
        $this->assertEquals(422, $client->getStatusCodeByStatus('INVALID_REQUEST'));
        $this->assertEquals(429, $client->getStatusCodeByStatus('OVER_QUERY_LIMIT'));
        $this->assertEquals(500, $client->getStatusCodeByStatus('UNKNOWN_ERROR'));
        $this->assertEquals(200, $client->getStatusCodeByStatus('OK'));
    }
}

