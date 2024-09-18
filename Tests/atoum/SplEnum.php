<?php

/**
 * Part of SplTypes package.
 *
 * (c) Adrien Loyant <donald_duck@team-df.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ducks\Component\SplTypes\Tests\atoum;

use Ducks\Component\SplTypes\Tests\common\Month;
use mageekguy\atoum;

/**
 * @namespace \Tests\atoum
 */
class SplEnum extends atoum\test
{
    /**
     * Unit test.
     *
     * @return void
     */
    public function test()
    {
        $test = new Month();

        // @phpstan-ignore-next-line
        $this
            ->given($test)
            ->then
                ->integer((int) (string) $test)
                    ->isEqualTo(Month::__default)
        ;

        $test = new Month(Month::SEPTEMBER);
        // @phpstan-ignore-next-line
        $this
            ->given($test)
            ->then
                ->integer((int) (string) $test)
                    ->isEqualTo(Month::SEPTEMBER)
        ;

        $test = $test = new Month('1', false);
        // @phpstan-ignore-next-line
        $this
            ->given()
            ->then
                ->integer((int) (string) $test)
                    ->isEqualTo(Month::JANUARY)
        ;
    }

    /**
     * Unit test.
     *
     * @throws \UnexpectedValueException
     *
     * @return void
     */
    // phpcs:ignore PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    public function test_unexpected_value_exception()
    {
        // @phpstan-ignore-next-line
        $this
            ->exception(
                function () {
                    new Month('1');
                }
            )
            ->isInstanceOf('\UnexpectedValueException')
        ;
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

        $test = new Month();
        // @phpstan-ignore-next-line
        $this
            ->given($test)
            ->then
                ->array($test->getConstList(true))
                    ->isEqualTo($list)
        ;

        unset($list['__default']);

        $test = new Month();
        // @phpstan-ignore-next-line
        $this
            ->given($test)
            ->then
                ->array($test->getConstList())
                    ->isEqualTo($list)
        ;
    }
}
