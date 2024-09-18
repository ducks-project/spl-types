<?php

/**
 * Part of SplTypes package.
 *
 * (c) Adrien Loyant <donald_duck@team-df.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ducks\Component\SplTypes\Tests\phpunit;

use Ducks\Component\SplTypes\SplString as DuckString;
use PHPUnit\Framework\TestCase;

class SplStringTest extends TestCase
{
    /**
     * Unit test.
     *
     * @return void
     */
    public function test(): void
    {
        $test = new DuckString();
        $this->assertSame('', (string) $test);
        unset($test);

        $test = new DuckString('test');
        $this->assertSame('test', (string) $test);
        unset($test);

        $test = new DuckString(0, false);
        $this->assertSame('0', (string) $test);
        unset($test);
    }

    /**
     * Unit test.
     *
     * @throws \UnexpectedValueException
     *
     * @return void
     */
    // phpcs:ignore PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    public function test_unexpected_value_exception_int(): void
    {
        $this->expectException('\UnexpectedValueException');
        new DuckString(0);
    }

    /**
     * Unit test.
     *
     * @throws \UnexpectedValueException
     *
     * @return void
     */
    // phpcs:ignore PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    public function test_unexpected_value_exception_scalar(): void
    {
        $this->expectException('\UnexpectedValueException');
        new DuckString([]);
    }
}
