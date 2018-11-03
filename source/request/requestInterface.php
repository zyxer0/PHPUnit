<?php

namespace Source\Request;

use \Source\Request\GetParams\getParamsInterface;

interface requestInterface
{
    public function getMethod();

    public function getAllHeaders();

    public function getHeaderByName($name);

    public function getAllCookies();

    public function getCookieByName($name);

    public function getAllRequestParams(getParamsInterface $getParams);

    public function getRequestParamByName(getParamsInterface $getParams, $name);
}