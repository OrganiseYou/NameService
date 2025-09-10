<?php

require_once(__DIR__ . '/../vendor/autoload.php');

use Organiseyou\NameService\ConvertService;
use PHPUnit\Framework\TestCase;

class ConvertTest extends TestCase
{
    public function testConvertFromUrl(): void
    {
        $urlName = 'organise-you';
        $name = ConvertService::urlToName($urlName);
        $this->assertEquals($name, 'ORGANISE_YOU');
    }

    public function testConvertFromName(): void
    {
        $name = 'Organise You';
        $name = ConvertService::saveConvert($name);
        $this->assertEquals($name, 'ORGANISE_YOU');
        $name = 'Organise You';
        $name = ConvertService::saveConvert($name);
        $this->assertEquals($name, 'ORGANISE_YOU');
        $name = 'Organise+You';
        $name = ConvertService::saveConvert($name);
        $this->assertEquals($name, 'ORGANISE_YOU');
        $name = 'Organise/You';
        $name = ConvertService::saveConvert($name);
        $this->assertEquals($name, 'ORGANISE_YOU');
        $name = 'Organise`You';
        $name = ConvertService::saveConvert($name);
        $this->assertEquals($name, 'ORGANISE_YOU');
        $name = 'Organise(You';
        $name = ConvertService::saveConvert($name);
        $this->assertEquals($name, 'ORGANISE_YOU');
    }

    public function testNameToUrl(): void
    {
        $name = 'ORGANISE_YOU';
        $name = ConvertService::convertNameToId($name);
        $this->assertEquals($name, 'organise-you');
    }
}