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

class SplEnumTest extends TestCase
{
    protected static $fixturesPath;

    public static function setUpBeforeClass()
    {
        self::$fixturesPath = realpath(__DIR__ . DIRECTORY_SEPARATOR . '../common/Fixtures/');
        require_once self::$fixturesPath . '/Month.php';
    }

    public function test()
    {
        $test = new \Month();
        $this->assertEquals(\Month::__default, (string) $test);
        unset($test);

        $test = new \Month(\Month::SEPTEMBER);
        $this->assertEquals(\Month::SEPTEMBER, (string) $test);
        unset($test);

        $test = new \Month('1', false);
        $this->assertEquals(\Month::JANUARY, (string) $test);
        unset($test);
    }

    public function test_unexpected_value_exception()
    {
        $this->expectException('\UnexpectedValueException');
        new \Month('1');
    }

    public function test_list()
    {
        $list = array(
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
        );
        $month = new \Month();

        $test = $month->getConstList(true);
        $this->assertSame($list, $test);
        unset($test, $list['__default']);

        $test = $month->getConstList();
        $this->assertSame($list, $test);
        unset($month, $test, $list);
    }
}
