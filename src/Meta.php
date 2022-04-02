<?php

namespace Ifnir\Routipiper;

use Attribute;

#[Attribute]
class Meta
{
    public function __construct(
        public string $path,
        public ?string $method = null,
        public ?string $alias = null
    )
    {}
}