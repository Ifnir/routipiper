<?php

namespace Ifnir\Routipiper;

use Attribute;

#[\Attribute(\Attribute::IS_REPEATABLE | \Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD)]
class Route
{
    private ?string $path = null;
    private array $method = null;
    
    public function __construct(
        public string|array $path = null,
        public string|array $method = null,
        public ?string $alias = null
    )
    {}
    // getters
    // setters
}