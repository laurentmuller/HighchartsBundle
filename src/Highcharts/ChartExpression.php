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
    private string $magicKey;

    /**
     * @param string $expression the expression to represent
     */
    public function __construct(string $expression)
    {
        // remove consecutive spaces
        $this->expression = (string) \preg_replace('/\s+/', ' ', \trim($expression));
        $this->magicKey = \hash('md5', $this->expression);
    }

    public function __toString(): string
    {
        return $this->expression;
    }

    public function getExpression(): string
    {
        return $this->expression;
    }

    public function getMagicKey(): string
    {
        return $this->magicKey;
    }

    /**
     * Inject this expression into the encoded value.
     */
    public function injectExpression(string $encodedValue): string
    {
        return \str_replace(
            \sprintf('"%s"', $this->getMagicKey()),
            $this->getExpression(),
            $encodedValue
        );
    }

    /**
     * Create a chart expression.
     *
     * @param string $expression the expression to represent
     */
    public static function instance(string $expression): self
    {
        return new self($expression);
    }
}
