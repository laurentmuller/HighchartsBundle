<?php

/*
 * This file is part of the HighchartsBundle package.
 *
 * (c) bibi.nu <bibi@bibi.nu>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace HighchartsBundle\Highcharts;

/**
 * Chart options.
 *
 * @template-extends \ArrayObject<string, mixed>
 */
class ChartOption extends \ArrayObject
{
    /**
     * @param non-empty-string     $name the option name
     * @param array<string, mixed> $data the initial values
     */
    public function __construct(private readonly string $name, array $data = [])
    {
        parent::__construct($data);
    }

    /**
     * @param array<array-key, mixed> $value
     */
    public function __call(string $name, array $value): self
    {
        $this[$name] = $value[0];

        return $this;
    }

    /**
     * Returns whether a value exists for the given key.
     */
    public function __isset(string $key): bool
    {
        return $this->offsetExists($key);
    }

    /**
     * Assigns a value for the given key.
     */
    public function __set(string $key, mixed $value): void
    {
        $this[$key] = $value;
    }

    /**
     * Unsets a value for the given key.
     */
    public function __unset(string $key): void
    {
        unset($this[$key]);
    }

    /**
     * Get a value for the given key.
     */
    public function &__get(string $key): mixed
    {
        return $this[$key];
    }

    /**
     * @return array<string, mixed>
     */
    public function getData(): array
    {
        return $this->getArrayCopy();
    }

    /**
     * @return non-empty-string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Create a new instance.
     *
     * @param non-empty-string     $name the option name
     * @param array<string, mixed> $data the initial values
     */
    public static function instance(string $name, array $data = []): self
    {
        return new self($name, $data);
    }

    public function isEmpty(): bool
    {
        return 0 === $this->count();
    }

    /**
     * @param array<string, mixed> $data
     */
    public function merge(array $data): void
    {
        $this->exchangeArray(\array_merge_recursive($this->getArrayCopy(), $data));
    }
}
