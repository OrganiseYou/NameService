<?php

use Organiseyou\NameService\Service;
use PHPUnit\Framework\TestCase;

class ServiceTest extends TestCase
{
    public function testInternalService()
    {
        $service = new Service('Organise You');
        $this->assertEquals('ORGANISE_YOU', $service->toDatabase(), "Assert with space");

        $service = new Service('Organise+You');
        $this->assertEquals('ORGANISE_YOU', $service->toDatabase(), "Assert with plus");

        $service = new Service('Organise/You');
        $this->assertEquals('ORGANISE_YOU', $service->toDatabase(), "Assert with slash");

        $service = new Service('Organise`You');
        $this->assertEquals('ORGANISE_YOU', $service->toDatabase(),"Assert with special character `");

        $service = new Service('Organise(You');
        $this->assertEquals('ORGANISE_YOU', $service->toDatabase(),"Assert with special character (");
    }

    public function testInstanceOf()
    {
        $service = new Service('');
        $this->assertInstanceOf(Service::class, $service);
    }

    public function testChained()
    {
        $database = (new Service('Organise You'))->toDatabase();

        $this->assertEquals('ORGANISE_YOU', $database);
    }
}