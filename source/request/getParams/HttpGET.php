<?php

namespace Source\Request\GetParams;

class HttpGET implements getParamsInterface
{

    protected $requestParams;

    public function __construct($requestParams)
    {
        $this->requestParams = $requestParams;
    }

    public function getAllParams()
    {
        return $this->requestParams;
    }

    public function getParamByName($name)
    {
        if ($name !== null && isset($this->requestParams[$name])) {
            return $this->requestParams[$name];
        } else {
            return false;
        }
    }
}
