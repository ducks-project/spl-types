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

use Ducks\Component\SplTypes\SplInt as DuckInt;
use PHPUnit\Framework\TestCase;

class SplIntTest extends TestCase
{
    /**
     * Unit test.
     *
     * @return void
     */
    public function test()
    {
        $test = new DuckInt();
        $this->assertSame(0, (int) (string) $test);

        $test = new DuckInt(10);
        $this->assertSame(10, (int) (string) $test);

        $test = new DuckInt(10.0, false);
        $this->assertSame(10, (int) (string) $test);
    }

    /**
     * Unit test.
     *
     * @throws \UnexpectedValueException
     *
     * @return void
     */
    // phpcs:ignore PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    public function test_unexpected_value_exception_float()
    {
        $this->expectException('\UnexpectedValueException');
        new DuckInt(10.0);
    }

    /**
     * Unit test.
     *
     * @throws \UnexpectedValueException
     *
     * @return void
     */
    // phpcs:ignore PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    public function test_unexpected_value_exception_string()
    {
        $this->expectException('\UnexpectedValueException');
        new DuckInt('test');
    }
}
