<?php

namespace Ifnir\Routipiper\Attribute;

use Attribute;

#[Attribute(\Attribute::IS_REPEATABLE | \Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD)]
class Route
{
    private ?string $path = null;
    private array $localizedPaths = [];
    private array $methods;

    public function __construct(
        string|array $path = null,
        string|array $method = [],
        public ?string $alias = null
    )
    {
        if (is_array($path)) {
            $this->localizedPaths = $path;
        } else {
            $this->path = $path;
        }
        $this->setMethods($method);
    }

    public function setPath(string $path)
    {
        $this->path = $path;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function setMethods(array|string $methods)
    {
        $this->methods = (array) $methods;
    }

    public function getMethods()
    {
        return $this->methods;
    }

    public function setAlias(string $alias)
    {
        $this->alias = $alias;
    }

    public function getAlias()
    {
        return $this->alias;
    }

    public function setLocalizedPaths($localizedPaths)
    {
        $this->localizedPaths = $localizedPaths;
    }

    public function getLocalizedPaths()
    {
        return $this->localizedPaths;
    }


    // getters
    // setters
}