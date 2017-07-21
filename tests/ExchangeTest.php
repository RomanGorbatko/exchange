<?php
/**
 * Created by PhpStorm.
 * User: romangorbatko
 * Date: 7/21/17
 * Time: 3:14 PM
 */

namespace RG\Tests;

use PHPUnit\Framework\TestCase;
use RG\Exchange;
use RG\Provider\GoogleProvider;
use RG\Provider\YahooProvider;


class ExchangeTests extends TestCase
{
    public function testNotFountProvider()
    {
        $this->expectException(\RuntimeException::class);

        Exchange::getProvider('');
    }

    public function testGoogleProvider()
    {
        $provider = Exchange::getProvider('google');

        $this->assertInstanceOf(GoogleProvider::class, $provider);
    }

    public function testYahooProvider()
    {
        $provider = Exchange::getProvider('yahoo');

        $this->assertInstanceOf(YahooProvider::class, $provider);
    }

    public function testYahooConvert()
    {
        $provider = Exchange::getProvider('yahoo');
        $result = $provider->convert('USD', 'UAH', 800.00);

        $this->assertInternalType('float', $result);
    }

    public function testGoogleConverter()
    {
        $provider = Exchange::getProvider('google');
        $result = $provider->convert('USD', 'UAH', 800.00);

        $this->assertInternalType('float', $result);
    }
}