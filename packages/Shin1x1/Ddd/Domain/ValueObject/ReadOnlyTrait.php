<?php
namespace Shin1x1\Ddd\Domain\ValueObject;

trait ReadOnlyTrait
{
    /**
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        $properties = get_object_vars($this);
        if (array_key_exists($name, $properties)) {
            return $this->$name;
        }

        return null;
    }
}