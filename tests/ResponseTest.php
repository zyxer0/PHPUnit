<?php

use PHPUnit\Framework\TestCase;
use Source\Response\Response;
use Source\Entity\Cookie;

class ResponseTest extends TestCase
{

    /**
     * @dataProvider GetHeaderByNameDataProvider
     */

    public function testGetHeaderByName(array $headers, $param, $expect)
    {
        $response = new Response();

        foreach($headers as $name=>$value) {
            $response->setHeader($name, $value);
        }

        $this->assertEquals($expect, $response->getHeaderByName($param));
    }

    /**
     * @dataProvider GetCookieByNameDataProvider
     */

    public function testGetCookieByName(array $cookies, $param, $expect)
    {

        $response = new Response();

        foreach($cookies as $name=>$value) {
            $cookieMock = $this->getMockBuilder(Cookie::class)
                ->setConstructorArgs([$name, $value])
                ->getMock();
            $response->setCookie($cookieMock);
        }

        $this->assertEquals($expect->value, $response->getCookieByName($param)->value);
    }

    public function GetHeaderByNameDataProvider()
    {
        return [
            'case_0' => [
                'headers'=>[
                    'Connection'=>'keep-alive',
                    'Server'=>'nginx/1.10.3',
                ],
                'param'=>'Connection',
                'expect'=>'keep-alive'
            ],
            'case_1' => [
                'headers'=>[
                    'Connection'=>'keep-alive',
                    'Server'=>'nginx/1.10.3',
                ],
                'param'=>'Date',
                'expect'=>false
            ],
        ];
    }

    public function GetCookieByNameDataProvider()
    {
        return [
            'case_0' => [
                'cookies'=>[
                    '4db8793b3d7acaec4a41560eb34c4ffa'=>'qhirlpldnksu7fasjh6idpsn7r',
                    'SID'=>'pwYMXyjMJeuvynqjTLt1sob2HKX',
                ],
                'param'=>'SID',
                'expect'=>new Cookie('SID', 'pwYMXyjMJeuvynqjTLt1sob2HKX')
            ],
            /*'case_1' => [
                'cookies'=>[
                    '4db8793b3d7acaec4a41560eb34c4ffa'=>'qhirlpldnksu7fasjh6idpsn7r',
                    'SID'=>'pwYMXyjMJeuvynqjTLt1sob2HKX',
                ],
                'param'=>'UID',
                'expect'=>false
            ],*/
        ];
    }
}