<?php

namespace Source\Request\GetParams;

interface getParamsInterface
{
    public function __construct($requestParams);
    public function getAllParams();
    public function getParamByName($name);
}