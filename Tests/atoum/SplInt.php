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

use Ducks\Component\SplTypes\SplInt as DuckInt;
use atoum;

/**
 * @namespace \Tests\atoum
 */
class SplInt extends atoum
{
    /**
     * Unit test.
     *
     * @return void
     */
    public function test(): void
    {
        $instance = new DuckInt();
        $this
            ->given($instance)
            ->then
                ->integer((int) (string) $instance)
                    ->isEqualTo(0)
        ;

        $instance = new DuckInt(10);
        $this
            ->given($instance)
            ->then
                ->integer((int) (string) $instance)
                    ->isEqualTo(10)
        ;

        $instance = new DuckInt(10.0, false);
        $this
            ->given($instance)
            ->then
                ->integer((int) (string) $instance)
                    ->isEqualTo(10)
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
    public function test_unexpected_value_exception_float(): void
    {
        $this
            ->exception(
                function (): void {
                    new DuckInt(10.0);
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
    public function test_unexpected_value_exception_string(): void
    {
        $this
            ->exception(
                function (): void {
                    new DuckInt('test');
                }
            )
            ->isInstanceOf('\UnexpectedValueException')
        ;
    }
}
