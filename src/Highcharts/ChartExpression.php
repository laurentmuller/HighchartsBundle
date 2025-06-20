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
 * Encode a string to a native JavaScript expression.
 */
readonly class ChartExpression implements \Stringable
{
    private string $expression;
    private string $key;

    /**
     * @param string $expression the expression to represent
     */
    public function __construct(string $expression)
    {
        $this->expression = (string) \preg_replace('/\s+/', ' ', \trim($expression));
        $this->key = \md5($this->expression);
    }

    #[\Override]
    public function __toString(): string
    {
        return $this->expression;
    }

    public function getExpression(): string
    {
        return $this->expression;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * Gets the magic key inside double quotes.
     */
    public function getQuotedKey(): string
    {
        return \sprintf('"%s"', $this->key);
    }

    /**
     * Create a chart expression.
     *
     * @param string $expression the JavaScript expression to represent
     */
    public static function instance(string $expression): self
    {
        return new self($expression);
    }
}
