<?php

/**
 * Part of SplTypes package.
 *
 * (c) Adrien Loyant <donald_duck@team-df.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ducks\Component\SplTypes\Tests;

use PHPUnit\Framework\TestCase;
use Ducks\Component\SplTypes\SplString;

class SplStringTest extends TestCase
{

    public function test()
    {
        $test = new SplString;
        $this->assertSame('', (string) $test);
        unset($test);

        $test = new SplString('test');
        $this->assertSame('test', (string) $test);
        unset($test);

        $test = new SplString(0, false);
        $this->assertSame('0', (string) $test);
        unset($test);
    }

    public function test_unexpected_value_exception_int()
    {
        $this->expectException('\UnexpectedValueException');
        new SplString(0);
    }

    public function test_unexpected_value_exception_scalar()
    {
        $this->expectException('\UnexpectedValueException');
        new SplString(array());
    }

}
