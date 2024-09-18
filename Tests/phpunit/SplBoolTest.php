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

use Ducks\Component\SplTypes\SplBool as DuckBool;
use PHPUnit\Framework\TestCase;

class SplBoolTest extends TestCase
{
    /**
     * Unit test.
     *
     * @return void
     */
    public function test()
    {
        $test = new DuckBool();
        $this->assertFalse((bool) (string) $test);
        unset($test);

        $test = new DuckBool(true);
        $this->assertTrue((bool) (string) $test);
        unset($test);

        $test = new DuckBool(1, false);
        $this->assertTrue((bool) (string) $test);
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
    public function test_unexpected_value_exception_int()
    {
        $this->expectException('\UnexpectedValueException');
        new DuckBool(0);
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
        new DuckBool('test');
    }

    /**
     * Unit test.
     *
     * @return void
     */
    // phpcs:ignore PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    public function test_list()
    {
        $list = [
            '__default' => false,
            'false' => false,
            'true' => true,
        ];
        $bool = new DuckBool();

        $test = $bool->getConstList(true);
        $this->assertSame($list, $test);
        unset($test, $list['__default']);

        $test = $bool->getConstList();
        $this->assertSame($list, $test);
        unset($bool, $test, $list);
    }
}
