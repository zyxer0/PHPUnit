<?php

namespace Source\Entity;


class Cookie
{
    public $name;
    public $value = '';
    public $expire = 0;
    public $path = '';
    public $domain = '';
    public $secure = false;
    public $httponly = false;

    public function __construct($name, $value = '', $expire = 0, $path = '', $domain = '', $secure = false, $httponly = false)
    {
        $this->name = $name;
        $this->value = $value;
        $this->expire = $expire;
        $this->path = $path;
        $this->domain = $domain;
        $this->secure = $secure;
        $this->httponly = $httponly;
    }

}