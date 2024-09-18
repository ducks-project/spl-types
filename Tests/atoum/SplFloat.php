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

use Ducks\Component\SplTypes\SplFloat as DuckFloat;
use atoum;

/**
 * @namespace \Tests\atoum
 */
class SplFloat extends atoum
{
    /**
     * Unit test.
     *
     * @return void
     */
    public function test(): void
    {
        $instance = new DuckFloat();
        $this
            ->given($instance)
            ->then
                ->float((float) (string) $instance)
                    ->isEqualTo(0.0)
        ;

        $instance = new DuckFloat(10.1);
        $this
            ->given($instance)
            ->then
                ->float((float) (string) $instance)
                    ->isEqualTo(10.1)
        ;

        $instance = new DuckFloat('10.1', false);
        $this
            ->given($instance)
            ->then
                ->float((float) (string) $instance)
                    ->isEqualTo(10.1)
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
    public function test_unexpected_value_exception_bool(): void
    {
        $this
            ->exception(
                function (): void {
                    new DuckFloat(false);
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
                    new DuckFloat('10');
                }
            )
            ->isInstanceOf('\UnexpectedValueException')
        ;
    }
}
