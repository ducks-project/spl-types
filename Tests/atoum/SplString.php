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

use Ducks\Component\SplTypes\SplString as DuckString;
use mageekguy\atoum;

/**
 * @namespace \Tests\atoum
 */
class SplString extends atoum\test
{
    /**
     * Unit test
     *
     * @return void
     */
    public function test()
    {
        $instance = new DuckString();
        // @phpstan-ignore-next-line
        $this
            ->given($instance)
            ->then
                ->string((string) $instance)
                    ->isEqualTo('')
        ;

        $instance = new DuckString('test');
        // @phpstan-ignore-next-line
        $this
            ->given($instance)
            ->then
                ->string((string) $instance)
                    ->isEqualTo('test')
        ;

        $instance = new DuckString(0, false);
        // @phpstan-ignore-next-line
        $this
            ->given($instance)
            ->then
                ->string((string) $instance)
                    ->isEqualTo('0')
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
    public function test_unexpected_value_exception_int()
    {
        // @phpstan-ignore-next-line
        $this
            ->exception(
                function () {
                    new DuckString(0);
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
    public function test_unexpected_value_exception_scalar()
    {
        // @phpstan-ignore-next-line
        $this
            ->exception(
                function () {
                    new DuckString([]);
                }
            )
            ->isInstanceOf('\UnexpectedValueException')
        ;
    }
}
