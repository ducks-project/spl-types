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
use Ducks\Component\SplTypes\SplFloat;

class SplFloatTest extends TestCase
{

    public function test()
    {
        $test = new SplFloat();
        $this->assertSame(0.0, (float) (string) $test);
        unset($test);

        $test = new SplFloat(10.1);
        $this->assertSame(10.1, (float) (string) $test);
        unset($test);

        $test = new SplFloat(10.1, false);
        $this->assertSame(10.1, (float) (string) $test);
        unset($test);
    }

    public function test_unexpected_value_exception_bool()
    {
        $this->expectException('\UnexpectedValueException');
        new SplFloat(false);
    }

    public function test_unexpected_value_exception_string()
    {
        $this->expectException('\UnexpectedValueException');
        new SplFloat('10');
    }

}
