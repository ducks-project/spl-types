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
use mageekguy\atoum;

/**
 * @namespace \Tests\atoum
 */
class SplFloat extends atoum\test
{
    /**
     * Unit test
     *
     * @return void
     */
    public function test()
    {
        $instance = new DuckFloat();
        // @phpstan-ignore-next-line
        $this
            ->given($instance)
            ->then
                ->float((float) (string) $instance)
                    ->isEqualTo(0.0)
        ;

        $instance = new DuckFloat(10.1);
        // @phpstan-ignore-next-line
        $this
            ->given($instance)
            ->then
                ->float((float) (string) $instance)
                    ->isEqualTo(10.1)
        ;

        $instance = new DuckFloat('10.1', false);
        // @phpstan-ignore-next-line
        $this
            ->given($instance)
            ->then
                ->float((float) (string) $instance)
                    ->isEqualTo(10.1)
        ;
    }

    /**
     * Unit test
     *
     * @throws \UnexpectedValueException
     *
     * @return void
     */
    // phpcs:ignore PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    public function test_unexpected_value_exception_bool()
    {
        // @phpstan-ignore-next-line
        $this
            ->exception(
                function () {
                    new DuckFloat(false);
                }
            )
            ->isInstanceOf('\UnexpectedValueException')
        ;
    }

    /**
     * Unit test
     *
     * @throws \UnexpectedValueException
     *
     * @return void
     */
    // phpcs:ignore PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    public function test_unexpected_value_exception_string()
    {
        // @phpstan-ignore-next-line
        $this
            ->exception(
                function () {
                    new DuckFloat('10');
                }
            )
            ->isInstanceOf('\UnexpectedValueException')
        ;
    }
}
