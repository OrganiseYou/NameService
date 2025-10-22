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
            $this->internalName = Convert::saveConvert($internalName);
        }
    }

    public function toSlug(): string
    {
        return Convert::convertNameToId($this->internalName);
    }

    public function toDatabase(): string
    {
        return $this->internalName;
    }

    public function toPascalCase(): string
    {
        return Convert::toPascalCase($this->internalName);
    }

    public function toCamelCase(): string
    {
        return Convert::toCamelCase($this->internalName);
    }
}