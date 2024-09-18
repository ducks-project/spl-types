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

use Ducks\Component\SplTypes\SplFloat as DuckFloat;
use PHPUnit\Framework\TestCase;

class SplFloatTest extends TestCase
{
    /**
     * Unit test.
     *
     * @return void
     */
    public function test(): void
    {
        $test = new DuckFloat();
        $this->assertSame(0.0, (float) (string) $test);
        unset($test);

        $test = new DuckFloat(10.1);
        $this->assertSame(10.1, (float) (string) $test);
        unset($test);

        $test = new DuckFloat('10.1', false);
        $this->assertSame(10.1, (float) (string) $test);
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
    public function test_unexpected_value_exception_bool(): void
    {
        $this->expectException('\UnexpectedValueException');
        new DuckFloat(false);
    }

    /**
     * Unit test.
     *
     * @throws \UnexpectedValueException
     *
     * @return void
     */
    // phpcs:ignore PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    public function test_unexpected_value_exception_string(): void
    {
        $this->expectException('\UnexpectedValueException');
        new DuckFloat('10');
    }
}
