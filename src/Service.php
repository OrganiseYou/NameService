<?php

namespace Organiseyou\NameService;

class Service
{
    private string $internalName;

    public function __construct(
        string $internalName,
        ?callable $transformer = null,
    ) {
        if ($transformer) {
            $this->internalName = $transformer($internalName);
        } else {
            $this->internalName = ConvertService::saveConvert($internalName);
        }
    }

    public function toSlug(): string
    {
        return ConvertService::convertNameToId($this->internalName);
    }

    public function toDatabase(): string
    {
        return $this->internalName;
    }

    public function toPascalCase(): string
    {
        return ConvertService::toPascalCase($this->internalName);
    }

    public function toCamelCase(): string
    {
        return '';
    }
}