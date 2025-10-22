<?php

use Organiseyou\NameService\Convert as ConvertService;
use PHPUnit\Framework\TestCase;

class PascalCaseTest extends TestCase
{
    public function testCamelCase()
    {
        $variable = 'organise_you';
        $converter = ConvertService::toPascalCase($variable);
        $this->assertEquals($converter, 'OrganiseYou');

        $variable = 'organise';
        $converter = ConvertService::toPascalCase($variable);
        $this->assertEquals($converter, 'Organise');

        $variable = 'Organise_you';
        $converter = ConvertService::toPascalCase($variable);
        $this->assertEquals($converter, 'OrganiseYou');

        $variable = 'organise you';
        $converter = ConvertService::toPascalCase($variable);
        $this->assertEquals($converter, 'OrganiseYou');

        $variable = 'hello world';
        $converter = ConvertService::toPascalCase($variable);
        $this->assertEquals($converter, 'HelloWorld');

        $variable = 'hello_world';
        $converter = ConvertService::toPascalCase($variable);
        $this->assertEquals($converter, 'HelloWorld');

        $variable = 'organise-you';
        $converter = ConvertService::toPascalCase($variable);
        $this->assertEquals($converter, 'OrganiseYou');
    }
}
