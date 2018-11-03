<?php

use PHPUnit\Framework\TestCase;

class HttpGETTest extends TestCase
{

    /**
     * @dataProvider GetRequestParamByNameDataProvider
     */

    public function testGetParamByName(array $GETParams, $param, $expect)
    {
        $httpGET = new Source\Request\GetParams\HttpGET($GETParams);
        $this->assertEquals($expect, $httpGET->getParamByName($param));
    }

    public function GetRequestParamByNameDataProvider()
    {
        return [
            'case_0' => [
                'GETParams'=>[
                    'foo'=>1,
                    'bar'=>2,
                ],
                'param'=>'foo',
                'expect'=>1
            ],
            'case_1' => [
                'GETParams'=>[
                    'foo'=>1,
                    'bar'=>2,
                ],
                'param'=>'fooBar',
                'expect'=>false
            ],
        ];
    }
}