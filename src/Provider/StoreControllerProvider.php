<?php

namespace Sebastianwestberg\GoogleApi\Provider;

use Sebastianwestberg\GoogleApi\Api\Client\GooglePlacesDetailsClient;
use Sebastianwestberg\GoogleApi\Api\Client\GooglePlacesSearchClient;
use Silex\Application;
use Silex\Api\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;

class StoreControllerProvider implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];

        // Collection of resources
        $controllers->get('/', function (Application $app, Request $request) {
            $parameters =  array(
              'key' => $app['API_key'],
              'location' => '59.3323565,18.0623562',
              'radius' => 2000,
              'type' => 'bicycle_store'
            );

            if ($request->query->get('pageToken')) {
                $parameters['pagetoken'] = $request->query->get('pageToken');
            }

            $client = new GooglePlacesSearchClient($parameters);
            $collection = json_decode((string) $client->request()->getBody(), true);

            return $app->json($collection, $client->getStatusCodeByStatus($collection['status']));
        });

        // Get a singleton resource
        $controllers->get('/{placeid}', function (Application $app, $placeid) {
            $client = new GooglePlacesDetailsClient(array(
              'key' => $app['API_key'],
              'placeid' => $placeid
            ));

            $resource = json_decode((string) $client->request()->getBody(), true);

            return $app->json($resource, $client->getStatusCodeByStatus($resource['status']));
        });


        return $controllers;
    }
}
