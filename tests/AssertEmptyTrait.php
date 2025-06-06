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

namespace HighchartsBundle\Tests;

use PHPUnit\Framework\TestCase;

/**
 * Trait used as workaround to use <code>assertEmpty()</code> function within the <code>Countable</code> interface.
 *
 * @require-extends TestCase
 */
trait AssertEmptyTrait
{
    /**
     * @psalm-assert empty|\Countable $actual
     */
    final public static function assertEmptyCountable(mixed $actual): void
    {
        self::assertEmpty($actual);
    }
}
