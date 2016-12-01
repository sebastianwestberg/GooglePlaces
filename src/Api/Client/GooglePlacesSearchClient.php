<?php

namespace Sebastianwestberg\GoogleApi\Api\Client;

/**
 * Client for Google Places Search API.
 */
class GooglePlacesSearchClient extends GooglePlacesClient
{
    /**
     * @return string
     */
    protected function getBaseUrl()
    {
        return 'https://maps.googleapis.com/maps/api/place/nearbysearch/'.$this->output;
    }
}

