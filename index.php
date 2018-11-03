<?php

ini_set('display_errors', 1);

require_once('vendor/autoload.php');

$method = $_SERVER['REQUEST_METHOD'];
$headers = getallheaders();
$cookies = $_COOKIE;
$requestParams = $_GET;

$request = new Source\Request\Request($method, $headers, $cookies, $requestParams);
$httpGET = new \Source\Request\GetParams\HttpGET($_GET);

print_r($request->getMethod());
print_r($request->getHeaderByName('werg'));
print_r($request->getAllCookies());
print_r($request->getAllRequestParams($httpGET));

$response = new Source\Response\Response();
$cookieSid = new \Source\Entity\Cookie('sid', 'khsd9ubuiappqwrehjk', 3600);
$cookieUid = new \Source\Entity\Cookie('uid', 'dsgppooqoijaojlkfnk');
$response->setCookie($cookieSid);
$response->setCookie($cookieUid);

print_r($response->getAllCookies());
