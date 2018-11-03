<?php

use PHPUnit\Framework\TestCase;
use Source\Request\GetParams\HttpGET;
use Source\Request\Request;

class RequestTest extends TestCase
{

    /**
     * @dataProvider GetHeaderByNameDataProvider
     */

    public function testGetHeaderByName(string $method, array $headers, array $cookies, $param, $expect)
    {
        $request = new Source\Request\Request($method, $headers, $cookies);
        $this->assertEquals($expect, $request->getHeaderByName($param));
    }

    /**
     * @dataProvider GetCookieByNameDataProvider
     */

    public function testGetCookieByName(string $method, array $headers, array $cookies, $param, $expect)
    {
        $request = new Request($method, $headers, $cookies);
        $this->assertEquals($expect, $request->getCookieByName($param));
    }

    /**
     * @dataProvider GetRequestParamByNameDataProvider
     */

    public function testGetRequestParamByName(string $method, array $headers, array $cookies, array $requestParams, $param, $expect)
    {

        $request = new Request($method, $headers, $cookies);

        $httpGET = $this->getMockBuilder(HttpGET::class)
            ->disableOriginalConstructor()
            ->setMethods(['getParamByName'])
            ->getMock();

        $httpGET->method('getParamByName')->willReturn($expect);
        $this->assertEquals($expect, $request->getRequestParamByName($httpGET, $param));
    }

    public function GetHeaderByNameDataProvider()
    {
        return [
            'case_0' => [
                'method'=>'',
                'headers'=>[
                    'User-Agent'=>'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.167 Safari/537.36',
                    'Referer'=>'https://www.google.com.ua/',
                ],
                'cookies'=>[],
                'param'=>'Referer',
                'expect'=>'https://www.google.com.ua/'
            ],
            'case_1' => [
                'method'=>'',
                'headers'=>[
                    'User-Agent'=>'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.167 Safari/537.36',
                    'Referer'=>'https://www.google.com.ua/',
                ],
                'cookies'=>[],
                'param'=>'Connection',
                'expect'=>false
            ],
        ];
    }
    public function GetCookieByNameDataProvider()
    {
        return [
            'case_0' => [
                'method'=>'',
                'headers'=>[],
                'cookies'=>[
                    '4db8793b3d7acaec4a41560eb34c4ffa'=>'qhirlpldnksu7fasjh6idpsn7r',
                    'SID'=>'pwYMXyjMJeuvynqjTLt1sob2HKX',
                ],
                'param'=>'SID',
                'expect'=>'pwYMXyjMJeuvynqjTLt1sob2HKX'
            ],
            'case_1' => [
                'method'=>'',
                'headers'=>[],
                'cookies'=>[
                    '4db8793b3d7acaec4a41560eb34c4ffa'=>'qhirlpldnksu7fasjh6idpsn7r',
                    'SID'=>'pwYMXyjMJeuvynqjTLt1sob2HKX',
                ],
                'param'=>'UID',
                'expect'=>false
            ],
        ];
    }
    public function GetRequestParamByNameDataProvider()
    {
        return [
            'case_0' => [
                'method'=>'',
                'headers'=>[],
                'cookies'=>[],
                'requestParams'=>[
                    'foo'=>1,
                    'bar'=>2,
                ],
                'param'=>'foo',
                'expect'=>1
            ],
            'case_1' => [
                'method'=>'',
                'headers'=>[],
                'cookies'=>[],
                'requestParams'=>[
                    'foo'=>1,
                    'bar'=>2,
                ],
                'param'=>'fooBar',
                'expect'=>false
            ],
        ];
    }
}