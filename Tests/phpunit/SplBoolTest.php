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

use PHPUnit\Framework\TestCase;
use Ducks\Component\SplTypes\SplBool;

class SplBoolTest extends TestCase
{

    public function test()
    {
        $test = new SplBool;
        $this->assertFalse((bool) (string) $test);
        unset($test);

        $test = new SplBool(true);
        $this->assertTrue((bool) (string) $test);
        unset($test);

        $test = new SplBool(1, false);
        $this->assertTrue((bool) (string) $test);
        unset($test);
    }

    public function test_unexpected_value_exception_int()
    {
        $this->expectException('\UnexpectedValueException');
        new SplBool(0);
    }

    public function test_unexpected_value_exception_string()
    {
        $this->expectException('\UnexpectedValueException');
        new SplBool('test');
    }

    public function test_list()
    {
        $list = array(
            '__default' => false,
            'false' => false,
            'true' => true
        );
        $bool = new SplBool;

        $test = $bool->getConstList(true);
        $this->assertSame($list, $test);
        unset($test, $list['__default']);

        $test = $bool->getConstList();
        $this->assertSame($list, $test);
        unset($bool, $test, $list);
    }

}
