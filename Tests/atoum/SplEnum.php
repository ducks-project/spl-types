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

require_once __DIR__ . DIRECTORY_SEPARATOR . '../common/Fixtures/' . '/Month.php';

use mageekguy\atoum;

/**
 * @namespace \Tests\atoum
 */
class SplEnum extends atoum
{
    public function test()
    {
        $this
            ->given($test = new \Month)
            ->then
                ->integer((int) (string) $test)
                    ->isEqualTo(\Month::__default)
        ;

        $this
            ->given($test = new \Month(\Month::SEPTEMBER))
            ->then
                ->integer((int) (string) $test)
                    ->isEqualTo(\Month::SEPTEMBER)
        ;

        $this
            ->given($test = new \Month('1', false))
            ->then
                ->integer((int) (string) $test)
                    ->isEqualTo(\Month::JANUARY)
        ;
    }

    public function test_unexpected_value_exception()
    {
        $this
            ->exception(
                function() {
                    new \Month('1');
                }
            )
            ->isInstanceOf('\UnexpectedValueException')
        ;
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

        $this
            ->given($test = new \Month)
            ->then
                ->array($test->getConstList(true))
                    ->isEqualTo($list)
        ;

        unset($list['__default']);

        $this
            ->given($test = new \Month)
            ->then
                ->array($test->getConstList())
                    ->isEqualTo($list)
        ;
    }
}
