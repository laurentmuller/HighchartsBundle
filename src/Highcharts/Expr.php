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
readonly class Expr implements \Stringable
{
    private string $magicKey;

    /**
     * @param string $expression the expression to represent
     */
    public function __construct(private string $expression)
    {
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
}
