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

use Ducks\Component\SplTypes\SplString as DuckString;
use PHPUnit\Framework\TestCase;

class SplStringUnstrictTest extends TestCase
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
        $instance = new DuckString(0);
        $this->assertSame('0', $instance());
    }
}
