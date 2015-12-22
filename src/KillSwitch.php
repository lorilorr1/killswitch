<?php

namespace KillSwitch;

use GuzzleHttp\Client;
use KillSwitch\Exceptions\BadUrlException;

class KillSwitch {

    /**
     * @var bool
     */
    private $status;

    /**
     * @var Client
     */
    private $http;

    /**
     * KillSwitch constructor.
     * @param null $url
     */
    public function __construct($url = null)
    {
        $this->status = false;

        if (!is_null($url)) {
            $this->http = new Client(['base_uri' => $url,  'timeout' => 5.0]);
            $this->readStatusFromHttpRequest();
        }
    }

    /**
     * @return bool
     * @throws BadUrlException
     */
    public function status()
    {
        if (!is_null($this->http)) {
            $this->readStatusFromHttpRequest();
        }
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function kill()
    {
        return $this->setStatus(true);
    }

    /**
     * @param $status
     * @return mixed
     */
    public function setStatus($status)
    {
        return $this->status = $status;
    }

    /**
     * @throws BadUrlException
     * @internal param $url
     */
    private function readStatusFromHttpRequest()
    {
        try {
            $response = $this->http->request('GET', '/');
        } catch (\Exception $e) {
            throw new BadUrlException;
        }

        $body = (string) $response->getBody();
        $this->status = (strstr($body, 'true')) ? true : false;
    }
}