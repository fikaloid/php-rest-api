<?php

namespace MessageBird\Resources;

use MessageBird\Objects;
use MessageBird\Common;

/**
 * Class Verify
 *
 * @package MessageBird\Resources
 */
class Lookup extends Base
{

    /**
     * @param Common\HttpClient $HttpClient
     */
    public function __construct(Common\HttpClient $HttpClient)
    {
        $this->setObject(new Objects\Lookup);
        $this->setResourceName('lookup');

        parent::__construct($HttpClient);
    }

    /**
     * @param $phoneNumber
     *
     * @return $this->Object
     *
     * @throws \MessageBird\Exceptions\HttpException
     * @throws \MessageBird\Exceptions\RequestException
     * @throws \MessageBird\Exceptions\ServerException
     */
    public function read($phoneNumber = null, $countryCode = null)
    {
        $query = null; 
        if ($countryCode != null) {
            $query = array("countryCode" => $countryCode);
        }
        $ResourceName = $this->resourceName . '/' . $phoneNumber;
        list(, , $body) = $this->HttpClient->performHttpRequest(Common\HttpClient::REQUEST_GET, $ResourceName, $query);
        return $this->processRequest($body);
    }
}
