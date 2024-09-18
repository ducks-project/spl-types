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

use Ducks\Component\SplTypes\SplBool as DuckBool;
use atoum;

/**
 * @namespace \Tests\atoum
 */
class SplBool extends atoum
{
    /**
     * Unit test.
     *
     * @return void
     */
    public function test()
    {
        $instance = new DuckBool();

        $this
            ->given($instance)
            ->then
                ->boolean((bool) (string) $instance)
                    ->isEqualTo(false)
        ;

        $instance = new DuckBool(true);
        $this
            ->given($instance)
            ->then
                ->boolean((bool) (string) $instance)
                    ->isEqualTo(true)
        ;

        $instance = new DuckBool(1, false);
        $this
            ->given($instance)
            ->then
                ->boolean((bool) (string) $instance)
                    ->isEqualTo(true)
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
    public function test_unexpected_value_exception_int()
    {
        $this
            ->exception(
                function () {
                    new DuckBool(0);
                }
            )
            ->isInstanceOf('\UnexpectedValueException')
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
    public function test_unexpected_value_exception_string()
    {
        $this
            ->exception(
                function () {
                    new DuckBool('test');
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
            '__default' => false,
            'false' => false,
            'true' => true,
        ];

        $instance = new DuckBool();
        $this
            ->given($instance)
            ->then
                ->array($instance->getConstList(true))
                    ->isEqualTo($list)
        ;

        unset($list['__default']);
        $this
            ->given($instance)
            ->then
                ->array($instance->getConstList())
                    ->isEqualTo($list)
        ;
    }
}
