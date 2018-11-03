<?php

namespace Source\Response;

use \Source\Entity\Cookie;

class Response implements responseInterface
{

    private $httpCode;
    private $headers;
    private $cookies;
    private $content;

    public function setHttpCode($code)
    {
        $this->httpCode = $code;
    }

    public function getHttpCode()
    {
        return $this->httpCode;
    }

    public function setHeader($name, $value)
    {
        $this->headers[$name] = $value;
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

    public function setCookie(Cookie $cookie)
    {
        $this->cookies[$cookie->name] = $cookie;
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

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getContent()
    {
        return $this->content;
    }

}
