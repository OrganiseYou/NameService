<?php

use Organiseyou\NameService\ConvertService;
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

    public function testFromSlugWithCallable()
    {
        $service = new Service(
            'organise-you',
            fn (string $slug) => ConvertService::urlToName($slug)
        );
        $this->assertEquals('ORGANISE_YOU', $service->toDatabase(), "From slug");
    }

    public function testToSlug()
    {
        $slug = (new Service('Organise You'))->toSlug();
        $this->assertEquals('organise-you', $slug);
    }

    public function testToPascalCase()
    {
        $pascalCase = (new Service('Organise You'))->toPascalCase();
        $this->assertEquals('OrganiseYou', $pascalCase);
    }
}