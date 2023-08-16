<?php

declare(strict_types=1);

namespace Ob\HighchartsBundle\Highcharts;

/**
 * Chart options.
 *
 * @template-implements \ArrayAccess<string, mixed>
 */
class ChartOption implements \ArrayAccess, \Countable
{
    private array $data = [];

    public function __construct(private readonly string $name)
    {
    }

    public function __call(string $name, array $value): self
    {
        $this->data[$name] = $value[0];

        return $this;
    }

    /**
     * Returns whether a value exists for the given key.
     */
    public function __isset(string $key): bool
    {
        return isset($this->data[$key]);
    }

    /**
     * Assigns a value for the given key.
     */
    public function __set(string $key, mixed $value): void
    {
        $this->data[$key] = $value;
    }

    /**
     * Unsets a value for the given key.
     */
    public function __unset(string $key): void
    {
        unset($this->data[$key]);
    }

    /**
     * Get a value for the given key.
     */
    public function &__get(string $key): mixed
    {
        return $this->data[$key];
    }

    public function count(): int
    {
        return \count($this->data);
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function isEmpty(): bool
    {
        return [] === $this->data;
    }

    /**
     * @param string $offset
     */
    public function offsetExists(mixed $offset): bool
    {
        return isset($this->data[$offset]);
    }

    /**
     * @param string $offset
     */
    public function offsetGet(mixed $offset): mixed
    {
        return $this->offsetExists($offset) ? $this->data[$offset] : null;
    }

    /**
     * @param ?string $offset
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (null === $offset) {
            $this->data[] = $value;
        } else {
            $this->data[$offset] = $value;
        }
    }

    /**
     * @param string $offset
     */
    public function offsetUnset(mixed $offset): void
    {
        if ($this->offsetExists($offset)) {
            unset($this->data[$offset]);
        }
    }
}
