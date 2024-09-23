<?php

/**
 * Part of SplTypes package.
 *
 * (c) Adrien Loyant <donald_duck@team-df.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Ducks\Component\SplTypes\Tests\phpunit;

use Ducks\Component\SplTypes\Tests\common\Month;
use PHPUnit\Framework\TestCase;

class SplEnumTest extends TestCase
{
    /**
     * Unit test.
     *
     * @return void
     */
    public function test(): void
    {
        $instance = new Month();
        $this->assertEquals(Month::__default, $instance());

        $instance = new Month(Month::SEPTEMBER);
        $this->assertEquals(Month::SEPTEMBER, $instance());

        $instance = new Month('1', false);
        $this->assertEquals(Month::JANUARY, $instance());
    }

    /**
     * Unit test.
     *
     * @throws \UnexpectedValueException
     *
     * @return void
     */
    public function testUnexpectedValueRxception(): void
    {
        $this->expectException(\UnexpectedValueException::class);
        new Month('1');
    }

    /**
     * Unit test.
     *
     * @return void
     */
    public function testGetConstList(): void
    {
        $list = [
            '__default' => 1,
            'JANUARY' => 1,
            'FEBRUARY' => 2,
            'MARCH' => 3,
            'APRIL' => 4,
            'MAY' => 5,
            'JUNE' => 6,
            'JULY' => 7,
            'AUGUST' => 8,
            'SEPTEMBER' => 9,
            'OCTOBER' => 10,
            'NOVEMBER' => 11,
            'DECEMBER' => 12,
        ];
        $instance = new Month();

        $test = $instance->getConstList(true);
        $this->assertSame($list, $test);

        $test = $instance->getConstList();
        unset($list['__default']);
        $this->assertSame($list, $test);
    }

    /**
     * Unit test.
     *
     * @return void
     */
    public function testSerialization(): void
    {
        $instance = new Month(Month::SEPTEMBER);
        $serialized = \serialize($instance);
        $unserialized = \unserialize($serialized);

        $this->assertEquals($instance, $unserialized);
        $this->assertEquals(Month::SEPTEMBER, $instance());
    }

    /**
     * Unit test.
     *
     * @return void
     */
    public function testJsonSerialization(): void
    {
        $instance = new Month(Month::SEPTEMBER);
        $json = \json_encode($instance);

        $this->assertEquals("9", $json);
    }
}
