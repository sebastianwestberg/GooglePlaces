<?php

namespace Sebastianwestberg\GoogleApi\Api\Client;

use GuzzleHttp\Client;

abstract class GooglePlacesClient implements ApiClientInterface
{
    /**
     * @var string
     */
    protected $output;

    /**
     * @var array
     */
    protected $parameters;

    public function __construct($parameters = array(), $output = 'json')
    {
        $this->output = $output;
        $this->parameters = $parameters;
    }

    public function request()
    {
        $client = new Client();

        return $client->request('GET', $this->getBaseUrl(), array(
          'query' => $this->parameters,
        ));
    }

    public function getStatusCodeByStatus($status)
    {
        switch ($status) {
            case('NOT_FOUND'):
                $code = 404;
                break;
            case('REQUEST_DENIED'):
                $code = 401;
                break;
            case('INVALID_REQUEST'):
                $code = 422;
                break;
            case('OVER_QUERY_LIMIT'):
                $code = 429;
                break;
            case('UNKNOWN_ERROR'):
                $code = 500;
                break;
            default:
                $code = 200;
        }

        return $code;
    }
}