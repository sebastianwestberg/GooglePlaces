<?php

namespace Sebastianwestberg\GoogleApi\Api\Client;

use Psr\Http\Message\ResponseInterface;

interface ApiClientInterface
{
    /**
     * @param array  $parameters Parameters used to build the query
     * @param string $output     Can be either json or xml, defaults to json
     */
    public function __construct($parameters = array(), $output);

    /**
     * Create and send an HTTP request.
     *
     * @return ResponseInterface
     */
    public function request();

    /**
     * Maps status codes to actual HTTP status codes.
     *
     * @param  $status Status should be retrieved from the API response
     * @return integer HTTP status code
     */
    public function getStatusCodeByStatus($status);
}