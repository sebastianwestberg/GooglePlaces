<?php

namespace Sebastianwestberg\Tests\GoogleApi;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class StoreControllerProviderTest extends TestCase
{
    /** @var Client */
    private $client;

    protected function setUp()
    {
        $this->client = new Client(array(
          'base_uri' => 'http://nginx'
        ));
    }

    public function test_GET_store_collection()
    {
        /** @var Response $response */
        $collectionResponse = $this->client->get('/stores');
        $collection = json_decode((string) $collectionResponse->getBody(), true);

        $this->assertArrayHasKey('results', $collection);
        $this->assertEquals(200, $collectionResponse->getStatusCode());
    }

    public function test_GET_store_collection_with_a_page_token()
    {
        /** @var Response $response */
        $collectionResponse = $this->client->get('/stores');
        $collection = json_decode((string) $collectionResponse->getBody(), true);

        $collectionPageTokenResponse = $this->client->get('/stores', array(
          'pageToken' => $collection['next_page_token']
        ));

        $this->assertEquals(200, $collectionPageTokenResponse->getStatusCode());
    }

    public function test_GET_store_resource()
    {
        $collectionResponse = $this->client->get('/stores');
        $collection = json_decode((string) $collectionResponse->getBody(), true);

        $resourceResponse = $this->client->get('/stores/'.$collection['results'][0]['place_id']);
        $resource = json_decode((string) $resourceResponse->getBody(), true);

        $this->assertArrayHasKey('result', $resource);
        $this->assertStringEndsWith('Stockholm, Sweden', $resource['result']['formatted_address']);
        $this->assertEquals(200, $resourceResponse->getStatusCode());
    }

    public function test_GET_store_resource_with_invalid_store_id()
    {
        $resourceResponse = $this->client->get('/stores/bad_id', array('http_errors' => false));
        $this->assertEquals(422, $resourceResponse->getStatusCode());
    }
}