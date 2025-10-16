<?php

use Organiseyou\NameService\ConvertService;
use PHPUnit\Framework\TestCase;

class CamelCaseTest extends TestCase
{
    public function testCamelCase()
    {
        $variable = 'organise_you';
        $converter = ConvertService::toCamelCase($variable);
        $this->assertEquals($converter, 'OrganiseYou');

        $variable = 'organise';
        $converter = ConvertService::toCamelCase($variable);
        $this->assertEquals($converter, 'Organise');

        $variable = 'Organise_you';
        $converter = ConvertService::toCamelCase($variable);
        $this->assertEquals($converter, 'OrganiseYou');

        $variable = 'organise you';
        $converter = ConvertService::toCamelCase($variable);
        $this->assertEquals($converter, 'OrganiseYou');

        $variable = 'hello world';
        $converter = ConvertService::toCamelCase($variable);
        $this->assertEquals($converter, 'HelloWorld');

        $variable = 'hello_world';
        $converter = ConvertService::toCamelCase($variable);
        $this->assertEquals($converter, 'HelloWorld');

        $variable = 'organise-you';
        $converter = ConvertService::toCamelCase($variable);
        $this->assertEquals($converter, 'OrganiseYou');
    }
}
