<?php

namespace Source\Response;

use \Source\Entity\Cookie;

interface responseInterface
{
    public function setHttpCode(int $code);
    public function setHeader(string $name, string $value);
    public function setCookie(Cookie $cookie);
    public function setContent(string $content);

    public function getHttpCode();
    public function getAllHeaders();
    public function getHeaderByName($name);
    public function getAllCookies();
    public function getCookieByName($name);
    public function getContent();
}