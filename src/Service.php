<?php

namespace Organiseyou\NameService;

class Service
{
    private string $internalName;

    public function __construct(string $internalName)
    {
        $this->internalName = ConvertService::saveConvert($internalName);
    }

    public function toSlug(): string
    {
        return '';
    }

    public function toDatabase(): string
    {
        return $this->internalName;
    }

    public function toPascalCase(): string
    {
        return '';
    }

    public function toCamelCase(): string
    {
        return '';
    }
}