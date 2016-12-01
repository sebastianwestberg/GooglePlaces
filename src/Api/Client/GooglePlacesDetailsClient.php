<?php

namespace Sebastianwestberg\GoogleApi\Api\Client;

/**
 * Client for Google Places Details API.
 */
class GooglePlacesDetailsClient extends GooglePlacesClient
{
    /**
     * @return string
     */
    protected function getBaseUrl()
    {
        return 'https://maps.googleapis.com/maps/api/place/details/'.$this->output;
    }
}

