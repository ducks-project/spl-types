<?php

/**
 * Part of SplTypes package.
 *
 * (c) Adrien Loyant <donald_duck@team-df.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=0);

namespace Ducks\Component\SplTypes\Tests\phpunit;

use Ducks\Component\SplTypes\SplFloat as DuckFloat;
use PHPUnit\Framework\TestCase;

class SplFloatUnstrictTest extends TestCase
{
    /**
     * Unit test.
     *
     * @return void
     *
     * @psalm-suppress InvalidScalarArgument
     */
    public function test(): void
    {
        // @phpstan-ignore-next-line
        $instance = new DuckFloat('10.1');
        $this->assertSame(10.1, $instance());
        unset($instance);
    }
}
