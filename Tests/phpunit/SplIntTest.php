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
use Ducks\Component\SplTypes\SplInt;

class SplIntTest extends TestCase
{
    public function test()
    {
        $test = new SplInt();
        $this->assertSame(0, (int) (string) $test);

        $test = new SplInt(10);
        $this->assertSame(10, (int) (string) $test);

        $test = new SplInt(10.0, false);
        $this->assertSame(10, (int) (string) $test);
    }

    public function test_unexpected_value_exception_float()
    {
        $this->expectException('\UnexpectedValueException');
        new \SplInt(10.0);
    }

    public function test_unexpected_value_exception_string()
    {
        $this->expectException('\UnexpectedValueException');
        new \SplInt('test');
    }
}
