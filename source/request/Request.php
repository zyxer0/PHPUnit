<?php

namespace Source\Request;

use \Source\Request\GetParams\getParamsInterface;

class Request implements requestInterface
{

    private $method;
    private $headers;
    private $cookies;

    public function __construct(string $method = '', array $headers = [], array $cookies = [])
    {
        $this->method = $method;
        $this->headers = $headers;
        $this->cookies = $cookies;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getAllHeaders()
    {
        return $this->headers;
    }

    public function getHeaderByName($name)
    {
        if ($name !== null && isset($this->headers[$name])) {
            return $this->headers[$name];
        } else {
            return false;
        }
    }

    public function getAllCookies()
    {
        return $this->cookies;
    }

    public function getCookieByName($name)
    {
        if ($name !== null && isset($this->cookies[$name])) {
            return $this->cookies[$name];
        } else {
            return false;
        }
    }

    function getAllRequestParams(getParamsInterface $getParams)
    {
        return $getParams->getAllParams();
    }

    function getRequestParamByName(getParamsInterface $getParams, $name)
    {
        return $getParams->getParamByName($name);
    }
}
